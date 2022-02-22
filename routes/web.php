<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\MonthlyBillingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\UserConfigController;
use App\Http\Controllers\Admin\HistoryBillingController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\User\MonthlyBillingController as BillingUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('contact', function () {
    return view('pages.contact');
})->name('contact');

// Socialite Google
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// Midtrans Route
Route::get('billing/success', [MonthlyBillingController::class, 'MidtransCallback']);
Route::post('billing/success', [MonthlyBillingController::class, 'MidtransCallback']);

//Middlewware Group
Route::middleware(['auth'])->group(function () {
    // Route Dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // User Dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
        Route::get('/', [UserDashboard::class,'index'])->name('dashboard');
        Route::get('billing', [BillingUser::class,'index'])->name('billing');
    });

    // Admin Dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class,'index'])->name('dashboard');
        // Admin User Config
        Route::resource('user-config', '\App\Http\Controllers\Admin\UserConfigController');
        // Export Excel User
        Route::get('export', [UserConfigController::class, 'export_excel'])->name('export-user');
        // Admin Paket Internet
        Route::resource('package', '\App\Http\Controllers\Admin\PackageController');
        // Admin Pengeluaran Kas
        Route::resource('spend', '\App\Http\Controllers\Admin\SpendController');
        // Admin Tagihan User
        Route::resource('billing', '\App\Http\Controllers\Admin\MonthlyBillingController');
        // Admin Histori Tagihan
        Route::get('histori', [HistoryBillingController::class, 'index'])->name('histori');
    });

});

require __DIR__.'/auth.php';
