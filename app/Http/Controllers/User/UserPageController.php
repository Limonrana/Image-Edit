<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
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
        return Inertia::render('Dashboard');
    }

    /**
     * Display a listing of the orders resource.
     *
     * @return \Inertia\Response
     */
    public function orders(Request $request)
    {
        $getQueryString = $request->status;
        return Inertia::render('Orders/Orders');
    }

    /**
     * Display a listing of the invoices resource.
     *
     * @return \Inertia\Response
     */
    public function invoices()
    {
        return Inertia::render('Invoices/Invoices');
    }

    /**
     * Display a listing of the quotations resource.
     *
     * @return \Inertia\Response
     */
    public function quotations()
    {
        return Inertia::render('Quotations/Quotations');
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
