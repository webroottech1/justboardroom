<?php
namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\Listing;
use App\Models\Booking;
use App\Models\Address;
use App\Models\ListingGallery;
use App\Models\ListingCapacity;
use App\Models\Amenity;
use App\Models\ListingAmenity;
use App\Models\Addresses;
use App\Models\HostingRule;
use App\Models\ListingCalender;

use function GuzzleHttp\json_encode;

class ListingController extends Controller
{
    public function index()
    {
        
    // $listing = DB::table('listings')->get();
   // $capacity =[]; 
    // /$capacity =  ListingCapacity::all();//query return data    
    $data['data'] = Listing::all();
     

       foreach($data['data'] as $listing){

        $listing['capacity'] = $listing->listing_capacity;
        $listing['address'] = $listing->address;
        $listing['listing_gallery'] = $listing->pictures;
        $listing['listing_amenities'] = $listing->listing_amenities;
        // $listing['hostingRule'] = $listing->rules;
        

        $newArray[] = $listing;

            //   /  dd($newArray);


}

$locations = array();
foreach ($newArray as $key => $value) {

    $obj = new \stdClass ;
    $obj->lat = (float)$value->address->lat;
    $obj->lng = (float)$value->address->lng;
    // dd($obj);
    $locations[] = $obj;
   
}

$listingLocation['location']= $locations ;






       // dd($listing->calender);
        
    //    $data = array_merge($listing,$capacity);

      return response()->json([
        'data' => $newArray,
        'address' => $listingLocation['location'],
        
        
        ], 200);

       
       //return view('homepage',compact('capacity','listing') );  
    }

    public function getlisting(){
        
    // dd($request);
    
        $listing = Listing::where('status',1);
    
       $request = [
        "startDate" => "",
        "endDate" => "",
        "location" => "chandigarh",
        "roomCapacity" => "",
        "price" => "",
        "amenities" => ""
       ];
    
       $request = (object)$request;
     
        // $request->startDate = "2022-03-17";
        // $request->endDate =  "2023-03-17";
        // $request->location = "chandigarh";
        // $request->roomCapacity = "10";
        // $request->price = "100";
        // $request->amenities = "Air Conditioning";

        $startDate = date('Y-m-d',strtotime($request->startDate));
        $endDate = date('Y-m-d',strtotime($request->endDate));
        // dd($startDate);
    
  
        
            
       
        if(isset($request->startDate) && $request->startDate != '' ){
            $listing->whereHas('calender', function (Builder $query) use($startDate){
                    $query->where('startDate', 'like', '%'.$startDate.'%');
                });
        
                // dd($startDate);
        }
      
       

        if(isset($request->endDate) && $request->endDate != '' ){
            $listing->whereHas('calender', function (Builder $query) use($endDate){
                    $query->where('endDate', 'like', '%'.$endDate.'%');
                });
                
        } 
    
        if(isset($request->price) && $request->price != '' ){
            $listing->where('price_per_hour', 'like', '%'.$request->price.'%');
        }
       
        
       
        if(isset($request->roomCapacity) && $request->roomCapacity != '' ){
            $listing->whereHas('listing_capacity', function (Builder $query) use($request){
                    $query->where('description', 'like', '%'.$request->roomCapacity.'%');
                });
        }

     
        if(isset($request->amenities) && $request->amenities != '' ){
                $listing->whereHas('listing_amenities', function (Builder $query) use($request){
                        $query->whereIn('amenity_id', 'like', '%'.$request->amenities.'%');
                    });
        }    
        
        if(isset($request->location) && $request->location != '' ){
            $listing->whereHas('address', function (Builder $query) use($request){
                    $query->where('formatted_address', 'like', '%'.$request->location.'%');
                });
            
            }




        

        $listings = $listing->get();
    
    
        foreach($listings as $listing){

        
          
            $locations = array();
            foreach ($listings as $key => $value) {
            
                $obj = new \stdClass ;
                $obj->lat = (float)$value->address->lat;
                $obj->lng = (float)$value->address->lng;
                // dd($obj);
                $locations[] = $obj;
               
            }
            
          

                $listing_amenities['listing_amenities'] = ListingAmenity::all();

                // dd($listing_amenities['listing_amenities']);
                
                foreach( $listing_amenities['listing_amenities'] as $amenity){
                
                
            //    dd($listing_gallery['listing_gallery']);
                if($listing['id'] == $amenity['listing_id'] ){
                    
                    $listing['listing_amenities'] = $amenity;
                    
                }
            }
               
            $listing_hotingRule['hostingRule'] = HostingRule::all();

                // dd($listing_amenities['listing_amenities']);
                
                foreach( $listing_hotingRule['hostingRule'] as $hostingrule){
                
                
            //    dd($listing_gallery['listing_gallery']);
                if($listing['id'] == $hostingrule['listing_id'] ){
                    
                    $listing['hostingRule'] = $hostingrule;
                    
                }
            }
    

                $listingFilter[] = $listing;
    }

    
    $listing['location']= $locations ;
    
        // dd($listings);
       
     
        return response()->json([
            'listings' => $listingFilter,
           
        
            
            ], 200);
     
        //return view('ajaxlisting' ,compact('listings','locations'))->render();

    }

