<?php

use Illuminate\Support\Facades\Route;

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
    return view('login_dashboard');
})->name('login-dashboard');

Route::get('/listing/dashboard', function () {
    return view('/listing/listing_dashboard');
})->name('listing-dashboard');

Route::get('/listing/buildinginfo', function () {
    return view('/listing/listing_buildinginfo');
})->name('listing-buildinginfo');

Route::get('/listing/about', function () {
    return view('/listing/listing_about');
})->name('listing-about');

Route::get('/the-why', function () {
    return view('the_whypage');
})->name('the-why'); 


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
