<?php

use App\Http\Controllers\Admins\CourseController;
use App\Http\Controllers\Admins\AdminUserController;
use App\Http\Controllers\Admins\InstructorController;
use App\Http\Controllers\Admins\TestimonialController;
use App\Http\Controllers\Admins\ValuedClientController;
use App\Http\Controllers\Admins\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admins\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admins\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admins\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admins\Auth\NewPasswordController;
use App\Http\Controllers\Admins\Auth\PasswordController;
use App\Http\Controllers\Admins\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admins\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {

    Route::get('/arks-kadmin/login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('/arks-kadmin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');

    Route::get('arks-kadmin/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('admin.password.email');

    Route::get('arks-kadmin/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
        ->name('admin.password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('kadmin-user/verify-email', EmailVerificationPromptController::class)
        ->name('admin.verification.notice');

    Route::get('kadmin-user/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('admin.verification.send');

    Route::get('kadmin-user/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::get('kadmin-user/change-password', [PasswordController::class, 'edit'])->name('admin.password.edit');
    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');
    Route::get('kadmin-user/profile', [AdminUserController::class, 'editProfile'])->name('admin.profile.edit');
    Route::put('kadmin-user/profile', [AdminUserController::class, 'updateProfile'])->name('admin.profile.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');

    Route::prefix('kadmin-user')->name('admin.')->group(function () {
        Route::resource('admin-users', AdminUserController::class)->except(['show']);
        Route::resource('instructors', InstructorController::class)->except(['show']);
        Route::resource('courses', CourseController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('valued-clients', ValuedClientController::class)->except(['show'])->parameters([
            'valued-clients' => 'valued_client',
        ]);
    });
});
