<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use App\Livewire\Admin\Admins;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Spaces;
use App\Livewire\Admin\Users;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// Admin auth
Route::get('/admin/login', Login::class)->name('admin.login');
Route::get('/admin/forgot-password', ForgotPassword::class)->name('admin.password.request');
Route::get('/admin/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect()->route('admin.login');
})->name('admin.logout');

// Admin panel
Route::prefix('admin')->middleware(EnsureUserIsAdmin::class)->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');
    Route::get('/users', Users::class)->name('admin.users');
    Route::get('/spaces', Spaces::class)->name('admin.spaces');
    Route::get('/admins', Admins::class)->name('admin.admins');
});

Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
