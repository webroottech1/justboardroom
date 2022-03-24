<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\Capacity;
use App\Models\Listing;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $listing = Listing::where('user_id',auth()->user()->id)->get();
        session()->forget('listingSpace');

        $ListingCapacity = Capacity::all();

        return view('listing/listing-dashboard', compact('listing','ListingCapacity'));
    }
}
