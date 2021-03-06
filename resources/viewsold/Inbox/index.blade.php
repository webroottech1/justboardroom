@extends('layouts.master')
@section('content')
{{-- {{dd($all_chat)}} --}}
@php
$listId = isset($_GET['listId']) ? $_GET['listId'] : '';
$receiverId = isset($_GET['receiverId']) ? $_GET['receiverId'] : '';
@endphp


<div class="inbox-main mt-110  mh-690" style="display:flow-root">
    <div class="inbox-wrapper">
        <div class="inbox-left-wrapper">
            <div class="left-header">
                <select class="form-control" id="inbox-filter">
                    <option value="all_msg">All message</option>
                    <option value="unread">Unread</option>
                    <option value="archived">Archived</option>
                    <option value="support">Just Boardroom Support</option>
                    @foreach ($boardRooms as $k=>$val)
                    <option value="{{ $k }}" @if ($listId==$k) selected @endif>{{ $val}}</option>
                    @endforeach
                </select>
            </div>
            <div class="left-msg">

                @foreach ($all_chat as $k=>$chat)
                @php
                $bdName = strtolower(str_replace(" ","-",$chat['boardroomName']));
                @endphp
                <div class="msg-contact-unique myID-{{$chat['myId']}} receiverID-{{$chat['creatorId']}} chatId-{{$chat['chat_id']}} chat-br-{{$chat['boardroomId']}} chat-br-{{$bdName}} chatReadStatus-{{$chat['readCheck']}} userType-{{$chat['user_type']}} chatArchived-{{$chat['archived']}}@if ($chat['creatorId'] == $receiverId )active @endif">
                    <div class="chatId chatid" style="display: none;">{{$chat['chat_id']}}</div>
                    <div class="receiverId" style="display: none;">{{$chat['creatorId']}}</div>
                    <div class="lastmsgId" style="display: none;">{{$chat['lastMsgId']}}</div>
                    @if($chat['creatorPic'])
                    <div class="user-pic img"><img src="/profile/{{$chat['creatorPic']}}"></div>
                    @else
                    <div class="user-pic">
                        <div class="initials">{{$chat['creatorInitial']}}</div>
                    </div>
                    @endif
                    <div class="contact-data">
                        <div class="contact-upr">{{$chat['chat_name']}}</div>
                        <div class="contact-btm">
                            <div class="boardroom-name" data-toggle="tooltip" data-placement="top"
                                title="{{$chat['boardroomName']}}">{{$chat['boardroomName']}}</div>
                            <div class="boardroom-date">{{$chat['date']}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="inbox-right-wrapper">
            <div class="chat-json-wrapper-top mb-20">
                <div class="bd-site-name-dummy">Just Boardrooms</div>
                <div class="empty-chatbox">
                    @if(count($all_chat)==0)
                    <span>No Messages</span>
                    @endif
                </div>
            </div>

            <div class="inbox-send-chat-wrapper" @if ($receiverId==null) {{'style=display:none'}} @endif>
                <div class="alert alert-danger" id="index-error-bag">
                    <ul id="index-msg-errors">
                    </ul>
                </div>
                <form id="sendComment" class="mt-20">
                    <textarea id="chat-message" rows="3" name="chat-msg">



                    </textarea>
                    <input type="submit" value="SEND" class="btnSubmit" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal"  id="note-payment">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Notice</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>By clicking OK, you agree not to share your personal information in this messaging service, including passwords, credit card details, etc.</p>

            </div>
            <div class="modal-footer term-footer">
                <button type="submit" class="btn btn-primary btn-decline" id="btn-note-payment" data-dismiss="modal" >Got it</button>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){


    var url = new URL(window.location.href);
    var lisitingId = url.searchParams.get("listing_id");
    var receiverId = url.searchParams.get("receiver_id");

    if(lisitingId != ''){
        $('.myID-'+receiverId + '.chat-br-'+lisitingId).click();
    }

   /* $('.chat-msg').each(function(){

	alert($(this).text());
    	if($(this).text() == ' '){
    		$(this).parent().parent().hide();
    	}

     }); */

});


</script>


@endsection

