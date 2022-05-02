<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Listing;
use DB;
// use Mail;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ReportsController extends Controller
{
   
    public function index(){
        if (!auth()->user())
        {
            
            return \Redirect::route('/');

        }

        $user    = auth()->user();
        $userId  = $user->id;

        $boardroom = isset($_GET['bd_id']) ? $_GET['bd_id'] : '0';

        $month = isset($_GET['month']) ? $_GET['month'] : '6';

        
       // $boardroom = 3;
        $date = Carbon::now();
        //dd($date);
        $montharr = [];
        for($i = 0; $i < $month; $i++){
            $lastMonth =  Carbon::now()->subMonths($i)->format('n'); 
            $year = Carbon::now()->subMonths($i)->format('Y');
            $montharr[$lastMonth] = $year;
        }

       

        $boardrooms = Listing::where('user_id','=',$user->id)->Where('status','!=',0)->get();
        $graphArr = [];
        /**$query = "select month(start_date) as month,year(start_date) as year,listing_id,count(*) as totalBooking from `booking` ";
        $query .= " where  `start_date` < Now() and `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and `status` = 'Approved' and `type` = 0 ";
        $query .=  ($boardroom != '0' ? " and `listing_id` = $boardroom  " : "");
        $query .= " group by `month`,year,listing_id";
        
        $totBooking = DB::select($query);
        foreach($totBooking as $book){
            $gra[]  =  $book->month; 
            $gra[] = $book->year;
            $gra[] = $book->totalBooking;
            $gra[] = $book->listing_id;
        }    **/                
       

        if($boardroom != '0'){
            $query = "select CONCAT(month(start_date), '-', YEAR(start_date)) as month,count(*) as totalBooking from `bookings`";
            $query .= " where `listing_id` = ".$boardroom." and `start_date` < Now() and `status` IN ('Approved','succeeded') and `type` = 0 and";
            if($month == 6){
                $query .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH)";
            }else{
                $query .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 12 MONTH)";

            }
            $query .= " group by `month` order by month desc";
            //$query = "select CONCAT(month(start_date), '-', YEAR(start_date)) as month,count(*) as totalBooking from `booking` where `listing_id` = ".$boardroom." and `start_date` < Now() and `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and `status` = 'Approved' and `type` = 0 group by `month` order by month desc";
            $totBooking = DB::select($query);
            foreach($totBooking as $book){
                $gra[$book->month] = [];
                $gra[$book->month][$boardroom]  = $book->totalBooking; 
            }  
            $monthlyBillQuery = "select CONCAT(MONTHNAME(b.start_date), ',', YEAR(b.start_date)) as monthname,month(b.start_date) as month,year(b.start_date) as year,CONCAT(DATE_FORMAT(b.start_date,'%b'), ',', YEAR(b.start_date)) as smallMonth,count(*) as totalBooking,sum(p.payment_amount) as totalSalesPrice,Sum(p.payment_total) as totalPaidToHost from `bookings` as b inner join payments as p on b.payment_id = p.id";
            $monthlyBillQuery .= " where b.start_date < Now() and b.status IN ('Approved','succeeded') and b.type = 0 and `listing_id` = ".$boardroom." and";
            if($month == 6){
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH)";
            }else{
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 12 MONTH)";

            }

            $monthlyBillQuery .= " group by month,year,monthname,smallMonth order by year,month desc";
            $totalValues = DB::select($monthlyBillQuery);

        }else{

            $query = "select CONCAT(month(start_date), '- ', YEAR(start_date)) as month,count(*) as totalBooking,listing_id from `bookings` where  `start_date` < Now() and `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and `status` IN ('Approved','succeeded') and `type` = 0 group by `month`,listing_id";
            $totBooking = DB::select($query);

            $monthlyBillQuery = "select CONCAT(MONTHNAME(b.start_date), ',', YEAR(b.start_date)) as monthname,month(b.start_date) as month,year(b.start_date) as year,CONCAT(DATE_FORMAT(b.start_date,'%b'), ',', YEAR(b.start_date)) as smallMonth,count(*) as totalBooking,sum(p.payment_amount) as totalSalesPrice,Sum(p.payment_total) as totalPaidToHost from `bookings` as b inner join payments as p on b.payment_id = p.id inner join listings as l on b.listing_id = l.id";
            $monthlyBillQuery .= " where b.start_date < Now() and b.status IN ('Approved','succeeded') and b.type = 0 and";
            if($month == 6){
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH)";
            }else{
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 12 MONTH)";

            }


            $monthlyBillQuery .= " and l.user_id = ".$userId." and l.status != 0";

            $monthlyBillQuery .= " group by month,year,monthname,smallMonth order by year,month desc";

            
            //$monthlyBillQuery = "select CONCAT(MONTH(b.start_date), ',', YEAR(b.start_date)) as month,count(*) as totalBooking,sum(p.payment_amount) as totalSalesPrice,Sum(p.payment_total) as totalPaidToHost from `booking` as b inner join payments as p on b.payment_id = p.id where b.start_date < Now() and b.start_date >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and b.status = 'Approved' and b.type = 0  group by month order by month desc";
            $totalValues = DB::select($monthlyBillQuery);
                    
                   
        }
       // dd($monthlyBillQuery);
        $productsWithTotalSold = collect(array_values($totalValues));
        $currentPage           = LengthAwarePaginator::resolveCurrentPage();
        $perPage               = 50;
        $currentPageResults    = $productsWithTotalSold->slice(($currentPage - 1) * $perPage, $perPage)->toArray();
        $totalValuesPagination = new LengthAwarePaginator($currentPageResults, count($productsWithTotalSold), $perPage);
        $countRow = count($productsWithTotalSold);

        $montharr = array_reverse($montharr, true);


       
        $monthlyReportData = [];
        $graphmonthaxis = [];
        $graphbookingaxis = [];
        $i = 0;

        $ttlview = 0;
        $yearval = $xaxisYear = '';
        foreach($montharr as $k => $v){
           
          //  echo $k.','.$v; 
            // exit;
           // hereall monthly report data come
           $monthlyReportData[$v.$k] = '';
            foreach($currentPageResults as $cpr){
                if($cpr->month == $k  && $cpr->year == $v){
                    $monthlyReportData[$cpr->year.$cpr->month] = ($cpr);
                }
                else{
                  //  $monthlyReportData[$cpr->year.$cpr->month] =  $cpr;
                }
            }
            
            if($monthlyReportData[$v.$k] == ''){
                $a = [
                    'totalSalesPrice' => 0,
                    'totalPaidToHost' => 0,
                    'totalBooking'=> 0,
                    'month'=> $k,
                    'year'=> $v,
                    'monthname' => date('F', strtotime("$v"."-".$k."-01")).', '.$v,
                ];

                $monthlyReportData[$v.$k] = (object)$a;

            }



            /// Here all map data comes
            if($yearval == ''){
                $xaxisYear =  $yearval = $v;
            }
            else{
                if($yearval ==  $v){
                    $xaxisYear = '';
                }
                else{
                    $xaxisYear = $yearval = $v;
                }
            }


            if($xaxisYear){
                $xaxisYear = '<br />'. $xaxisYear;
            }


            $month = '';
            $booking = 0;
            foreach($totalValues as $x){
            // $nmonth = date("m,Y", strtotime($x->monthname));
          

           $month_name = date("F", mktime(0, 0, 0, $k, 10));
        
        //    dd($month_name0);
        //     echo $month_name.','.$v."==".$x->monthname."  " ;
          
            if($x->monthname === $month_name.','.$v){
                    $monthxaxis = explode(',', $x->smallMonth);

                    $month = $monthxaxis[0].$xaxisYear;
                    $booking = $x->totalBooking;
               
                //dd($booking);
                }
            }

            if($month == ''){
                $month = date('M', strtotime("$v-$k-01")).$xaxisYear;
            }
    
            $graphmonthaxis[] = [$i, $month];
            $graphbookingaxis[] = [$i, $booking];
            $i++;

            $ttlview  =  $ttlview  + $booking;
        }


       // dd( $ttlview );
        $graphmonthaxis = json_encode($graphmonthaxis);
        $graphbookingaxis = json_encode($graphbookingaxis);
        //$ttlview = 0;
        // dd($graphbookingaxis);
        $monthlyReportData = array_reverse($monthlyReportData, true);
        // print '<pre>';
        // print_r($monthlyReportData);
        // print_r($totalValuesPagination);
        // print '</pre>';
        // exit;

        return view('Reports.index',compact('boardrooms','totalValuesPagination', 'graphmonthaxis','graphbookingaxis', 'ttlview', 'monthlyReportData', 'countRow'));

    
    } 


    public function month(Request $request){


        
        if (!auth()->user())
        {
            
            return \Redirect::route('/');
    
        }

        $user    = auth()->user();
        $userId  = $user->id;
        // $boardroom = isset($_GET['bd_id']) ? $_GET['bd_id'] : '0';
        $month = $request["text"];
        $boardroom = $request["bd_id"]; 
       
     
        $montharr = [];
        for($i = 0; $i < $month; $i++){
            $lastMonth =  Carbon::now()->subMonths($i)->format('n'); 
            $year = Carbon::now()->subMonths($i)->format('Y');
            $montharr[$lastMonth] = $year;
        }
       

     
                    
       
        $boardrooms = Listing::where('user_id','=',$user->id)->Where('status','!=',0)->get();

        //  dd($user->id);
      
        if($boardroom != '0' && $boardroom){
            // dd($boardroom);
            $query = "select CONCAT(month(start_date), '-', YEAR(start_date)) as month,count(*) as totalBooking from `bookings`";
            $query .= " where `listing_id` = ".$boardroom." and `start_date` < Now() and `status` IN ('Approved','succeeded') and `type` = 0 and";
            if($month == 6){
                $query .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH)";
            }else{
                $query .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 12 MONTH)";

            }
            $query .= " group by `month` order by month desc";
            //$query = "select CONCAT(month(start_date), '-', YEAR(start_date)) as month,count(*) as totalBooking from `booking` where `listing_id` = ".$boardroom." and `start_date` < Now() and `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and `status` = 'Approved' and `type` = 0 group by `month` order by month desc";
            $totBooking = DB::select($query);
            foreach($totBooking as $book){
                $gra[$book->month] = [];
                $gra[$book->month][$boardroom]  = $book->totalBooking; 
            }  
            $monthlyBillQuery = "select CONCAT(MONTHNAME(b.start_date), ',', YEAR(b.start_date)) as monthname,month(b.start_date) as month,year(b.start_date) as year,CONCAT(DATE_FORMAT(b.start_date,'%b'), ',', YEAR(b.start_date)) as smallMonth,count(*) as totalBooking,sum(p.payment_amount) as totalSalesPrice,Sum(p.payment_total) as totalPaidToHost from `bookings` as b inner join payments as p on b.payment_id = p.id";
            $monthlyBillQuery .= " where b.start_date < Now() and b.status IN ('Approved','succeeded') and b.type = 0 and `listing_id` = ".$boardroom." and";
            if($month == 6){
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH)";
            }else{
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 12 MONTH)";

            }

            $monthlyBillQuery .= " group by month,year,monthname,smallMonth order by year,month desc";
            $totalValues = DB::select($monthlyBillQuery);

        }else{

            $query = "select CONCAT(month(start_date), '- ', YEAR(start_date)) as month,count(*) as totalBooking,listing_id from `bookings` where  `start_date` < Now() and `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and `status` IN ('Approved','succeeded') and `type` = 0 group by `month`,listing_id";
            $totBooking = DB::select($query);

            $monthlyBillQuery = "select CONCAT(MONTHNAME(b.start_date), ',', YEAR(b.start_date)) as monthname,month(b.start_date) as month,year(b.start_date) as year,CONCAT(DATE_FORMAT(b.start_date,'%b'), ',', YEAR(b.start_date)) as smallMonth,count(*) as totalBooking,sum(p.payment_amount) as totalSalesPrice,Sum(p.payment_total) as totalPaidToHost from `bookings` as b inner join payments as p on b.payment_id = p.id inner join listings as l on b.listing_id = l.id";
            $monthlyBillQuery .= " where b.start_date < Now() and b.status IN ('Approved','succeeded') and b.type = 0 and";
            if($month == 6){
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 6 MONTH)";
            }else{
                $monthlyBillQuery .= " `start_date` >= DATE_ADD(Now(), INTERVAL- 12 MONTH)";

            }


            $monthlyBillQuery .= " and l.user_id = ".$userId." and l.status != 0";

            $monthlyBillQuery .= " group by month,year,monthname,smallMonth order by year,month desc";

            
            //$monthlyBillQuery = "select CONCAT(MONTH(b.start_date), ',', YEAR(b.start_date)) as month,count(*) as totalBooking,sum(p.payment_amount) as totalSalesPrice,Sum(p.payment_total) as totalPaidToHost from `booking` as b inner join payments as p on b.payment_id = p.id where b.start_date < Now() and b.start_date >= DATE_ADD(Now(), INTERVAL- 6 MONTH) and b.status = 'Approved' and b.type = 0  group by month order by month desc";
            $totalValues = DB::select($monthlyBillQuery);
                    
                  
        }



        $productsWithTotalSold = collect(array_values($totalValues));
        $currentPage           = LengthAwarePaginator::resolveCurrentPage();
        $perPage               = 50;
        $currentPageResults    = $productsWithTotalSold->slice(($currentPage - 1) * $perPage, $perPage)->toArray();
        $totalValuesPagination = new LengthAwarePaginator($currentPageResults, count($productsWithTotalSold), $perPage);
        $countRow = count($productsWithTotalSold);

        $montharr = array_reverse($montharr, true);


        $monthlyReportData = [];
        $graphmonthaxis = [];
        $graphbookingaxis = [];
        $i = 0;

        $ttlview = 0;
        $yearval = $xaxisYear = '';
        foreach($montharr as $k => $v){
            // echo $k; exit;
           // hereall monthly report data come
           $monthlyReportData[$v.$k] = '';
            foreach($currentPageResults as $cpr){
                if($cpr->month == $k  && $cpr->year == $v){
                    $monthlyReportData[$cpr->year.$cpr->month] = ($cpr);
                }
                else{
                  //  $monthlyReportData[$cpr->year.$cpr->month] =  $cpr;
                }
            }
            
            if($monthlyReportData[$v.$k] == ''){
                $a = [
                    'totalSalesPrice' => 0,
                    'totalPaidToHost' => 0,
                    'totalBooking'=> 0,
                    'month'=> $k,
                    'year'=> $v,
                    'monthname' => date('F', strtotime("$v"."-".$k."-01")).', '.$v,
                ];

                $monthlyReportData[$v.$k] = (object)$a;

            }



            /// Here all map data comes
            if($yearval == ''){
                $xaxisYear =  $yearval = $v;
            }
            else{
                if($yearval ==  $v){
                    $xaxisYear = '';
                }
                else{
                    $xaxisYear = $yearval = $v;
                }
            }


            if($xaxisYear){
                $xaxisYear = '<br />'. $xaxisYear;
            }


            $month = '';
            $booking = 0;
            $month_name = date("F", mktime(0, 0, 0, $k, 10));

            foreach($totalValues as $x){

                
                if($x->monthname == $month_name.','.$v){
                  
                    $monthxaxis = explode(',', $x->smallMonth);

                    $month = $monthxaxis[0].$xaxisYear;
                    $booking = $x->totalBooking;
                }
            }

            if($month == ''){
                $month = date('M', strtotime("$v-$k-01")).$xaxisYear;
            }
    
            $graphmonthaxis[] = [$i, $month];
            $graphbookingaxis[] = [$i, $booking];
            $i++;

            $ttlview  =  $ttlview  + $booking;
        }


    //    dd( $ttlview );
        $graphmonthaxis = json_encode($graphmonthaxis);
        $graphbookingaxis = json_encode($graphbookingaxis);
        //$ttlview = 0;

        $monthlyReportData = array_reverse($monthlyReportData, true);
        // print '<pre>';
        // // print_r($monthlyReportData);
        // // print_r($totalValuesPagination);
        // // print '</pre>';
        // exit;
        $mailData = [
            'title' => 'Mail from codingspoint.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('snehal.webroottech@gmail.com')->send(new NotifyMail($mailData));
 
      
        // if (!$boardroom) { 
        return response()->json([
        'data' => $monthlyReportData,
        'boardrooms' => $boardrooms,
        'totalValuesPagination' => $totalValuesPagination,
        'graphmonthaxis' => $graphmonthaxis,
        'graphbookingaxis' => $graphbookingaxis,
        'ttlview' => $ttlview,
        'monthlyReportData' => $monthlyReportData,
        'countRow' => $countRow,

        ], 200);
       
//         }else{
//             $abc = "TESTTTT";
//     // return view('Reports.index',compact('boardrooms','totalValuesPagination', 'graphmonthaxis','graphbookingaxis', 'ttlview', 'monthlyReportData', 'countRow' , 'abc'));
       
//     return response()->json([
//         'boardrooms' => $boardrooms,
//         'totalValuesPagination' => $totalValuesPagination,
//         'graphmonthaxis' => $graphmonthaxis,
//         'graphbookingaxis' => $graphbookingaxis,
//         'ttlview' => $ttlview,
//         'monthlyReportData' => $monthlyReportData,
//         'countRow' => $countRow,
       
//     ], 200);

// }

    }
}





