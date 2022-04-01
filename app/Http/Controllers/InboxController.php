<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function initiateMsgToGuest(Request $request){
       // dd($request);
        $guest_id = $request->input('guestId');
        $list_id     = $request->input('listId');
        $conversation = ListingConversation::where('listing_id','=',$list_id)->where("created_by","=",Auth::user()->id)
                                        ->where("receiver","=",$guest_id)->orderBy('timestamp','desc');
        // var_dump($conversation->first());die;
        //dd($conversation->first());
        if($conversation->first()){
            //dd($conversation->first());
            return response()->json([
                'msg' => 'Successfully Redirected to User Conversation.',
                'receiver_id' => $conversation->first()->receiver,
                'listing_id' => $conversation->first()->listing_id
            ], 200);

        } else {

            // Initiate Listing Coversation
            $newConversation = new ListingConversation();
            $newConversation->created_by = Auth::user()->id;
            $newConversation->receiver   = $guest_id;
            $newConversation->listing_id = $list_id;
            $newConversation->read_check = 0;
            $newConversation->save();
            $coversation_id = $newConversation->id;

            // Initiate Message
            $newMessage = new Message();
            $newMessage->listing_conversation_id = $coversation_id;
            $newMessage->receiver = $newConversation->receiver;
            $newMessage->sender	= Auth::user()->id;
            $newMessage->message = " ";
            $newMessage->timestamp = Carbon::now()->tz('America/Toronto');
            $newMessage->save();
            //dd($newMessage);
            return response()->json([
                'msg' => 'Successfully Initiated Conversation with the User.',
                'receiver_id' => $newMessage->receiver,
                'listing_id' => $newConversation->listing_id,
            ], 200);
        }

    }
}
