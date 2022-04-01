<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingCalendarController;


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

    Route::get('/listing/dashboard', [HomeController::class, 'index'])->name('listing-dashboard');

    Route::get('/listing/create',[ListingController::class, 'create'])->name('listing.create');

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
    Route::post('/listing/add/boardroominfo', [ListingController::class, 'SaveBoardroomInfo'])->name('add-boardroominfo');
    Route::post('/listing/add/photos', [ListingController::class, 'SavePhotos'])->name('add-boardroomphotos');
    Route::post('/listing/add/price', [ListingController::class, 'SavePrice'])->name('add-price');
    Route::post('/listing/submitForReview', [ListingController::class, 'submitForReview'])->name('add-submitForReview');
    Route::post('/listing/add/request', [ListingController::class, 'SaveRequest'])->name('add-request');
   
   
    Route::get('/user/{id}/update', [ListingController::class, 'UserProfile'])->name('update-profile');
    Route::put('/user/{id}/update', [ListingController::class, 'UserProfileUpdate']);

    Route::get('/listing/calender',[ListingCalendarController::class, 'index'])->name('listingCalender');

    Route::get('/listing/bookings', [ListingCalendarController::class, 'getAll']);

    Route::get('/json/states',[HomeController::class, 'states'] )->name('json.states');


    Route::get('/listing/edit/{id}', [ListingController::class, 'EditListing'])->name('edit-listing');
    Route::post('/listing/get/photos', [ListingController::class, 'GetUploadedImages'])->name('get-photos');
    //Route::get('/listing/{id}/bookings', 'ListingCalendarController@getBooking');

});

Route::get('/the-why', function () {
    return view('the-whypage');
})->name('the-why');


Auth::routes();

Route::get('/listing/dashboard', [HomeController::class, 'index'])->name('dashboard');
