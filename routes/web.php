<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use App\Livewire\Admin\Admins;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Pages;
use App\Livewire\Admin\Spaces;
use App\Livewire\Admin\Users;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ResetPassword;
use App\Models\Page;
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
    Route::get('/pages', Pages::class)->name('admin.pages');
});

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/help', 'pages.help')->name('help');
Route::view('/careers', 'pages.careers')->name('careers');

Route::get('/privacy', function () {
    $page = Page::where('slug', 'privacy-policy')->first();

    return $page ? view('pages.dynamic', ['page' => $page]) : view('pages.privacy');
})->name('privacy');

Route::get('/terms', function () {
    $page = Page::where('slug', 'terms-of-use')->first();

    return $page ? view('pages.dynamic', ['page' => $page]) : view('pages.terms');
})->name('terms');
