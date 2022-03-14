<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Middleware;
use Laravel\Jetstream\Jetstream;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [

            'teamDetails' => function () use ($request) {
                $teamId = $request->user() ? $request->user()->current_team_id : null;
                if ($teamId) {
                    $team = Jetstream::newTeamModel()->findOrFail($teamId);
                    Gate::authorize('view', $team);
                    return $team->load('owner', 'users', 'teamInvitations');
                } else {
                    return null;
                }
            },
            'app_url' => function () use ($request) {
                return env('APP_URL', 'https://car-image-edit.test');
            },
            'csrf' => function () use ($request) {
                return $request->session()->token();
            },
            'stripe_pk' => function () use ($request) {
                return env('STRIPE_KEY', 'pk_test_yLs7aj48caHjjruntvFqPMMF00yAa5Xge7');
            },
            'paypal_client_id' => function () use ($request) {
                return env('PAYPAL_CLIENT_ID', 'AVuWkjFJRgr7puGU27wjxcH2hZGK_f2CLoN0NSm20AVxWvGl9danF_1DJWAe5ljgoAbd9XDdjkCYZdG4');
            },
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
        ]);
    }
}
