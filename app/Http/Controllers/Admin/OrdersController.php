<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\OrderDeliveryFilesUpload;
use App\Http\Controllers\Controller;
use App\Jobs\OrderDeliverJob;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query_string = $request->status ?? 'all';
        if ($query_string === 'all' ) {
            // All Order Fetch
            $orders = Order::with('user')->latest()->get();
        } elseif ($query_string === 'open') {
            // Open Order Fetch
            $orders = Order::with('user')->where('status', 1)->latest()->get();
        } elseif ($query_string === 'unpaid') {
            // Unpaid Order Fetch
            $orders = Order::with('user')->where('payment_status', 'Unpaid')->whereNotIn('status', [4])
                                ->latest()->get();
        } elseif ($query_string === 'delivered') {
            // Delivered Order Fetch
            $orders = Order::with('user')->where('status', 2)->latest()->get();
        } elseif ($query_string === 'completed') {
            // Completed Order Fetch
            $orders = Order::with('user')->where('status', 3)->latest()->get();
        } elseif ($query_string === 'cancelled') {
            // Cancelled Order Fetch
            $orders = Order::with('user')->where('status', 4)->latest()->get();
        }
        return view('admin.pages.order.orders', compact('orders', 'query_string'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function cancelled_request()
    {
        // Cancelled Order Fetch
        $orders = Order::with('user')->where('is_refund', 2)->latest()->get();
        return view('admin.pages.order.orders-cancelled', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $order_number
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($order_number)
    {
        $order = Order::with(['user', 'complexity', 'order_details.service', 'upload_files'])
                            ->where('order_number', $order_number)->first();
        $orders = Order::with(['user', 'delivery_files'])->whereNotIn('status', [0, 4])->count();
        $address = Address::with(['get_state', 'get_country'])->where('user_id', $order->user->id)->first();
        return view('admin.pages.order.orders-view', compact('order', 'address', 'orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $order_number
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Request $request, $order_number)
    {
        $query_string = $request->status;
        $order = Order::where('order_number', $order_number)->first();
        if ($query_string === 'under-review') {
            $order->status = 1;
        } elseif ($query_string === 'deliver-order') {
            $order->status = 2;
        } elseif ($query_string === 'cancel-order') {
            $order->status = 4;
        }
        $order->save();
        return Redirect::back()->with('success', 'Order was accepted successfully!');
    }

    /**
     * Deliver the order resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $order_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deliver(Request $request, $order_id)
    {
        $files = $request->file('files');

        $request->validate([
            'files' => 'required|array|min:1',
            'files.*' => 'required|mimes:jpeg,png,jpg|max:10240',
        ], [
            'files.*.mimes' => 'Only jpeg, png, jpg files are allowed!',
            'files.*.max' => 'Delivery image size is max 10MB/Per!',
        ]);

        $order = Order::find($order_id);
        $order->delivered = Carbon::now();
        $order->status = 2;
        $order->save();

        // Upload Files
        foreach ($files as $file) {
            OrderDeliveryFilesUpload::upload($file, $order->user_id, $order->id);
        }

        return Redirect::back()->with('success', 'Order was delivered successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $order_number
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $order_number)
    {

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
}
