<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;

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
    return view('login-dashboard');
})->name('login-dashboard');



Route::middleware('auth')->group(function () {

    Route::get('/listing/dashboard', function () {
        return view('/listing/listing-dashboard');
    })->name('listing-dashboard');

    Route::get('/listing/buildinginfo', function () {
        return view('/listing/listing-buildinginfo');
    })->name('listing-buildinginfo');

    Route::get('/listing/about', function () {
        return view('/listing/listing-about');
    })->name('listing-about');

    Route::get('/listing/approve-setting', function () {
        return view('/listing/listing-approve-setting');
    })->name('listing-approve-setting');

    Route::get('/listing/hosting-pref', function () {
        return view('/listing/listing-hosting-pref');
    })->name('listing-listing-hosting-pref');

    Route::get('/listing/listing-photos', function () {
        return view('/listing/listing-photos');
    })->name('listing-listing-photos');

    Route::get('/listing/price-availability', function () {
        return view('/listing/listing-price-availability');
    })->name('listing-price-availability');

    Route::post('/listing/add/address', [ListingController::class, 'SaveAddress'])->name('add-address');



});

Route::get('/the-why', function () {
    return view('the-whypage');
})->name('the-why');


Auth::routes();

Route::get('/listing/dashboard', [HomeController::class, 'index'])->name('dashboard');
