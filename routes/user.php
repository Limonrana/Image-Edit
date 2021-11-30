<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\User\UserPageController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Controllers\User\UserAddressController;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Inertia\CurrentUserController;
use Laravel\Jetstream\Http\Controllers\Inertia\OtherBrowserSessionsController;
use Laravel\Jetstream\Http\Controllers\Inertia\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Inertia\ProfilePhotoController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamMemberController;
use Laravel\Jetstream\Http\Controllers\Inertia\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;

/*
|--------------------------------------------------------------------------
| User Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// User Routes List Start
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/orders', [UserPageController::class, 'orders'])->name('user.orders');
    Route::get('/invoices', [UserPageController::class, 'invoices'])->name('user.invoices');
    Route::get('/quotations', [UserPageController::class, 'quotations'])->name('user.quotations');

    // User & Profile...
    Route::get('/account', [UserProfileController::class, 'show'])->name('profile.show');
    Route::delete('/profile-photo', [ProfilePhotoController::class, 'destroy'])->name('current-user-photo.destroy');
    Route::delete('/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])->name('other-browser-sessions.destroy');

    if (Jetstream::hasAccountDeletionFeatures()) {
        Route::delete('/', [CurrentUserController::class, 'destroy'])->name('current-user.destroy');
    }
    // My Custom Address Routes
    Route::get('/account/address', [UserAddressController::class, 'index'])->name('user.account.address');
    Route::post('/account/address', [UserAddressController::class, 'store'])->name('user.account.address.store');
    Route::put('/account/address', [UserAddressController::class, 'update'])->name('user.account.address.update');
    // My Custom Change Password Routes
    Route::get('/account/change-password', [UserAccountController::class, 'changePassword'])->name('user.account.change.password');

    // My Custom Two-Factor Authentication Routes
    Route::get('/account/security', [UserAccountController::class, 'security'])->name('user.account.security');

    // My Custom Browser Sessions Routes
    Route::get('/account/sessions', [UserAccountController::class, 'showSessions'])->name('user.account.sessions');

    // API...
    if (Jetstream::hasApiFeatures()) {
        Route::get('/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
        Route::post('/api-tokens', [ApiTokenController::class, 'store'])->name('api-tokens.store');
        Route::put('/api-tokens/{token}', [ApiTokenController::class, 'update'])->name('api-tokens.update');
        Route::delete('/api-tokens/{token}', [ApiTokenController::class, 'destroy'])->name('api-tokens.destroy');
    }

    // Teams...
    if (Jetstream::hasTeamFeatures()) {
        Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
        Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
        Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
        Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
        Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
        Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
        Route::post('/teams/{team}/members', [TeamMemberController::class, 'store'])->name('team-members.store');
        Route::put('/teams/{team}/members/{user}', [TeamMemberController::class, 'update'])->name('team-members.update');
        Route::delete('/teams/{team}/members/{user}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');

        Route::delete('/team-invitations/{invitation}', [TeamInvitationController::class, 'destroy'])->name('team-invitations.destroy');
        Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])->middleware(['signed'])->name('team-invitations.accept');
    }
});

if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
    Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
    Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
}
