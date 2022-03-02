 {{-- <div class="comment-box">
                    <div class="list-title">
                        <h5 class="card-title">Remarks:</h5>
                    </div>
                    <div class="remarks-container">
                        @php $conversation_id = 0; $receiver_id = 0; $rangeStart = 0; $rangeEnd = 0; @endphp
                        @if(count($list->conversations) > 0)

                            @foreach($list->conversations as $conversation)
                                @php $conversation_id = $conversation->id; @endphp
                                @if($conversation->created_by == $list->user_id || $conversation->admin_check == 1)
                                    @php
                                        $conversation_id = $conversation->id;
                                        if ($conversation->messages->count() > 5)
                                        {
                                        $rangeStart = $conversation->messages->count() - 5;
                                        $rangeEnd = $conversation->messages->count() - 1;
                                        } else {
                                        $rangeEnd = $conversation->messages->count() + 1;
                                        }
                                    @endphp
                    
                                        <!-- Limit to last 5 results only -->
                                        @foreach(collect($conversation->messages)->slice($rangeStart, $rangeEnd) as $msg)
                                            @if ($msg->sender == $list->user_id)
                                                <div class="user-comment">Hosts: {{ $msg->message }}</div>
                    
                                            @elseif ($conversation->admin_check == 1)
                                                <div class="admin-comment">Admin: {{ $msg->message }}</div>
                    
                                            @endif
                                        @endforeach
                                @endif
                            @endforeach

                            @if ($user->user_type == '3')
                                @php $receiver_id = $list->user_id; @endphp
                            @endif
                        @else
                            @if($user->user_type == '3')
                                @php $receiver_id = $list->user_id; @endphp
                            @endif
                        @endif

                        <div>
                            <form id="formRemark">
                                <input class="your-comment" type="text" placeholder="How can I help you?">
                                <input id="sendRemark-{{$conversation_id}}-{{$receiver_id}}" class="btnPost" type="button" value="Post" conversation-id={{$conversation_id}} receiver-id={{$receiver_id}} list-id={{$list->id}}>
                            </form>
                        </div>
                    </div>
                </div> 

            </div>
            
            <br>
            @endforeach
            
            @else
            <div>

                
                @if($status== 'all')
                @php $status = 'Listing';  @endphp

                @elseif($status == 0)
                @php $status = 'Incomplete Boardrooms'; @endphp

                @elseif($status == 1)
                @php $status = 'Pending Boardrooms'; @endphp

                @elseif($status==2)
                @php $status = 'Active Boardrooms';@endphp

                @elseif($status==3)
                @php $status = 'De-activated Boardrooms';@endphp

                @elseif($status==4)
                @php $status = 'removed listings';@endphp
                @endif

                <p>You have no @php echo $status; @endphp </p>
                <div class="create-listing"><a href="{{ URL('/api/listing/address')}}">Create your listing</a></div>
            </div>
            @endif--}}