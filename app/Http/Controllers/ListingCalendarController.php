<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Listing;
use App\Models\Booking;
use App\Models\ListingCalender;


class ListingCalendarController extends Controller
{
   
   
    public function index(){
        if (!auth()->user())
        {
            return \Redirect::route('/');
        }
        $user    = auth()->user();

        
        /**
         * If the user has existing token, set to session
         */
        // if (!empty($user->token) ){
        //     session()->put('gcToken', $user->token);
        // }else{
        //     session()->forget('gcToken');
        // }
       
        $userId = $user->id;

        // 
        if($user->user_type == '3'){
            $listing = Listing::whereNotIn('status',[4,0])
                    ->with('capacity')
                    ->orderBy('name')
                    ->get();
        } else {
            $listing = Listing::where('user_id','=',$userId)
                    ->WhereNotIn('status',[4,0])
                    ->with('capacity')
                    ->orderBy('name')
                    ->get();
        }

        $interval = '+60 minutes';

        $current = strtotime( '00:00' );
        $end = strtotime( '23:00');
        
        while( $current <= $end ) {
            $time = date( 'H:i', $current );
            $clock[$time] = date( 'h.i A', $current );
            // $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
            $current = strtotime( $interval, $current );
       
           // dd($listing);
        }
        return view('Calendar.index', compact('listing','clock'));

    }




    public function getAll(){
        $user    = auth()->user();
        if($user->user_type == 3){
            $events = Booking::whereIn('status',['Approved','succeeded'])
                    ->get();
        }else{
            $listing = Listing::where('user_id','=',$user->id)->pluck('id');
            $events = Booking::whereIn('status',['Approved','succeeded'])
                    ->whereIn('listing_id',$listing)
                    ->get();

        }

        
        $allevent = [];
        foreach($events as $event){
            $event_formatted = [];
           // $event_formatted['title'] = $event->title;
            $event_start_hour = explode(":",$event->start_hour);

            $listing_name = Listing::find($event->listing_id)->name;
            $event_formatted['title'] = $listing_name;
            $start_hour = $event_start_hour[0];
            $start_min =  $event_start_hour[1];
            $event_formatted['start_hour'] = $start_hour;
            $event_formatted['start_min'] = $start_min;
            $event_end_hour = explode(":",$event->end_hour);
            $end_hour = $event_end_hour[0];
            $end_min =  $event_end_hour[1];
            $event_formatted['end_hour'] = $end_hour;
            $event_formatted['end_min'] = $end_min;

            $startdate = new Carbon($event->start_date);
            $strtd = $startdate->format('d');
            $strtm = $startdate->format('n');
            $strty = $startdate->format('Y');

            $event_formatted['d'] = $strtd;
            $event_formatted['m'] =  ($strtm - 1);
            $event_formatted['y'] = $strty;
            if($event->type == 0){
                $event_formatted['color'] = '#FF671D';
            }elseif($event->type == 2){
                $event_formatted['color'] = '#FF0000';
            }else{
                $event_formatted['color'] = '#686058';
            }

            $event_formatted['sdate'] = $event->start_date;
            $event_formatted['edate'] = $event->end_date;
            $event_formatted['shour'] = date("g:i A", strtotime($event->start_hour));
            $event_formatted['ehour'] = date("g:i A", strtotime($event->end_hour));
            $event_formatted['building_name'] = $event->listing->address->first()->building_name;
            $event_formatted['room_name'] = $event->listing->name;
            $event_formatted['meeting_id'] = $event->meeting_pin;
            $name = $event->user->first_name." ".$event->user->last_name;
            $event_formatted['guest_name'] = $name??'';
            $event_formatted['guest_id'] = $event->user->id??'';
            $event_formatted['listing_id'] = $event->listing_id;
            $event_formatted['booking_type'] = $event->type;
            $event_formatted['payment_id'] = $event->payment_id;
            $event_formatted['booking_id'] = $event->id;
            array_push($allevent,$event_formatted);
            
        }
       /// dd($allevent);

        return response()->json([
            'data' => $allevent
        ], 200);
    }


    public function getBooking($list_id){
        session()->put('listId', $list_id);
        $events = Booking::where('listing_id','=',$list_id)
                ->whereIn('status',['Approved','succeeded'])
                ->get();

    
               
                $allevent = [];
              
        foreach($events as $event){
            $event_formatted = [];
           // $event_formatted['title'] = $event->title;
            $event_start_hour = explode(":",$event->start_hour);

            $start_hour = $event_start_hour[0];
            $start_min =  $event_start_hour[1];
            $event_formatted['start_hour'] = $start_hour;
            $event_formatted['start_min'] = $start_min;
            $event_end_hour = explode(":",$event->end_hour);
            $end_hour = $event_end_hour[0];
            $end_min =  $event_end_hour[1];
            $event_formatted['end_hour'] = $end_hour;
            $event_formatted['end_min'] = $end_min;


            $startdate = new Carbon($event->start_date);
            $strtd = $startdate->format('d');
            $strtm = $startdate->format('n');
            $strty = $startdate->format('Y');
            $event_formatted['d'] = $strtd;
            $event_formatted['m'] =  ($strtm - 1);
            $event_formatted['y'] = $strty;
            $listing_name = Listing::find($event->listing_id)->name;
            $event_formatted['title'] = is_null($event->note) ? $listing_name : $event->note;
            if($event->type == 0){
                $event_formatted['color'] = '#FF671D';
            }elseif($event->type == 2){
                $event_formatted['color'] = '#FF0000';
            }else{
                $event_formatted['color'] = '#686058';
            }

            //dd($event);
      
            $event_formatted['sdate'] = $event->start_date;
            $event_formatted['edate'] = $event->end_date;
            $event_formatted['shour'] =  date("g:i A", strtotime($event->start_hour));
            $event_formatted['ehour'] =  date("g:i A", strtotime($event->end_hour));
            $event_formatted['building_name'] = $event->listing->address->first()->building_name;
            $event_formatted['room_name'] = $event->listing->name;
            $event_formatted['meeting_id'] = $event->meeting_pin;
            $event_formatted['guest_name'] = $event->user->name;
           $event_formatted['guest_id'] = $event->user->id;
            $event_formatted['listing_id'] = $event->listing_id;
            $event_formatted['booking_type'] = $event->type;
            $event_formatted['payment_id'] = $event->payment_id;
            $event_formatted['booking_id'] = $event->id;

            array_push($allevent,$event_formatted);
            

        }
        
        $calendarList = ListingCalender::where('listing_id','=',$list_id )->get();
     //// dd($calendarList);
       
        return response()->json([
            'data' => $allevent,
            'timeAvailability' => $calendarList[0]->days
        ], 200);

    }
}
