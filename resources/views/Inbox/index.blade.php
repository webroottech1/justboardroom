
@extends('layouts.master')
@section('content')
{{-- {{dd($all_chat)}} --}}
@php
$listId = isset($_GET['listId']) ? $_GET['listId'] : '';
$receiverId = isset($_GET['receiverId']) ? $_GET['receiverId'] : '';
@endphp


<div class="chat-inbox mt-5">
    <div class="container">
        <div class="inbox-wrapper py-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="inbox-left-wrapper">
                        <div class="left-header">
                            <select class="form-control form-select" id="inbox-filter">
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
                            <div class="msg-contact-unique myID-{{$chat['myId']}} receiverID-{{$chat['creatorId']}} chatId-{{$chat['chat_id']}} chat-br-{{$chat['boardroomId']}} chat-br-{{$bdName}} chatReadStatus-{{$chat['readCheck']}} userType-{{$chat['user_type']}} chatArchived-{{$chat['archived']}}@if ($chat['creatorId'] == $receiverId )active @endif " style="display: block;">
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
                </div>
                <div class="col-md-9">
                    <div class="inbox-right-wrapper">
                        <div class="chat-json-wrapper-top mb-20">
                            <div class="chat-json-wrapper xyz">
                           
                               
                            </div>
                        </div>

                        <div class="inbox-send-chat-wrapper" @if ($receiverId==null) {{'style=display:none'}} @endif>
                            <div class="alert alert-danger" id="index-error-bag" style="display: none;">
                                <ul id="index-msg-errors"></ul>
                            </div>
                            <form id="sendComment" class="mt-20">
                                <textarea id="chat-message" rows="3" name="chat-msg"> </textarea>
                                <button type="submit" class="btn btn-secondary btnSubmit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
    
    
        var url = new URL(window.location.href);
        var lisitingId = url.searchParams.get("listing_id");
        var receiverId = url.searchParams.get("receiver_id");
    
        if(lisitingId != ''){

           
            setTimeout(function(){
                    
             $('body .myID-'+receiverId + '.chat-br-'+lisitingId).click();

                },500)


            console.log('.myID-'+receiverId + '.chat-br-'+lisitingId);
        }
    
       /* $('.chat-msg').each(function(){
    
        alert($(this).text());
            if($(this).text() == ' '){
                $(this).parent().parent().hide();
            }
    
         }); */
    
    });
    
    
    </script>
	
		<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>