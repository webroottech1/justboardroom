<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Listing;
use App\Models\Booking;
use App\Models\ListingCalender;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ListingConversation;

class ListingCalendarController extends Controller
{
   
   
    public function index(){
        if (!auth()->user())
        {
            return \Redirect::route('/');
        }
        $user    = auth()->user();

        // dd($user);
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
        // $Message = ListingConversation::whereIn('created_by',['Approved'])
                    // ->get();

                    
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
            $msgCheck = ListingConversation::where("created_by","=",Auth::user()->id)
            ->where("receiver","=",$event->user->id)->where("listing_id","=",$event->listing_id)->count();

                if($msgCheck == 0 ){
                    $event_formatted['ChatIntiated'] = 0;

                }else{
                    $event_formatted['ChatIntiated'] = 1;

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
        // dd($allevent);

        return response()->json([
            'data' => $allevent
        ], 200);
    }


    public function getBooking($list_id){
        $user    = auth()->user();
        session()->put('listId', $list_id);
        $events = Booking::where('listing_id','=',$list_id)
                ->whereIn('status',['Approved','succeeded'])
                ->get();

    // print_r($events);
    //           dd($events);
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

            // dd($event);
            $msgCheck = ListingConversation::where("created_by","=",Auth::user()->id)
            ->where("receiver","=",$event->user->id)->where("listing_id","=",$event->listing_id)->count();

                if($msgCheck == 0 ){
                    $event_formatted['ChatIntiated'] = 0;

                }else{
                    $event_formatted['ChatIntiated'] = 1;

                }

      
            $event_formatted['sdate'] = $event->start_date;
            $event_formatted['edate'] = $event->end_date;
            $event_formatted['shour'] =  date("g:i A", strtotime($event->start_hour));
            $event_formatted['ehour'] =  date("g:i A", strtotime($event->end_hour));
            $event_formatted['building_name'] = $event->listing->address->first()->building_name;
            $event_formatted['room_name'] = $event->listing->name;
            $event_formatted['meeting_id'] = $event->meeting_pin;
            $name = $event->user->first_name." ".$event->user->last_name;
           
            $event_formatted['guest_name'] = $name;
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


    public function getBookingDetails($list_id){

        $today = Carbon::now()->tz('America/Toronto')->toDateString();
        $bookings = Booking::where('listing_id','=',$list_id)
                    ->where('start_date','=',$today)
                    ->where('status','=','Approved')
                    ->orderBy('start_hour')
                    ->get();

        $booking_ext = [];
        $output = '';
        foreach($bookings as $booking){
            $booking_dtl = [];
           // $booking_dtl['time'] = $booking->start_hour.'-'. $booking->end_hour;
            if($booking->type == 0){
                $type = 'external';
            }else{
                $type = 'internal';
            }

            //$booking_dtl['id'] = $booking->id;
            $user = User::where('id','=',$booking->user_id)->first();
            //$booking_dtl['userId'] = $booking->user_id;
           // $booking_dtl['UserName'] = $user->name;
            //array_push($booking_ext,$booking_dtl);

            $start_hour =  date("g:i A", strtotime($booking->start_hour));
            $end_hour   =  date("g:i A", strtotime($booking->end_hour));

            $output .='<div class="booking-unique">';
                $output .='<div class="booking-unique-'.$type.'">';
                        $output .='<div class="time-name-wrapper">';
                            $output .='<div class="time">'.$start_hour.' - '. $end_hour.'</div>';
                            $output .='<div class="user-name">'.$user->name.'</div>';
                        $output .='</div>';

                        $output .='<div class="action">';
                        $output .='<button type="submit" class="btn dropdown-toggle" data-toggle="dropdown">';
                            $output .='<img class="doticon" src="/Images/3doticon.png">';
                        $output .='</button>';
                        $output .='<div class="dropdown-menu">';
                        if($type == 'external'){
                            $output .='<a href="/api/inbox?listId='.$list_id.'&receiverId='.$booking->user_id.'">Message Guest</a>';
                            // $output .='<a href="/api/cancel/booking/'.$booking->id.'">Cancel Booking</a>';
                            $output .='<a href="" class="cancel-booking" id="cancel-booking" onclick="event.preventDefault();showCancelModal();">Cancel Booking</a>';
                        }
                        else{
                            $output .='<a href="/api/cancel/booking/'.$booking->id.'">Remove Booking</a>';
                        }

                    $output .='</div>';
                $output .='</div>';
            $output .='</div>';
            $output .='</div>';
        }
        return response()->json([
            'data' => $output,
        ], 200);
    }
}
