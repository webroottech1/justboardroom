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






////////////////listing pages routes ////////////////////////////
Route::get('/', function () {
    return view('login-dashboard');
})->name('login-dashboard');


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

///////////// End listing pages routes  ///////////////////

Route::get('/the-why', function () {
    return view('the-whypage');
})->name('the-why'); 

// Route::get('/home', function () {
//     return view('home');
// })->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

// Auth::routes();

// Route::get('/mypage', [App\Http\Controllers\HomeController::class, 'index'])->name('mypage');
