<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        //dd($data);

        if($data['list_id'] == 0){

        }

    }
}
