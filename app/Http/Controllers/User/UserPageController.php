<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\File;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;

class UserPageController extends Controller
{
    /**
     * Display a listing of the dashboard resource.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {
        $team           = Team::find(Auth::user()->current_team_id);
        // Total Orders Count
        $total_orders   = Order::where('user_id', $team->user_id)->count();
        $month_orders   = Order::where('user_id', $team->user_id)
                                ->where('created_at', '>=', Carbon::today()
                                    ->subDays(30))->count();
        // Total Spend Count
        $total_spend   = Order::where('user_id', $team->user_id)->sum('total');
        $month_spend   = Order::where('user_id', $team->user_id)
                                ->where('created_at', '>=', Carbon::today()
                                    ->subDays(30))->sum('total');
        $last_year    = Order::where('user_id', $team->user_id)
                                ->where('created_at', '>=', Carbon::today()
                                    ->subYear())->sum('total');

        // Chart data
        // 12 Months Report For Spend Amount
        $find_monthly_spent = Order::where('user_id', $team->user_id)->where('status', [0, 1, 2, 3])
                                        ->select(DB::raw("SUM(total) as count"))
                                                ->whereYear('created_at', date('Y'))
                                                    ->groupBy(DB::raw("Month(created_at)"))
                                                        ->pluck('count');

        $find_spent_month = Order::where('user_id', $team->user_id)->where('status', [0, 1, 2, 3])
                                    ->select(DB::raw("Month(created_at) as month"))
                                            ->whereYear('created_at', date('Y'))
                                                ->groupBy(DB::raw("Month(created_at)"))
                                                    ->pluck('month');


        $result_per_spent = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($find_spent_month as $key => $month) {
            $result_per_spent[$month] = $find_monthly_spent[$key];
        }

        // Cancel Orders
        $find_monthly_cancel = Order::where('user_id', $team->user_id)
                                        ->select(DB::raw("SUM(total) as count"))
                                            ->where('status', 4)
                                                ->whereYear('created_at', date('Y'))
                                                    ->groupBy(DB::raw("Month(created_at)"))
                                                        ->pluck('count');

        $find_cancel_month = Order::where('user_id', $team->user_id)
                                        ->select(DB::raw("Month(created_at) as month"))
                                            ->where('status', 4)
                                                ->whereYear('created_at', date('Y'))
                                                    ->groupBy(DB::raw("Month(created_at)"))
                                                        ->pluck('month');

        $result_per_cancel = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($find_cancel_month as $key => $month) {
            $result_per_cancel[$month] = $find_monthly_cancel[$key];
        }

        // Top 3 Services
        $top_services    = DB::table('order_details')
                                    ->select('name', DB::raw('COUNT(name) as order_details'))
                                        ->groupBy('name')
                                            ->orderBy(DB::raw('COUNT(id)'), 'DESC')
                                                ->take(3)
                                                    ->get();

        //Invoices & Orders Query
        $invoices = Invoice::where('user_id', $team->user_id)->latest()->limit(6)->get();
        $orders = Order::where('user_id', $team->user_id)->latest()->limit(4)->get();
        $recent_activity = Order::where('user_id', $team->user_id)->latest()->limit(6)->get();

        return Inertia::render('Dashboard/Dashboard', [
            'card_items' => [
                'total_orders'  => $total_orders,
                'month_orders'  => $month_orders,
                'total_spend'   => $total_spend,
                'month_spend'   => $month_spend,
                'last_year'    => $last_year,
            ],
            'result_per_spent'  => $result_per_spent,
            'result_per_cancel' => $result_per_cancel,
            'top_services'      => $top_services,
            'invoices'          => $invoices,
            'orders'            => $orders,
            'recent_activity'  => $recent_activity,
        ]);
    }

    /**
     * Display a listing of the invoices resource.
     *
     * @return \Inertia\Response
     */
    public function invoices()
    {
        $team = Team::find(Auth::user()->current_team_id);
        $invoices = Invoice::with('order.complexity')->where('user_id', $team->user_id)->paginate(10);
        return Inertia::render('Invoices/Invoices', [
            'invoices'  => $invoices,
        ]);
    }

