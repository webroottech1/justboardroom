<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Addresses;
use App\Models\Listing;

class ListingController extends Controller
{

    public function SaveAddress(Request $request){

        $validator = Validator::make($request->all(), [
            'building_name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

        $data = $request->except('_token');


        if($data['list_id'] == 0){

            $address = new Addresses();
            $address->formatted_address = $data['formatted_address'];
            $address->postal_code = $data['postal_code'];
            $address->lat = $data['lat'];
            $address->lng = $data['lng'];
            $shortAddress = explode(',',$data['formatted_address']);
            $address->address = $shortAddress[0];
            $address->city = $data['country']??null;
            $address->province = $data['province']??null;
            $address->building_name = $data['building_name'] ?? null;

            $listing = new Listing();
            $listing->status = 0;
            $listing->user_id = auth()->user()->id;
            $listing->step = 1;
            $listing->save();

            $listing->address()->save($address);
            $list_created = Listing::find($listing->id);
            $list_created->address_id = $address->id;
            $listingCreated = $list_created->save();

            if($listingCreated){
                return response()->json([200, 'Address added Successfully!' ]);
            }else{
                return response()->json([500, 'Something Went wrong!' ]);
            }
        }else{

            $listing = Listing::find($data['list_id']);
            dd($listing);
        }

    }
}
