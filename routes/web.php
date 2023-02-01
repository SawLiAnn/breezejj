<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\CustomerDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
// Route::middleware('auth')->group(function () {
    // dd("a");

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // Route::get('/project', function () {
    //     return view('project');
    // });
    // Route::view('profile', 'profile')->name('profile');
    Route::resource('contacts', ContactController::class);
    Route::get('tenants/change/{tenantID}', [TenantController::class, 'changeTenant'])->name('tenants.change');
});

// Route::resource('customer_dashboard', CustomerDashboardController::class);
Route::get('customer_dashboard', [CustomerDashboardController::class, 'index']);

// Route::get('/customer_dashboard', function () {
//     return view('customer_dashboard');
// })->name('customer_dashboard');

// Route::domain(url()->current() . env('APP_URL'))->group(function () {
//     Route::get('customer_dashboard', function ($account, $id) {
//         //
//     });
// });

require __DIR__ . '/auth.php';