    /**
     * Display a listing of the Quotations resource.
     *
     * @return \Inertia\Response
     */
    public function quotations()
    {
        return Inertia::render('Quotations/Quotations');
    }

    /**
     * Display a listing of the profile resource.
     *
     * @return \Inertia\Response
     */
    public function profile()
    {
        $team = Team::find(Auth::user()->current_team_id);
        $totalOrders = Order::where('user_id', $team->user_id)->get();
        $latestOrders = Order::where('user_id', $team->user_id)->latest()->limit(3)->get();
        $latestUploads = File::where('user_id', $team->user_id)->latest()->limit(3)->get();
        $deliveredOrders = Order::where('user_id', $team->user_id)->where('status', 2)->latest()->limit(3)->get();

        return Inertia::render('Profile/Show', [
            'orders'            => $totalOrders,
            'latestOrders'      => $latestOrders,
            'latestUploads'      => $latestUploads,
            'deliveredOrders'   => $deliveredOrders,
        ]);
    }

    /**
     * Display a listing of the user search resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $team = Team::find(Auth::user()->current_team_id);

        $orders = Order::where('user_id', $team->user_id)
                        ->when($request->search, function ($query, $search) {
                            $query->where('order_number', 'LIKE', '%' . $search . '%');
                        })->limit(5)->get();

        $invoices = Invoice::where('user_id', $team->user_id)
                            ->when($request->search, function ($query, $search) {
                                $query->where('invoice_number', 'LIKE', '%' . $search . '%');
                            })->limit(5)->get();

        $quotations = [];

        return response()->json(['orders' => $orders, 'invoices' => $invoices, 'quotations' => $quotations]);
    }

    /**
     * Display a listing of the members resource.
     *
     * @return \Inertia\Response
     */
    public function members(Request $request, $teamId)
    {
        $team = Jetstream::newTeamModel()->findOrFail($teamId);
        $users = Team::find($teamId)->users()->when($request->search, function ($query, $search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->paginate(10);

        Gate::authorize('view', $team);

        return Inertia::render('Teams/TeamMembers', [
            'members' => $users,
            'availableRoles' => array_values(Jetstream::$roles),
            'availablePermissions' => Jetstream::$permissions,
            'defaultPermissions' => Jetstream::$defaultPermissions,
            'permissions' => [
                'canAddTeamMembers' => Gate::check('addTeamMember', $team),
                'canDeleteTeam' => Gate::check('delete', $team),
                'canRemoveTeamMembers' => Gate::check('removeTeamMember', $team),
                'canUpdateTeam' => Gate::check('update', $team),
            ],
        ]);
    }

    /**
     * Display a listing of the create members resource.
     *
     * @return \Inertia\Response
     */
    public function createMembers($teamId)
    {
        return Inertia::render('Teams/CreateTeamMember', [
            'availableRoles' => array_values(Jetstream::$roles),
        ]);
    }

    /**
     * Display a listing of the support resource.
     *
     * @return \Inertia\Response
     */
    public function support()
    {
        return Inertia::render('Support/Support');
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
     * @param  int  $invoice_number
     * @return \Inertia\Response
     */
    public function show($invoice_number)
    {
        $invoice = Invoice::with('order.complexity')->where('invoice_number', $invoice_number)->first();
        $address = Address::with(['get_state', 'get_country'])->where('user_id', $invoice->order->user_id)->first();
        $orderDetails = OrderDetail::with('service')->where('order_id', $invoice->order_id)->get();

        return Inertia::render('Invoices/InvoiceView', [
            'invoice'       => $invoice,
            'address'       => $address,
            'orderDetails'  => $orderDetails,
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
}
