<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Addresses;
use App\Models\UserDetail;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\ListingCapacity;
use App\Models\ListingUserDefinedAmenity;
use App\Models\ListingGallery;
use App\Models\ListingCalendar;
use App\Models\HostingRule;
use Illuminate\Support\Carbon;
use Image;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{

    public function create(){

        $days = [
            'mon' => 'Monday',
            'tue' => 'Tuesday',
            'wed' => 'Wednesday',
            'thu' => 'Thursday',
            'fri' => 'Friday',
            'sat' => 'Saturday',
            'sun' => 'Sunday',
            ];

        $clock = [];

        $default = '19:00';
        $interval = '+60 minutes';

        $current = strtotime( '06:00' );
        $end = strtotime( '23:00');

        while( $current <= $end ) {
            $time = date( 'H:i', $current );
            $clock[$time] = date( 'h.i A', $current );
            // $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
            $current = strtotime( $interval, $current );
        }
       //dd($days);
        $listing_type=1;
        $listingStep = 1 ;

        $listingData = '';

        if(session('listingSpace') != null){
            $listing_id = session('listingSpace');
            $listingData = Listing::find($listing_id);
            $listingStep = $listingData->step ;
        }
        /* return view('Listing.create-address', compact('day_from','day_to','amenities_building', 'amenities_boardroom', 'amenities_tech', 'capacity', 'address', 'about', 'amenities', 'user_amen','days','clock','user','advance_notice','list_id')); */

        return view('listing.create-listing',compact('days','clock','listingStep','listingData'));
    }

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

            //Adding listing id to session
            session(['listingSpace' => $listing->id]);

            if($listingCreated){

                $response = [
                    'id' =>$listing->id,
                    'status' => 1,
                    'message' => 'Building Address added Successfully',
                ];


                return response()->json($response);
            }else{
                return response()->json([500, 'Something Went wrong!' ]);
            }
        }else{

            $listing = Listing::find($data['list_id']);

            if($listing->step < 1){
                $listing->step = 1;
                $listing->save();
            }

            $address = Addresses::where('id', $listing->address_id)->first();
            //dd($address);
            if($address) {
                $address->formatted_address = $data['formatted_address'];
                $shortAddress = explode(',',$data['formatted_address']);
                $address->address = $shortAddress[0];
                $address->postal_code = $data['postal_code'] ?? null;
                $address->lat = $data['lat'] ?? null;
                $address->lng = $data['lng'] ?? null;
                $address->city = $data['country']??null;
                $address->province = $data['province']??null;
                $address->building_name = $data['building_name'] ?? null;
                $address->intersection_a = $data['intersection_a'] ?? null;
                $address->intersection_b = $data['intersection_b'] ?? null;
                $address->update();
                if (empty(session()->get('list_id'))) {
                    session()->put('list_id', $data['list_id']);
                } else {
                    session()->forget('list_id');
                    //$list_id = session()->get('list_id');
                    session()->put('list_id', $data['list_id']);

                }
            } else {
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
                $address->intersection_a = $data['intersection_a'] ?? null;
                $address->intersection_b = $data['intersection_b'] ?? null;
                $address->save();
                $current_listing = Listing::find($listing->id);
                $listing->status = 0;
                $current_listing->address_id = $address->id;
                $current_listing->save();
                $current_listing->address()->save($address);

                session()->forget('list_id');
                session()->put('list_id', $listing->id);
            }
            return response()->json([
                'id' => $listing->id,
                'message' => 'Address Updated Successfully',
            ], 200);

        }

    }

    public function SaveBoardroomInfo(Request $request){

       // dd($request);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:60',
            'description'=>'required',
            'capacity_id' =>'required',
        ],['name.required' => 'Please give your boardroom a name',
            'description.required'=>'Please give your boardroom a description',
            'capacity_id.required'=>'Please select capacity of your boardroom',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = auth()->user();
        $data = $request->all();

        $listing = Listing::find($data['list_id']);
        //dd($listing);
        $listing->name = $data['name'];
        $listing->description = $data['description'];
        $listing->listing_capacity_id = $data['capacity_id'];

        //attach amenities id and amenities user defined
      //  dd($data['amenities']);

        if (isset($data['amenities'])) {
            $listing->amenities()->sync($data['amenities']);
        }

        if ($data['other_amenities'] > 0) {

            $existing_amen = ListingUserDefinedAmenity::where('listing_id', '=', $data['list_id'])->get();

            //del all user amenities
            if ($existing_amen) {
                foreach ($existing_amen as $amen) {
                    $amen->delete();
                }
            }

            foreach ($data['user_amen'] as $user_amen) {
                if($user_amen) {
                    $usr_amenities = new ListingUserDefinedAmenity();
                    $usr_amenities->listing_id = $data['list_id'];
                    $usr_amenities->user_amenity = $user_amen;
                    $usr_amenities->save();
                }
            }

        }else {
            $existing_amen = ListingUserDefinedAmenity::where('listing_id', '=', $data['list_id'])->get();

            if ($existing_amen) {
                foreach ($existing_amen as $amen) {
                    $amen->delete();
                }
            }
        }
        if($listing->step > 2){

        }
        else{
            $listing->step = 2;
        }
        $listing->update();

        return response()->json([
            'id' => $listing->id,
            'message' => 'Listing info added Successfully',
        ], 200);
    }

    public function SavePhotos(Request $request){
        //dd($request);

        $images = $request->file('files'); // new uploaded images


        $filename = json_decode($request->input('filenames'));

        $allFile = json_decode($request->input('files')); // array of all images previous and new
        if(count($allFile) == 0){
            return response()->json(['error' =>'Please share at least 1 photo of your boardroom'], 401);
        }

        $count = 0;
        foreach ($allFile as $file) {
            if (!$file->id == null) {
                $image = ListingGallery::find($file->id);
                $pos = array_search($file->name, $filename);
                $image->preview_image=false;
                $image->order = $pos;

                if($pos == 0){
                    $image->preview_image = true;
                }
                $image->save();
                $listing = Listing::find($image->listing_id);
                if($listing->step > 3){

                }else{
                    $listing->step = 3;
                }
                $listing->save();
            } else {
                if(isset($images)){
                    foreach ($images as $k => $val) {
                        $imageName = $val->getClientOriginalName();
                        $img_exp = explode(".", $imageName);
                        $name = $img_exp['0'];
                        $ext = substr(strrchr($imageName, '.'), 1);
                        $uniquename = $name . "." . rand(0, 999) . "." . $ext;
                        if ($imageName == $file->name) {
                            $thumbnailImage = Image::make($val);
                            $thumbnailPath = public_path() . '/thumbnail/';
                            $originalPath = public_path() . '/Images/';

                            $new_name = rand() . '.' . $val->getClientOriginalExtension();
                            $val->move($originalPath, $new_name);


                            $thumbnailImage->save($originalPath . $uniquename);
                            $thumbnailImage->resize(120, 120);
                            $thumbnailImage->save($thumbnailPath . $uniquename);

                            $imageUpload = new ListingGallery();
                            $imageUpload->picture = $uniquename;
                            $imageUpload->picture_path = $originalPath;

                            $appImage = Image::make($originalPath.'/'.$new_name);
                            $appImage->resize(500, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $appImage->save($originalPath.'/'.$new_name);

                            $imageUpload->picture_name = $new_name;
                            $imageUpload->mobile_path = $originalPath; //.'/'.$new_name;

                            $imageUpload->listing_id = $request->input('list_id');

                            //$imageUpload->size = $imgSize;
                            $pos = array_search($imageName, $filename);
                            $imageUpload->order = $pos;
                            if($pos == 0){
                                $imageUpload->preview_img = true;
                                $listing = Listing::find($request->input('list_id'));

                                $listing->picture = $uniquename;

                                $listing->save();
                            }
                            $listing = Listing::find($request->input('list_id'));
                            if($listing->step > 3){

                            }else{
                                $listing->step = 3;
                            }

                            $listing->save();
                            $imageUpload->save();
                        }

                    }

                }

            }
            $count++;
        }
        return response()->json(['msg' => 'Image successfully Loaded']);
    }

    public function SavePrice(Request $request){
        //dd($request);

        $validator = Validator::make($request->all(),
        [
            'per_hour_rate' =>'required|numeric|min:1',
            'min_hour'      =>'required',
            'half_day_discount' => 'required',
            'rate_currency' => 'required',
        ],
        [   'per_hour_rate.required' => 'Please enter  your hourly rate',
            'per_hour_rate.min' => 'Please enter your hourly rate ',
            'min_hour.required'=>'Please enter minimum booking duration',
            'rate_currency.required'=>'Please select currency',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $minimum_hours = $request->input('min_hour');

        if($minimum_hours == 0){
            return response()->json(['minError' =>'Please enter minimum booking duration'], 401);

        }

        /**
         * Validation for Minimum hour criteria
         */
        $daysVal = ['mon'=>'monVal','tue'=>'tueVal','wed'=>'wedVal','thr'=>'thrVal','fri'=>'friVal','sat'=>'satVal','sun'=>'sunVal'];
        $daysArr = ['mon'=>'Monday','tue'=>'Tuesday','wed'=>'Wednesday','thr'=>'Thursday','fri'=>'Friday','sat'=>'Saturday','sun'=>'Sunday'];
        foreach($daysVal as $key=>$day){
            if(!is_null($request->input($day))){
                if($request->input($day)[0]['from'] != 0){
                    $totalDuration = 0;
                    if( is_array($request->input($day)[0]['from']) ){
                        foreach($request->input($day)[0]['from'] as $k => $v)
                        {
                            $end = $request->input($day)[0]['to'][$k];
                            $startTime  = Carbon::parse($v);
                            if($end == '00:00'){ $end = '24:00'; };
                            $finishTime = Carbon::parse($end);
                            if($v > $end){
                                $finishTime->addHours(24);
                            };
                            $totalDuration += $finishTime->diffInHours($startTime);
                        }
                    }else {
                        $startTime  = Carbon::parse($request->input($day)[0]['from']);
                        $finishTime = Carbon::parse($request->input($day)[0]['to']);

                        $totalDuration = $finishTime->diffInHours($startTime);
                    }
                    if($totalDuration < $minimum_hours){
                        return response()->json(['minError' =>$daysArr[$key].' Minimum hour criteria is not matching'], 401);
                    }
                }
            }else if(is_null($request->input($day) ) ){
                return response()->json(['minError' =>' Please provide time slot for '.$daysArr[$key]], 401);
            }
        }

        if(count( $request->input('half_day_discount') ) < 2) {
            return response()->json(['minError' => 'Please select an option to offer half day discount" '], 401);
        }
        if($request->input('half_day_discount')[1] == 'hourhalfdiscountyes'){
            if($request->input('half_day_discount')[0] == 0){
                $validator = Validator::make($request->all(), [
                    'half_day_discount' =>'required|numeric|min:1|max:99',
                ],['half_day_discount.required' => 'Please provide half day discount',
                ]);

                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 401);
                }

            }

            $halfDisc = $request->input('half_day_discount')[0];
            $halfDaySwitch = true;
        }
        else{
            $halfDisc      = 0;
            $halfDaySwitch = false;
        }

        if(count( $request->input('full_day_discount') ) < 2) {
            return response()->json(['minError' => 'Please select an option to offer full day discount'], 401);
        }
        if($request->input('full_day_discount')[1] == 'dailybookingdiscountyes'){

            if($request->input('full_day_discount')[0] == 0){
                $validator = Validator::make($request->all(), [
                    'full_day_discount' =>'required|numeric|min:1|max:99',
                ],['full_day_discount.required' => 'Please provide full day discount',
                ]);

                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 401);
                }
            }
            $fullDisc = $request->input('full_day_discount')[0];
            $fullfDaySwitch = 1;
        }
        else{
            $fullDisc = 0;
            $fullfDaySwitch = 0;
        }

        if(is_null( $request->input('hst_check') ) ) {
            return response()->json(['minError' => 'Please select an option for Sales Tax'], 401);
        } else {
            $salesTax = 0;
        }


        /**
         * This is to save the time slots for each day of the week
         */
        $daysVal = ['mon'=>'monVal','tue'=>'tueVal','wed'=>'wedVal','thr'=>'thrVal','fri'=>'friVal','sat'=>'satVal','sun'=>'sunVal'];
        $weekdays = [];
        $anyDaySelected = false;
        foreach($daysVal as $key=>$day)
        {
            $timeRange = [];
            if($request->input($day))
            {
                if( is_array($request->input($day)[0]['from']) ){
                    foreach($request->input($day)[0]['from'] as $k=>$v)
                    {
                        $from = $v;
                        $to = $request->input($day)[0]['to'][$k];
                        $timeRange[] = $from.'-'.$to;
                    }
                    $anyDaySelected = true;
                }else{
                    $timeRange[] = implode("-",$request->input($day)[0]);
                }
                $timeRange = implode(";",$timeRange);
                $weekdays[$key] = $timeRange;
            }
        }
        $days = json_encode($weekdays);

        /**
         * Validates overlapping time slot
         */
        $converted = [];
        foreach($weekdays as $key=>$times)
        {
            $timeSlot = explode(';', $times);
            $arr = [];
            foreach($timeSlot as $time) {
                $timeSlot = explode('-', $time);
                $s  = Carbon::parse($timeSlot[0]);
                $e  = Carbon::parse($timeSlot[1]);
                $arr[] = ["s" => $s, "e" => $e];
            }
            $converted[$key] = $arr;
        }
        $dates_overlap = false;
        foreach($converted as $times)
        {
            $numTimes = count($times);
            for ($i=0; $i<$numTimes; $i++)
            {
                if($i > 0){
                    for ($j=0; $j<$i;$j++) {
                        if($times[$i]['s'] > $times[$i]['e'] || $times[$i]['s'] < $times[$j]['e'] || $times[$j]['s'] > $times[$j]['e']) {
                            $dates_overlap = true;
                            break;
                        }
                    }
                }

                if($times[$i]['s'] == $times[$i]['e']){
                    $anyDaySelected = false;
                }
            }
        }
        if($dates_overlap) return response()->json(['minError' =>'Selected Time Slots are overlapping. '], 401);


        if(!$anyDaySelected) return response()->json(['minError' =>'You must select a minimum of one day with a minimum of one hour of availability'], 401);

        /**
         * Validates if the value selected is later than the end time
         */
        $converted = [];
        $dates_later_endtime = false;
        foreach($weekdays as $key=>$times)
        {
            $timeSlot = explode(';', $times);
            $arr = [];
            foreach($timeSlot as $time) {
                $timeSlot = explode('-', $time);
                $s  = Carbon::parse($timeSlot[0]);
                $e  = Carbon::parse($timeSlot[1]);
                if ($s > $e ){
                    $dates_later_endtime = true;
                    break;
                }
            }
            if($dates_later_endtime){
                break;
            }
        }
        if($dates_later_endtime) return response()->json(['minError' =>'Selected Start Time is later than the Selected End Time.'], 401);

        /**
         * Persisting of data
         */
        $hourly_rate   = $request->input('per_hour_rate');
        $rate_currency   = $request->input('rate_currency');


        $listing = Listing::find($request->input('list_id'));
        //dd($listing);
        $listing->per_hour_rate = $hourly_rate;
        $listing->price_per_hour= $hourly_rate;
        $listing->min_hour = $minimum_hours;
        $listing->per_day_rate  = $hourly_rate * 8;
        $listing->price_per_day	= $hourly_rate * 8;
        $listing->half_day_discount =  $halfDaySwitch;
        $listing->half_discount_rate = $halfDisc;
        $listing->full_day_discount  = $fullfDaySwitch;
        $listing->full_discount_rate = $fullDisc;
        $listing->sale_tax  = $salesTax;
        $listing->currency  = $rate_currency;
        if($request->input('hst_check') == 'hstyes'){
            $listing->hst_check = true;
        }else{
            $listing->hst_check = false;
        }

        // check in listing calender if any entry for list id
        $listing_calender = ListingCalendar::where('listing_id','=',$request->input('list_id'))->first();
        if($listing_calender){
            $listing_calender->days = $days;
            $listing_calender->save();
        }else{
            $calender = new ListingCalendar();
            $calender->listing_id = $request->input('list_id');
            $calender->startDate = Carbon::now()->toDateTimeString();
            $calender->endDate = Carbon::now()->addYear(1);
            $calender->days = $days;
            $calender->save();
        }
        if($listing->step > 4){

        }else{
            $listing->step = 4;
        }

        $listing->save();

        return response()->json(['msg' => 'Listing Calender added Sucessfully'], 200);

    }

    public function submitForReview(Request $request){
        $data = $request->all();
       // dd($data);
        if($request->input('type') == 'review' && $request->input('type') ){

            $listing = Listing::find($data['list_id']);
            $listing->advance_notice = $data['advance_notice'];
            $listing->hosting_instruction = $data['hosting_instructions'];

            if (isset($data['hosting_rule']) && $data['hosting_rule'][0] != NULL) {

                $existing_rule = HostingRule::where('listing_id', '=', $data['list_id'])->get();

                if ($existing_rule) {
                    foreach ($existing_rule as $rule) {
                        $rule->delete();
                    }
                }
                // add all user defined amenities
                foreach ($data['hosting_rule'] as $hst) {
                    if($hst != NULL){
                        $hosting = new HostingRule();
                        $hosting->listing_id = $data['list_id'];
                        $hosting->hosting_rule  = $hst;
                        $hosting->save();
                    }else{
                        return response()->json([
                            'message' => 'Please enter valid hosting rule',
                        ], 401);
                    }

                }
            } else {
                $existing_rule = HostingRule::where('listing_id', '=', $data['list_id'])->get();

                if ($existing_rule) {
                    foreach ($existing_rule as $rule) {
                        $rule->delete();
                    }
                }
            }
            if($listing->step > 5){

            }else{
                $listing->step = 5;
            }

            $listing->update();

            return response()->json([
                'id' => $listing->id,
                'message' => 'Hosting info added Successfully',
            ], 200);

        }
    }

    public function SaveRequest(Request $request){
       // dd($request);
        //$user= auth()->user();

        /*if(!$user->isVerified) {
            return response()->json(['error' => ['Your account is not validated.']], 401);
        }*/
        $listing = Listing::find($request->input('list_id'));

        $yes = $request->input('requestApprovalYes');
        //$no = $request->input('requestApprovalNo');


        if($yes == 'true'){
            $listing->listing_type = 1;
        }else{
            $listing->listing_type = 0;
        }

        $listing->step = 6;
        $listing->status = 1;

        /* if($request->input('type') == 'review' && $request->input('type') ){
            // Agreed to the terms
            //$user->terms=1;
            $user->save();
        } */

        if(is_null($listing->is_first_listing) )
        {
            $listing->is_first_listing = 1;

            //\Mail::to($user->email)->send(new FirstListing($user));
        }

        $listing->save();

        return response()->json([
            'message' => 'Listing Request saved Successfully'
        ], 200);
    }


    public function EditListing($ListId){



        if ($ListId != 0) {

            session(['listingSpace' => $ListId]);

            $listing = Listing::find($ListId);
            $listing_type = $listing->listing_type;
            $address = Addresses::find($listing->address_id);
            $listingStep = $listing->step;
            $amenities = ListingAmenity::where('listing_id',$listing->id)->pluck('amenity_id');
            //$user_amen = $listing->userAmenities()->pluck('user_amenities');
        }
        //dd($amenities);
       // dd($listing->step);
        $capacity = ListingCapacity::get()->pluck('display', 'id')->toArray();
      //  $amenities_building = ListingAmenity::where('type', '=', 'building')->pluck('name', 'id')->toArray();
       /*  $amenities_boardroom = ListingAmenity::where('type', '=', 'boardroom')->pluck('name', 'id')->toArray();
        $amenities_tech = ListingAmenity::where('type', '=', 'technology')->pluck('name', 'id')->toArray(); */

        $calender_days = ListingCalendar::where('listing_id',$ListId)->first();

        $hosting_rule   = HostingRule::where('listing_id',$ListId)->get();

        $advance_notice = array(1,2,3);
        $list_id = $ListId;
        $day_from = [];
        $day_to = [];
        if(isset($calender_days)){
            $de_days   = json_decode($calender_days->days);
            $daysArr = ['mon' => 'Monday', 'tue' => 'Tuesday',
                        'wed' => 'Wednesday', 'thr' => 'Thursday',
                        'fri' => 'Friday', 'sat' => 'Saturday',
                        'sun' => 'Sunday'];

            $day_from  = [];
            $day_to  = [];

            foreach($daysArr as $key => $val)
            {
                if(!empty($de_days->$key) ){
                    $splitTime = explode(';', $de_days->$key);
                    foreach($splitTime as $time) {
                        $from = explode('-',$time)[0];
                        $day_from[$val][] = $from;
                        $to  = explode('-',$time)[1];
                        $day_to[$val][]    = $to;
                    }
                }
            }

        }



        $available = [];


        $days = [
            'mon' => 'Monday',
            'tue' => 'Tuesday',
            'wed' => 'Wednesday',
            'thu' => 'Thursday',
            'fri' => 'Friday',
            'sat' => 'Saturday',
            'sun' => 'Sunday',
            ];

        $clock = [];

        $default = '19:00';
        $interval = '+60 minutes';

        $current = strtotime( '00:00' );
        $end = strtotime( '23:00');

        while( $current <= $end ) {
            $time = date( 'H:i', $current );
            $clock[$time] = date( 'h.i A', $current );
            // $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
            $current = strtotime( $interval, $current );
        }

        return view('Listing.create-listing', compact('capacity','amenities', 'address', 'listing','days','clock','day_from','day_to','hosting_rule','advance_notice','list_id','listing_type','listingStep'));


    }

    public function GetUploadedImages(Request $request){
        //dd($ListId);

        dd($request);

        $data = $request->all();
        $file_list = [];
        if (isset($data['photo_list_id'])) {
            $picture = ListingGallery::where('listing_id', '=', $data['photo_list_id'])->get();
            foreach ($picture as $pic) {
                $path = env('APP_URL');
                $path .= '/thumbnail/' . $pic->picture_path . '/' . $pic->picture;
                $fileList[] = ['name' => $pic->picture, 'path' => $path, 'size' => $pic->size, 'id' => $pic->id];
            }
            return $fileList;
        }
    public function UserProfile(Request $request, $id){

    
        
        $user = DB::table('users')->find($id);
      //  $userDetail = DB::table('user_details')->find($id);

        $userDetail = UserDetail::where('user_id', $id)->first();

        // echo"<pre>";
        // print_r($userDetail);
        // die();
        return view('user/user-profile' ,['users' => $user , 'user_detail' => $userDetail ]);


    }
    public function UserProfileUpdate(Request $request, $id){
     
        $messages = [
            'firstname.required' => 'Profile : Please enter first name',     
            'lastname.required' => 'Profile : Please enter Last name',
            'phone.required' => 'Profile : Please enter Phone',
            'province.required' => 'Profile : Please enter Province/State',
            'city.required' => 'Profile : Please enter City',
            'address.required' => 'Profile : Please enter Address',
            'postal_code.required' => 'Profile : Please enter Postal Code or Zip Code',
            'country.required' => 'Profile : Please enter Country',
         
            'payee.required' => 'Payment : Please enter Payee (Person or Business)',
            'payment_province.required' => 'Payment : Please enter Province/State',
            'payment_city.required' => 'Payment : Please enter City',
            'payment_address.required' => 'Payment : Please enter Address',
            'payment_postal_code.required' => 'Payment : Please enter Postal Code or Zip Code',
            'payment_country.required' => 'Payment : Please enter Country',


          ];
        

        $validator = Validator::make($request->all(), [

            'firstname' => 'required|max:191',
            'lastname' => 'required|max:191',
            'city' => 'required|max:191',
            'phone' => 'required|max:191',
            'province' => 'required|max:191',
            'postal_code' => 'required|max:191',
            'country' => 'required|max:191',
            'address' => 'required|max:191',
            
            'payee' => 'required|max:191',
            'payment_province' => 'required|max:191',
            'payment_city' => 'required|max:191',
            'payment_address' => 'required|max:191',
            'payment_postal_code' => 'required|max:191',
            'payment_country' => 'required|max:191'
            


        ], $messages);

        if($validator->fails()){

            return response()->json([

                'status'=> 400,
                'errors'=>$validator->messages(),
            ]);
        } else {

           
             $user = UserDetail::where('user_id', $id)->first();
            
             if($user){  
            // $result = UserDetail::create($request->all());
            $result = UserDetail::where('user_id', $id)->update($request->all());
                return response()->json([
   
                   'status'=> 200,
                   'message'=>'User Updated Sucessfully',
                ]);
            
            }else{
                // dd($request);
                DB::table('user_details')
                ->insert($request->all());
               // $result = UserDetail::create($request->all());
               return response()->json([
    
                    'status'=> 200,
                    'message'=>'User Updated Sucessfully',
                 ]);
                
            }
            }
    
            return response()->json([
    
                'status'=> 400,
                'message'=>'User Not Found',
             ]);
    }

}









/* else {
            if($request->input('hst_check') == 'hstyes'){
                if(is_null($request->input('sales_tax') ) || $request->input('sales_tax') == 0 ){
                    $validator = Validator::make($request->all(), [
                        'sales_tax' =>'required|numeric|min:1|max:35',
                    ],['sales_tax.required' => 'Please provide sales tax',
                    ]);

                    if ($validator->fails()) {
                        return response()->json(['error' => $validator->errors()], 401);
                    }
                } else {
                    $user = Auth::user()->id;
                    $user_profile = UserProfile::where('user_id','=',$user)->first();
                    if(is_null($user_profile->tax_id) || $user_profile->tax_id == "") {
                        return response()->json(['minError' => 'To charge Sales Tax we need you to enter your Sales Tax ID Number.'], 401);
                    } else {
                        $salesTax = $request->input('sales_tax');
                    }
                }
            } */

         