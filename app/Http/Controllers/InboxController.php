<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListingConversation;
use App\Models\Listing;
use App\Models\User;
use App\Models\Message;
use Auth;
use App\Services\UserInformation;
use Carbon\Carbon;
use Validator;
class InboxController extends Controller
{

    public function index(){

        if (!Auth::check())
        {
            return \Redirect::route('/');
        }

        $user    = Auth::user();
        //dd($user);
        $userId  = $user->id;
        $all_conversation = [];
        $all_chat = [];
        $listId = isset($_GET['listId'])?$_GET['listId']:null;
        $receiverId = isset($_GET['receiverId'])?$_GET['receiverId']:0;

        $boardRooms = [];
        if($user->user_type != '3') {
            $listing = Listing::where('user_id','=',$user->id)->get();

            //dd($listing);

            foreach($listing as $list){

                $boardRooms[$list->id] = ucwords($list->name);
                //var_dump(json_encode($list->id) );
                // if($receiverId != null && $list->id == $listId && $listId != null){
                //     $listing_conversation = ListingConversation::where('listing_id','=',$list->id)->where('created_by','=',$receiverId)->orderBy('timestamp','desc')->get();
                //     //dd($listing_conversation);
                //     if(count($listing_conversation)>0){

                //     }else{
                //     //  $conversation = ListingConversation::where('listing_id','=',$list->id)->where('created_by','=',$userId)->orderBy('created_at','desc')->get();
                //         $masterConversation = new ListingConversation();
                //         $masterConversation->created_by = $receiverId;
                //         $masterConversation->receiver   = $userId;
                //         $masterConversation->listing_id = $listId;
                //         $masterConversation->read_check = 0;
                //         $masterConversation->save();
                //     }
                // }

                $conversation = ListingConversation::where('listing_id','=',$list->id)
                                    ->where(function($query) use ($list) {
                                        $query->where('created_by', $list->user_id)
                                              ->orWhere('receiver', $list->user_id);
                                    })
                                    ->orderBy('timestamp','desc')
                                    ->get();
                // dd($conversation);
                    /* echo "<pre>asdas";
                    print_r($conversation);
                    echo "</pre>"; */
              // var_dump(json_encode($conversation) );
                if($conversation->count() > 0){
                    //dd($conversation->count());
                    foreach($conversation as $chat){
                        //dd($chat);
                        $all_conversation['boardroomName'] = ucwords($list->name);
                        $all_conversation['boardroomId'] = $list->id;
                        $creator = User::find($chat->created_by);
                        
                        if($chat->receiver == auth()->user()->id){
                            $chat_user = User::find($chat->created_by);
                            $chat_id = $chat->created_by;
                        }else{
                            $chat_user = User::find($chat->receiver);
                            $chat_id = $chat->receiver;
                        }
                        $user_type = $creator->user_type??0;
                        $all_conversation['creatorId']      = $chat_id;
                        $all_conversation['creatorPic']     = "";
                        // (new UserInformation())->userProfilePic($chat->created_by);
                        // $receiver_usertype = User::find($chat->receiver);
                        if($user_type == 3 || $chat->receiver == 0){
                            $all_conversation['user_type']      = 3;
                        }
                        else{
                            $all_conversation['user_type']      = 0;
                        }
                        $creatorName  = $creator->first_name." ".$creator->last_name;
                        $chat_name  = $chat_user->first_name." ".$chat_user->last_name;
                        $all_conversation['creatorName']    = isset($creatorName)?ucwords($creatorName):null;
                        $all_conversation['creatorInitial'] = "";
                        // (new UserInformation())->userInitialCms($chat_id);
                        $all_conversation['date']           = Carbon::parse($chat->timestamp)->format('Y/m/d');
                        $all_conversation['chat_id']        = $chat->id;
                        $all_conversation['myId']           = $chat->receiver;
                        $all_conversation['archived']       = $chat->archived;
                        $all_conversation['chat_name']       =  isset($chat_name)?ucwords($chat_name):null;

                        $msg = Message::where('listing_conversation_id','=',$chat->id)
                                ->where('receiver','=',$chat->receiver)
                                ->where('unread','=',0)->count();
                        $lastmsg = Message::where('listing_conversation_id','=',$chat->id)->orderBy('id','desc')->first();
                        //dd($msg);
                        if($msg > 0){
                            $all_conversation['readCheck'] = 0;
                        }
                        else{
                            $all_conversation['readCheck'] = 1;
                        }
                        if($lastmsg){
                            $all_conversation['lastMsgId'] = $lastmsg->id;
                            $all_conversation['date']      = Carbon::parse($lastmsg->timestamp)->format('Y/m/d');
                        }
                        else{
                            $all_conversation['lastMsgId'] = 0;
                        }
                        array_push($all_chat,$all_conversation);

                    }
                    // dd($all_chat);
                }else{
                    $conversation = ListingConversation::where('listing_id',$list->id)->where('created_by',$list->user_id)->orderBy('timestamp','desc')->get();
                    //dd($conversation);
                    if($conversation->count() > 0){
                        foreach($conversation as $chat){

                            $all_conversation['boardroomName'] = ucwords($list->name);
                            $all_conversation['boardroomId'] = $list->id;
                            $creator = User::find($chat->created_by);
                            $user_type = $creator->user_type??0;
                            if($chat->receiver == auth()->user()->id){
                                $chat_user = User::find($chat->created_by);
                            }else{
                                $chat_user = User::find($chat->receiver);
                            }
                            //$creator = DB::table('accounts')->where('id','=',$chat->created_by)->first();
                            $all_conversation['creatorId']      = $chat->receiver;
                            $all_conversation['creatorPic']     = "";
                            // (new UserInformation())->userProfilePic($chat->created_by);
                            $all_conversation['creatorName']    = isset($creator->name)?ucwords($creator->name):null;

                            if($user_type == 3 || $chat->receiver == 0){
                                $all_conversation['user_type']      = 3;
                            }
                            else{
                                $all_conversation['user_type']      = 0;
                            }

                            $all_conversation['creatorInitial'] = "";
                            // (new UserInformation())->userInitialCms($chat->created_by);
                            $all_conversation['date']           = Carbon::parse($chat->timestamp)->format('Y/m/d');
                            $all_conversation['chat_id']        = $chat->id;
                            $all_conversation['myId']           = $chat->created_by;
                            $all_conversation['chat_name']       =  isset($chat_user->name)?ucwords($chat_user->name):null;
                            $all_conversation['archived']           = $chat->archived;
                            $msg = Message::where('listing_conversation_id','=',$chat->id)
                                    ->where('receiver','=',$chat->created_by)
                                    ->where('unread','=',0)->count();
                            $lastmsg = Message::where('listing_conversation_id','=',$chat->id)->orderBy('id','desc')->first();

                            if($msg > 0){
                                $all_conversation['readCheck'] = 0;
                            }
                            else{
                                $all_conversation['readCheck'] = 1;
                            }
                            if($lastmsg){
                                $all_conversation['lastMsgId'] = $lastmsg->id;
                                $all_conversation['date']           = Carbon::parse($lastmsg->timestamp)->format('Y/m/d');
                            }
                            else{
                                $all_conversation['lastMsgId'] = 0;
                            }
                            array_push($all_chat,$all_conversation);
                            //dd($all_conversation);

                        }
                      //  dd($all_chat);
                    }
                }

            }
            // die;
        } else
        {
            $conversation = ListingConversation::where('receiver','=',Auth::user()->id)->orWhere('created_by','=',Auth::user()->id)->orWhere('receiver','=','0')->orderBy('timestamp','desc')->get();
            //dd($conversation);
            if($conversation->count() > 0){
                foreach($conversation as $chat){
                    $listing = Listing::where('id','=',$chat->listing_id)->first();
                    $all_conversation['boardroomName'] = $listing->name;//ucwords($list->name);
                    $all_conversation['boardroomId'] = $listing->id;//$list->id;
                    $creator = User::find($chat->created_by);
                    $user_type = $creator->user_type??0;
                    if($chat->receiver == auth()->user()->id){
                        $chat_user = User::find($chat->created_by);
                    }else{
                        $chat_user = User::find($chat->receiver);
                    }
                    if($user_type == 3 || $chat->receiver == 0){
                        $all_conversation['user_type']      = 3;
                    }
                    else{
                        $all_conversation['user_type']      = 0;
                    }
                    //$creator = DB::table('accounts')->where('id','=',$chat->created_by)->first();
                    $all_conversation['creatorId']      = $chat->created_by;
                    $all_conversation['creatorPic']     = "";
                                        // (new UserInformation())->userProfilePic($chat->created_by);
                    $all_conversation['creatorName']    = isset($creator->name)?ucwords($creator->name):null;
                    $all_conversation['creatorInitial'] = "";
                    // (new UserInformation())->userInitialCms($chat->created_by);
                    $all_conversation['date']           = Carbon::parse($chat->timestamp)->format('Y/m/d');
                    $all_conversation['chat_id']        = $chat->id;
                    $all_conversation['myId']           = $chat->receiver;
                    $all_conversation['chat_name']       =  isset($chat_user->name)?ucwords($chat_user->name):null;
                    $all_conversation['archived']       = $chat->archived;
                    $msg = Message::where('listing_conversation_id','=',$chat->id)
                                ->where(function ($query) use ($userId){
                                    $query->where('receiver','=',Auth::user()->id)
                                        ->orWhere('receiver','=','0');
                                })->where('unread','=',0)->count();
                            // ->where('receiver','=',$chat->receiver)

                    $lastmsg = Message::where('listing_conversation_id','=',$chat->id)->orderBy('id','desc')->first();
                    if($msg > 0){
                        $all_conversation['readCheck'] = 0;

                    }
                    else{
                        $all_conversation['readCheck'] = 1;

                    }
                    if($lastmsg){
                    $all_conversation['lastMsgId'] = $lastmsg->id;
                    $all_conversation['date']      = Carbon::parse($lastmsg->timestamp)->format('Y/m/d');
                    }
                    else{
                        $all_conversation['lastMsgId'] = 0;

                    }
                    array_push($all_chat,$all_conversation);
                }
            }
            /* */
        }
        array_multisort( array_column($all_chat, "date"), SORT_DESC, $all_chat );

       //dd($all_chat);
        return view('Inbox.index', compact('all_chat','boardRooms'));

    }
    

    
    public function getAllMessages(Request $request){
        $isFirstConvo = false;
        $conv_id = $request->input('chat_id');
        $message = [];
        $formatted_message = [];
        $msg     = Message::where('listing_conversation_id','=',$conv_id)->orderBy('id','asc')->get();

        if(count($msg) < 2) {
            if ( $msg[0]['unread'] == 0) {
                $isFirstConvo = true;
            }
        }

        $listing = ListingConversation::find($conv_id);
        $boardroom = Listing::find($listing->listing_id);
        foreach($msg as $val){
            $message['boardroomName'] = $boardroom->name;
            $message['boardroomId']   = $boardroom->id;
            $message['sender']        = $val->sender;
            $message['archived']      = $listing->archived;
            $message['senderInitial'] = "";
            // (new UserInformation())->userInitialCms($val->sender);
            $message['senderPic']     = "";
            // (new UserInformation())->userProfilePic($val->sender);
            $message['receiver']      = $val->receiver;
            $message['receiverInitial'] = "";
            // (new UserInformation())->userInitialCms($val->receiver);
            $message['receiverPic']     = "";
            // (new UserInformation())->userProfilePic($val->receiver);
            $message['msg']           = $val->message;
            $message['date']          = Carbon::parse($val->timestamp)->format('F j, Y');
            $datetimearray = explode(" ",  $val->timestamp);
            $time = $datetimearray[1];
            $reformatted_time = date('g:i A',strtotime($time));
            $message['time']  =  $reformatted_time;
            array_push($formatted_message,$message);
        }

        $formatted_message_mda[ucwords($boardroom->name)] = $formatted_message;

        if(!$formatted_message_mda[ucwords($boardroom->name)] == null){
            $output = '<div class="chat-json-wrapper xyz">';
            foreach ($formatted_message_mda as $k=>$chat)
            {
                $output .= '<div class="right-upr">';
                $output .= '<div class="bd-name">'.$k.'</div>';
                $output .= '<div class="bd-site-name">just Boardrooms</div>';
                $output .= ($chat[0]['archived'] == 0) ? '<div class="bd-archive"><input type="button" value="ARCHIVE" class="btnArchive" onClick="archive()"/></div>' : '<div class="bd-archive"><input type="button" value="Un-ARCHIVE" class="btnArchive" onClick="archive()"/></div>';
                $output .= '</div>';
                $output .= '<div class="chat-wrapper">';
               // echo "test";
                foreach ($chat as $k=>$chatmsg){
                    if($chatmsg['msg'] != ' '){
                        /* echo "<pre>";
                        print_r($chatmsg);
                        echo "</pre>"; */
                        $output .= '<div class="chat-unique">';
                        if($chatmsg['sender'] ==  Auth::user()->id && $chatmsg['sender'] != 0){
                            $sender_user= User::where('id','=',$chatmsg['sender'])->first();
                            $output .= '<div class="chat-msg-date-time  chat-left">';
                            $output .= '<div class="chat-msg">'.htmlentities($chatmsg['msg']).' </div>';
                            $output .= '<div class="chat-date-time">'.$chatmsg['date'].'-'.$chatmsg['time'].' by '.$sender_user->name.'</div>';
                            $output .= '</div>';
                            if($chatmsg['senderPic']){
                                $output .='<div class="user-pic img user-pic-right"><img src="/profile/'.$chatmsg['senderPic'].'"></div>';
                            }
                            else{
                                $output .='<div class="user-pic user-pic-right"><div class="initials">'.$chatmsg['senderInitial'].'</div></div>';
                            }

                        }elseif($chatmsg['receiver'] ==  Auth::user()->id && $chatmsg['receiver'] != 0){
                            if($chatmsg['senderPic']){
                                $output .='<div class="user-pic img user-pic-left"><img src="/profile/'.$chatmsg['senderPic'].'"></div>';
                            }
                            else{
                                $output .='<div class="user-pic user-pic-left"><div class="initials">'.$chatmsg['senderInitial'].'</div></div>';
                            }
                            $output .= '<div class="chat-msg-date-time chat-right">';
                            $output .= '<div class="chat-msg">'.htmlentities(nl2br(e($chatmsg['msg']) ) ).'</div>';
                            $output .= '<div class="chat-date-time">'.$chatmsg['date'].'-'.$chatmsg['time'].'</div>';
                            $output .= '</div>';
                        }elseif(Auth::user()->user_type == '3'){
                            if($chatmsg['sender']){
                                $sender_user= User::where('id','=',$chatmsg['sender'])->first();
                                if($sender_user->user_type == 3){
                                    $output .= '<div class="chat-msg-date-time  chat-left">';
                                    $output .= '<div class="chat-msg">'.htmlentities($chatmsg['msg']).'</div>';
                                    $output .= '<div class="chat-date-time">'.$chatmsg['date'].'-'.$chatmsg['time'].' by '.$sender_user->name.'</div>';
                                    $output .= '</div>';
                                    if($chatmsg['senderPic']){
                                        $output .='<div class="user-pic img user-pic-right"><img src="/profile/'.$chatmsg['senderPic'].'"></div>';
                                    }
                                    else{
                                        $output .='<div class="user-pic user-pic-right"><div class="initials">'.$chatmsg['senderInitial'].'</div></div>';
                                    }
                                }
                            }
                            if($chatmsg['receiver'] == 0){
                                if($chatmsg['senderPic']){
                                    $output .='<div class="user-pic img user-pic-left"><img src="/profile/'.$chatmsg['senderPic'].'"></div>';
                                }
                                else{
                                    $output .='<div class="user-pic user-pic-left"><div class="initials">'.$chatmsg['senderInitial'].'</div></div>';
                                }
                                $output .= '<div class="chat-msg-date-time chat-right">';
                                $output .= '<div class="chat-msg">'.htmlentities(nl2br(e($chatmsg['msg']) ) ).'</div>';
                                $output .= '<div class="chat-date-time">'.$chatmsg['date'].'-'.$chatmsg['time'].'</div>';
                                $output .= '</div>';
                            }
                        }
                        $output .= '</div>';

                    }

                    //$output .= '</div>';
                }

                $output .= '</div>';
            }
            $output .= '</div>';
            return response()->json([
                'data' => $output,
                'firstConversation' => $isFirstConvo,
            ], 200);
        }else{
            return response()->json([
                'data' => '',
            ], 200);
        }

    }