    public function get_listing_details(Request $request, $id)
    {
            
        $listing = listing::find($id);
       
        $other_boardrooms = listing::where('id','!=',$id)->where('user_id','=',$listing->user_id)->get();

        $listing['capacity'] = $listing->listing_capacity;
        $listing['address'] = $listing->address;
        $listing['listing_gallery'] = $listing->pictures;
        $listing['pictures'] = $listing->pictures;
        $listing['listing_amenities'] = $listing->listing_amenities;
       
        $listing_hotingRule['hostingRule'] = HostingRule::all();

                // dd($listing_amenities['listing_amenities']);
                
                foreach( $listing_hotingRule['hostingRule'] as $hostingrule){
                
                
            //    dd($listing_gallery['listing_gallery']);
                if($listing['id'] == $hostingrule['listing_id'] ){
                    
                    $listing['hostingRule'] = $hostingrule;
                    
                }
            }

           
//             $locations = array();
// foreach ($listing as $key => $value) {
//     dd($value);
//     $obj = new \stdClass ;
//     $obj->lat = (float)$value->address->lat;
//     $obj->lng = (float)$value->address->lng;
//     // dd($obj);
//     $locations[] = $obj;
   
// }




// $data['data'] = listing::find($id);
     

// foreach($data as $listing){

    
//     $other_boardrooms = listing::where('id','!=',$id)->where('user_id','=',$listing->user_id)->get();

//  $listing['capacityNEW'] = $listing->listing_capacity;
//  $listing['address'] = $listing->address;
//  $listing['listing_gallery'] = $listing->pictures;
//  $listing['listing_amenities'] = $listing->listing_amenities;
//  // $listing['hostingRule'] = $listing->rules;
 
 
//  $newArray[] = $listing;

  


// }

// $locations = array();
// foreach ($newArray as $key => $value) {

// $obj = new \stdClass ;
// $obj->lat = (float)$value->address->lat;
// $obj->lng = (float)$value->address->lng;
// // dd($obj);
// $locations[] = $obj;


// }







// $listingLocation['location']= $locations ;



       
       
        return response()->json([
            'listing' => $listing,
            'other_boardrooms' => $other_boardrooms,
            
            
            ], 200);
      
      
        //return view('listing_details' ,compact('listing','other_boardrooms'));  
    }

/*public function wishlist()
{

     $wishlists = Wishlist::where("user_id", "=", $user->id)->get();
     return view('wishlist', compact('wishlists'));
}

public function addToWishlist(Request $request)
    {
      //Validating title and body field
      $this->validate($request, array(
          'user_id'=>'required',
          'listing_id' =>'required',
        ));

      $wishlist = new Wishlist;

      $wishlist->user_id = $request->user_id;
      $wishlist->listing_id = $request->listing_id;


      $wishlist->save();

      return redirect()->back()->with('flash_message',
          'Item, '. $wishlist->listing->title.' Added to your wishlist.');
    }*/
}

