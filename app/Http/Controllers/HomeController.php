<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
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

        return view('listing/listing-dashboard', compact('listing'));
    }

    public function states(Request $request)
    {
        $data = file_get_contents(public_path('json/all_states.json') );
        return response()->json(['data'=> $data]);
    }
}
