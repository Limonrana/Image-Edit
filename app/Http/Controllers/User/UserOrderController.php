<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complexity;
use App\Models\File;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Stripe;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $orders = null;
        $getQueryString = $request->status;
        $team = Team::find(Auth::user()->current_team_id);
        if ($getQueryString === 'all' ) {
            // All Order Fetch
            $orders = Order::where('user_id', $team->user_id)
                            ->when($request->search, function ($query, $search) {
                                $query->where('order_number', 'LIKE', '%' . $search . '%');
                            })->paginate(10);
        } elseif ($getQueryString === 'open') {
            // Open Order Fetch
            $orders = Order::where('user_id', $team->user_id)->where('status', 1)
                            ->when($request->search, function ($query, $search) {
                                $query->where('order_number', 'LIKE', '%' . $search . '%');
                            })->paginate(10);
        } elseif ($getQueryString === 'unpaid') {
            // Unpaid Order Fetch
            $orders = Order::where('user_id', $team->user_id)->where('status', 2)->orWhere('payment_status', 'Unpaid')
                            ->when($request->search, function ($query, $search) {
                                $query->where('order_number', 'LIKE', '%' . $search . '%');
                            })->paginate(10);
        } elseif ($getQueryString === 'delivered') {
            // Delivered Order Fetch
            $orders = Order::where('user_id', $team->user_id)->where('status', 2)
                            ->when($request->search, function ($query, $search) {
                                $query->where('order_number', 'LIKE', '%' . $search . '%');
                            })->paginate(10);
        } elseif ($getQueryString === 'completed') {
            // Completed Order Fetch
            $orders = Order::where('user_id', $team->user_id)->where('status', 3)
                            ->when($request->search, function ($query, $search) {
                                $query->where('order_number', 'LIKE', '%' . $search . '%');
                            })->paginate(10);
        } elseif ($getQueryString === 'cancelled') {
            // Cancelled Order Fetch
            $orders = Order::where('user_id', $team->user_id)->where('status', 4)
                            ->when($request->search, function ($query, $search) {
                                $query->where('order_number', 'LIKE', '%' . $search . '%');
                            })->paginate(10);
        }
        return Inertia::render('Orders/Orders', [
            'orders' => $orders,
            'query_string' => $getQueryString,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $complexities = Complexity::with('image')->get();
        $service_addons = Service::all();
        return Inertia::render('Orders/CreateOrder', [
            'complexities' => $complexities,
            'service_addons' => $service_addons,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'          => 'required',
            'complexityItem'   => 'required',
            'isPayTerms'       => 'required',
            'quantity'         => 'required',
            'fileType'         => 'required',
            'background'       => 'required',
            'uploads'          => 'required',
        ]);

        $transactionId = $request->transactionId;
        if ($request->isPayTerms !== "0" && $request->token !== null) {
            $transactionId = $this->stripePayment($request->token, $request->totalCost);
        }

        $order                      = new Order();
        $order->user_id             = $request->user_id;
        $order->complexity_id       = $request->complexityItem['id'];
        $order->transaction_id      = $transactionId;
        $order->payment_status      = isset($transactionId) ? 'Paid' : 'Unpaid';
        $order->payment_terms       = intval($request->isPayTerms);
        $order->payment_method      = isset($transactionId) ? $request->paymentMethod : 'Manual';
        $order->qty                 = $request->quantity;
        $order->cp_price            = $request->complexityItem['price'];
        $order->total               = $request->totalCost;
        $order->return_file_types   = $request->fileType;
        $order->background_type     = $request->background;
        $order->instructions        = $request->instruction;
        $order->deadline            = intval($request->deadline);

        // Generate Order Number
        $latestOrder                = Order::orderBy('id','DESC')->first();
        $setNumber                  = isset($latestOrder->id) ? $latestOrder->id : 0;
        $order_nr                   = str_pad( $setNumber + 1, 4, "1000", STR_PAD_LEFT);
        $order->order_number        = $order_nr;
        $order->save();

        if (isset($order->id)) {
            // Image File Update With Order ID
            $uploads = $request->uploads;
            foreach ($uploads as $upload) {
                $file = File::find($upload['id']);
                $file->order_id = $order->id;
                $file->save();
            }
            // Store Order Details
            $service_addons = $request->addons;
            foreach ($service_addons as $item) {
                $order_details                  = new OrderDetail();
                $order_details->order_id        = $order->id;
                $order_details->service_id      = array_key_exists('id', $item) ? $item['id'] : null;
                $order_details->name            = array_key_exists('name', $item) ? $item['name'] : null;
                $order_details->qty             = $request->quantity;
                $order_details->price           = array_key_exists('price', $item) ? $item['price'] : null;
                $order_details->instructions    = array_key_exists('instruction', $item) ? $item['instruction'] : null;
                $order_details->total_price     = $request->quantity * floatval($item['price']);
                $order_details->save();
            }

            // Create Invoice
            $invoice                    = new Invoice();
            $invoice->order_id          = $order->id;
            $invoice->due_date          = Carbon::now()->addHours(intval($request->deadline));
            $invoice->total             = $request->totalCost;
            $invoice->status            = isset($transactionId) ? 1 : 0;

            // Generate Invoice Number
            $latestInvoice              = Invoice::orderBy('id','DESC')->first();
            $setInvoice                 = isset($latestInvoice->id) ? $latestInvoice->id : 0;
            $invoice_nr                 = str_pad( $setInvoice + 1, 6, "100000", STR_PAD_LEFT);
            $invoice->invoice_number    = $invoice_nr;
            $invoice->save();
        }
        return Redirect::route('user.invoice.show', $invoice->invoice_number);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \string|Stripe\BalanceTransaction
     */
    public function stripePayment($stripeToken, $totalAmount)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe_payment = Stripe\Charge::create ([
            "amount" => floatval($totalAmount) * 100,
            "currency" => "usd",
            "source" => $stripeToken,
            "description" => "Purchase service from Omega Studio"
        ]);

        return $stripe_payment->balance_transaction;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $order_number
     * @return \Inertia\Response
     */
    public function show($order_number)
    {
        $order = Order::with('order_details', 'upload_files', 'complexity')
                            ->where('order_number', $order_number)->first();
        return Inertia::render('Orders/OrderView', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploads(Request $request)
    {
        $upload = $this->user_single_upload($request->file('files'));
        return response()->json(['id' => $upload, 'name' => $request->file('files')->getClientOriginalName()]);
    }

    /**
     * Remove the specified upload resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadDestroy($id)
    {
        $destroy = $this->single_file_destroy($id);
        if ($destroy) {
            return Redirect::back();
        } else {
            return Redirect::back()->withErrors('OOPS! File not found.');
        }
    }

    /**
     * Remove the specified upload resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadDestroyAll(Request $request)
    {
        $this->multiple_file_destroy((array)json_decode($request->data, true));
        return response()->json('deleted');
    }
}
