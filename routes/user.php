<?php

use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\User\UserPageController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserUploadController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Controllers\User\UserAddressController;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/quotations', [UserPageController::class, 'quotations'])->name('user.quotations');

    // Invoice Related Routes
    Route::get('/invoices', [UserPageController::class, 'invoices'])->name('user.invoices');
    Route::get('/invoice/{number}', [UserPageController::class, 'show'])->name('user.invoice.show');
    // Order Related Routes
    Route::get('/orders', [UserOrderController::class, 'index'])->name('user.orders');
    Route::get('/orders/{number}', [UserOrderController::class, 'show'])->name('user.orders.show');
    Route::get('/orders/create', [UserOrderController::class, 'create'])->name('user.orders.create');
    Route::post('/orders/store', [UserOrderController::class, 'store'])->name('user.orders.store');
    Route::post('/orders/uploads', [UserOrderController::class, 'uploads'])->name('user.orders.uploads');
    Route::delete('/orders/uploads/{id}', [UserOrderController::class, 'uploadDestroy'])->name('user.orders.uploads.destroy');
    Route::get('/orders/uploads/destroy', [UserOrderController::class, 'uploadDestroyAll'])->name('user.orders.uploads.destroy.all');

    // User Account & Profile...
    Route::get('/account', [UserAccountController::class, 'show'])->name('user.account.show');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('user.profile.show');
    Route::delete('/profile-photo', [ProfilePhotoController::class, 'destroy'])->name('current-user-photo.destroy');

    // My Custom Address Routes
    Route::get('/account/address', [UserAddressController::class, 'index'])->name('user.account.address');
    Route::post('/account/address', [UserAddressController::class, 'store'])->name('user.account.address.store');
    Route::put('/account/address', [UserAddressController::class, 'update'])->name('user.account.address.update');
    // My Custom Change Password Routes
    Route::get('/account/change-password', [UserAccountController::class, 'changePassword'])->name('user.account.change.password');

    // My Custom Two-Factor Authentication Routes
    Route::get('/account/security', [UserAccountController::class, 'security'])->name('user.account.security');

    //Browser Sessions Routes
    Route::get('/account/sessions', [UserAccountController::class, 'showSessions'])->name('user.account.sessions');
    Route::delete('/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])->name('other-browser-sessions.destroy');

    // Delete User Routes
    if (Jetstream::hasAccountDeletionFeatures()) {
        Route::get('/account/delete', [UserAccountController::class, 'showDelete'])->name('user.account.delete');
        Route::delete('/', [CurrentUserController::class, 'destroy'])->name('current-user.destroy');
    }

    // File Manager & File Uploads Routes
    Route::get('/files', [UserUploadController::class, 'index'])->name('user.files');
    Route::delete('/files/{id}', [UserUploadController::class, 'destroy'])->name('user.files.destroy');
    Route::get('/files/download/{id}', [UserUploadController::class, 'downloadFile'])->name('user.files.download');

    // Teams...
    if (Jetstream::hasTeamFeatures()) {
        Route::get('/teams/create', [TeamController::class, 'create'])->name('user.teams.create');
        Route::post('/teams', [TeamController::class, 'store'])->name('user.teams.store');
        Route::get('/teams/{team}', [TeamController::class, 'show'])->name('user.teams.show');
        Route::put('/teams/{team}', [TeamController::class, 'update'])->name('user.teams.update');
        Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
        Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('user.current-team.update');
        // Team Members Related Routes
        Route::get('/teams/{team}/members', [UserPageController::class, 'members'])->name('user.teams.members');
        Route::post('/teams/{team}/members', [TeamMemberController::class, 'store'])->name('user.team.members.store');
        Route::put('/teams/{team}/members/{user}', [TeamMemberController::class, 'update'])->name('team-members.update');
        Route::delete('/teams/{team}/members/{user}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');
        Route::get('/teams/{team}/members/create', [UserPageController::class, 'createMembers'])->name('user.teams.members.create');

        Route::delete('/team-invitations/{invitation}', [TeamInvitationController::class, 'destroy'])->name('user.team-invitations.destroy');
        Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])->middleware(['signed'])->name('team-invitations.accept');
    }

    // Support Routes
    Route::get('/support', [UserPageController::class, 'support'])->name('user.support.show');
});

if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
    Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
    Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
}
