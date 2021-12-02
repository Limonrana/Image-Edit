<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the Account Info resource.
     *
     * @return \Inertia\Response
     */
    public function show()
    {
        return Inertia::render('Account/Show');
    }

    /**
     * Show the general change password screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function changePassword()
    {
        return Inertia::render('Account/ChangePassword');
    }

    /**
     * Show the general Browser Sessions screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function showSessions(Request $request)
    {
        $user_profile_controller = new UserProfileController;
        return Inertia::render('Account/BrowserSessions', [
            'sessions' => $user_profile_controller->sessions($request)->all(),
        ]);
    }

    /**
     * Show the general Two-Factor Authentication screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function security()
    {
        return Inertia::render('Account/AccountSecurity');
    }

    /**
     * Show the general Account Delete screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function showDelete()
    {
        return Inertia::render('Account/AccountDelete');
    }

}