    public function readAllMessages(Request $request){
        $conv_id = $request->input('chat_id');
        // $my_id = $request->input('myId');
        $my_id = Auth::user()->id;
        if(Auth::user()->user_type != '3'){
            $messages = Message::where('listing_conversation_id','=',$conv_id)->where('receiver','=',$my_id)->get();
        }
        else{
            $messages = Message::where('listing_conversation_id','=',$conv_id)
            ->where(function ($query) use ($my_id){
                $query->where('receiver','=',$my_id)
                      ->orWhere('receiver','=','0');
            })->get();
        }

        foreach($messages as $msg){
            $msg->unread = 1;
            $msg->save();
        }

        return response()->json([
            'msg' => 'Message read successfully',
        ], 200);


    }
    
    public function getMessagepartial(Request $request){
        $conv_id = $request->input('chatId');
        $lastmsgIdold = $request->input('lastmsgIdold');
      // $lastmsgID = $request->input('lastmsgID');
        $output = $lastmsgId =  '';
        $message = [];
        $formatted_message = [];
        $msg     = Message::where('listing_conversation_id','=',$conv_id)->where('id', '>', $lastmsgIdold)->orderBy('id','asc')->get();
        $listing = ListingConversation::find($conv_id);
        $boardroom = Listing::find($listing->listing_id);
        foreach($msg as $val){
            $message['boardroomName'] = $boardroom->name;
            $message['boardroomId']   = $boardroom->id;
            $message['sender']        = $val->sender;
            $message['senderInitial'] =  "" ;
            // /(new UserInformation())->userInitialCms($val->sender);
            $message['senderPic']     = "";
            //  (new UserInformation())->userProfilePic($val->sender);
            $message['receiver']      = $val->receiver;
            $message['receiverInitial'] = "";
            // (new UserInformation())->userInitialCms($val->receiver);
            $message['receiverPic']     = "";
            // /(new UserInformation())->userProfilePic($val->receiver);
            $message['msg']           = $val->message;
            $message['date']          = Carbon::parse($val->timestamp)->format('F j, Y');
            $datetimearray = explode(" ",  $val->timestamp);
            $time = $datetimearray[1];

            $reformatted_time = date('g:i A',strtotime($time));
            $message['time']  =  $reformatted_time;
            $message['id'] = $val->id;
            array_push($formatted_message,$message);
        }

        $formatted_message_mda[ucwords($boardroom->name)] = $formatted_message;
        if(!$formatted_message_mda[ucwords($boardroom->name)] == null){

            foreach ($formatted_message_mda as $k=>$chat)
            {

                foreach ($chat as $k=>$chatmsg){
                    $lastmsgId = $chatmsg['id'];
                    $output .= '<div class="chat-unique">';

                    if($chatmsg['sender'] ==  Auth::user()->id){
                        $output .= '<div class="chat-msg-date-time  chat-left">';
                        $output .= '<div class="chat-msg">'.htmlentities($chatmsg['msg']).' </div>';
                        $output .= '<div class="chat-date-time">'.$chatmsg['date'].'-'.$chatmsg['time'].'</div>';
                        $output .= '</div>';
                        if($chatmsg['senderPic']){
                            $output .='<div class="user-pic img user-pic-right"><img src="/profile/'.$chatmsg['senderPic'].'"></div>';
                        }
                        else{
                            $output .='<div class="user-pic user-pic-right"><div class="initials">'.$chatmsg['senderInitial'].'</div></div>';
                        }

                    }elseif($chatmsg['receiver'] ==  Auth::user()->id){
                        if($chatmsg['senderPic']){
                            $output .='<div class="user-pic img user-pic-left"><img src="/profile/'.$chatmsg['senderPic'].'"></div>';
                        }
                        else{
                            $output .='<div class="user-pic user-pic-left"><div class="initials">'.$chatmsg['senderInitial'].'</div></div>';
                        }
                        $output .= '<div class="chat-msg-date-time chat-right">';
                        $output .= '<div class="chat-msg">'.htmlentities(nl2br(e($chatmsg['msg']) ) ).'</div>';
                        $output .= '<div class="chat-date-time">'.$chatmsg['date'].'-'.$chatmsg['time'].'</div>';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
            }

            return response()->json([
                'data' => $output,
                'lastmsgId' => $lastmsgId,
            ], 200);
        }else{
            return response()->json([
                'data' => '',
            ], 200);
        }
    }


    public function saveMessage(Request $request){
        $coversation_id = $request->input('coversationId');
        $receiverId     = $request->input('receiverId');
        $listId     = $request->input('listId');

        // if(Auth::user()->user_type != '3')
        // {
        //     $receiverId = 0;
        // }

        $validator = Validator::make($request->all(), [
            'message'      => 'required',
        ],
        [
            'message.required'    => 'Please enter your message',
        ]

        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        if($coversation_id == 0){
            $listing = Listing::find($listId);
            $newConversation = new ListingConversation();
            $newConversation->created_by = Auth::user()->id;
            $newConversation->admin_check = (new UserTypeInformation())->adminCheck($newConversation->created_by);
            $newConversation->receiver   = $receiverId;
            $newConversation->listing_id = $listId;
            $newConversation->read_check = 0;
            if((new UserTypeInformation())->adminCheck($newConversation->created_by) == 3 || (new UserTypeInformation())->adminCheck($newConversation->receiver) || $newConversation->receiver == 0){
                $newConversation->admin_check = 1;
            }
            else{
                $newConversation->admin_check = 0;
            }
            $newConversation->save();
            $coversation_id = $newConversation->id;
        }

        $newMessage = new Message();
        $newMessage->listing_conversation_id = $coversation_id;
        $newMessage->receiver = $receiverId;
        $newMessage->sender	= Auth::user()->id;
        $newMessage->message = $request->input('message');
        $newMessage->timestamp = Carbon::now()->tz('America/Toronto');
        $newMessage->save();

        if(Auth::user()->user_type == '3')
        {
            $message = $request->input('message');
            $userReceiver = User::find($receiverId);
            \Mail::to($userReceiver->email)->send(new NotifyHostMail(Auth::user(), 'Please login to see a new message to your listing', $message));
            $this->sendNotification("New message","You have new message from ".strtoupper(Auth::user()->name), Auth::user()->device_token);
        }

        $lastmsg = Message::where('listing_conversation_id','=',$coversation_id)->orderBy('id','desc')->first();
        return response()->json([
            'lastMsgId' => $lastmsg->id,
        ], 200);
    }
    
    public function archivedMessage(Request $request)
    {
        $coversation_id = $request->input('coversationId');
        $lc = ListingConversation::where('id','=',$coversation_id)->get();
      
        foreach($lc as $msg){
            if($msg->archived == 0 ){
                $msg->archived =  1;
            }else{
               
                $msg->archived =  0;

            }
            $msg->save();
        }

        return response()->json([
            'archived' => $msg->archived,
        ], 200);
    }


    public function initiateMsgToGuest(Request $request){
      
        $guest_id = $request->input('guestId');
        $list_id     = $request->input('listId');
        $message     = $request->input('msg');

        // dd($request);
        $conversation = ListingConversation::where('listing_id','=',$list_id)->where("created_by","=",Auth::user()->id)
                                        ->where("receiver","=",$guest_id)->orderBy('timestamp','desc');
    
  
 


        if($conversation->first()){
            return response()->json([
                'msg' => 'Successfully Redirected to User Conversation.',
                'receiver_id' => $conversation->first()->receiver,
                'listing_id' => $conversation->first()->listing_id,
                
            ], 200);

        } else {

            // Initiate Listing Coversation
            $newConversation = new ListingConversation();
            $newConversation->created_by = Auth::user()->id;
            $newConversation->receiver   = $guest_id;
            $newConversation->listing_id = $list_id;
            // $newConversation->msg = ;
            $newConversation->read_check = 0;
            $newConversation->save();
            $coversation_id = $newConversation->id;

            // Initiate Message
            $newMessage = new Message();
            $newMessage->listing_conversation_id = $coversation_id;
            $newMessage->receiver = $newConversation->receiver;
            $newMessage->sender	= Auth::user()->id;
            $newMessage->message =$message;
            $newMessage->timestamp = Carbon::now()->tz('America/Toronto');
            $newMessage->save();
            //dd($newMessage);
            return response()->json([
                'msg' => 'Successfully Initiated Conversation with the User.',
                'receiver_id' => $newMessage->receiver,
                'listing_id' => $newConversation->listing_id,
                'message' => $conversation->first()->message,
            ], 200);
        }

    }
}
