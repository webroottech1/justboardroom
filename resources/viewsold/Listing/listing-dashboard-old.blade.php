@extends('layouts.master')
@section('content')

<!-- sales_tax -->
<div class="main dashboard-main mt-110 mh-690">
    <div class="dashboard-wrapper">
        <div class="dashboard-profile">
            <div class="dashboard-profile-listing-info">
                @if(isset($user_profile->profile_pic))
                <div class="profile-pic">
                    <div class="profile-username"><img src="/profile/{{$user_profile->profile_pic}}" class="" /></div>
                </div>
                @else
                <div class="profile-pic">
                    <div class="profile-username">{{$initial}}</div>
                </div>
                @endif
                <div class="profile-name"> <strong>Welcome {{$user->name}}</strong></div>
                @if($user->user_type!='3')
                <div class="profile-progressbar">
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{$progress_sum}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress_sum}}%">
                        </div>
                    </div>

                </div>
                <div class="profile-accountpercent">Your account is {{$progress_sum}}% done </div>

                <div class="profile-conditions-wrapper">
                    <div class="profile-conditions profile-conditions-term">
                        <div class="profile-conditions-text profile-conditions-term-text">
                            <a id="btn-aggree-to-terms" href="#" data-toggle="modal">Terms & Condition</a>
                        </div>
                        <div class="profile-conditions-img profile-conditions-term-img {{($user->terms ? 'jb-color' : '')}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        </div>
                    </div>

                    <div class="profile-conditions profile-conditions-complete">
                        <div class="profile-conditions-text profile-conditions-complete-text"><a href="{{ URL('api/listing/'.$userId.'/userProfile#profile' )}}">Complete Profile </a>
                        </div>
                        <?php
                        $jbColor = '';
                        if ($user_profile) {
                            $jbColor = ($user_profile->postal_code) ? 'jb-color' : '';
                        }
                        ?>
                        <div class="profile-conditions-img profile-conditions-complete-img {{$jbColor}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        </div>
                    </div>

                    <div class="profile-conditions profile-conditions-payment">
                        <div class="profile-conditions-text profile-conditions-payment-text"><a href="{{ URL('api/listing/'.$userId.'/userProfile#paymentmethod' )}}">Set up payment
                                method to receive funds </a></div>
                        <div class="profile-conditions-img profile-conditions-payment-img {{(isset($user_payment) ? 'jb-color' : '')}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="profile-update-link"> <a href="{{ URL('api/listing/'.$userId.'/userProfile#profile' )}}">» UPDATE YOUR Account</a> </div>

                @if($user->user_type!='3')
                <div class="dashboard-profile-listing-list-boardroom mb-3">
                    <a href="{{ URL('/api/listing/address')}}">LIST BOARDROOM</a>
                </div>
                @endif
                @endif
            </div>

            <!-- Modal for Agree Terms -->
            <div class="modal hosting-submit" id="agree-to-terms-modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-11 justify-content-center">
                                <div class="col-12 align-self-center">
                                    <h3 class="modal-title" style="text-align-last: center;">Almost done</h3>
                                </div>
                            </div>
                            <div class="col-1 justify-content-center">
                                <div class="align-self-center">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body term-body p-2">
                            <div class="card example-1 border-0 scrollbar-ripe-malinka">
                                <div class="card-body p-0">
                                    <!-- <h4 id="section1"><strong>Hosting submit</strong></h4> -->
                                    <iframe src="" allowfullscreen="" frameborder="0" style="width:100%;border:none;height: 483px;">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="term-footer">
                                <button type="submit" class="btn btn-secondary mr-4" id="btn-accept-terms-dashboard">AGREE</button>
                                @if(!$user->terms)
                                <button type="submit" class="btn btn-secondary btn-decline" id="btn-decline-hosting-submit">DECLINE</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="dashboard-profile-listing-inbox">
                <div class="listing-inbox-img"><img src="/Images/Exclamation Icon.png"></div>
                <div class="listing-inbox-text-wrapper">
                    <div class="listing-inbox-txt-top">You have <strong></strong> new messages</div>
                    <div class="listing-inbox-txt-btm"><a href="/api/inbox">see your inbox</a></div>
                </div>
            </div> -->
            <div class="dashboard-profile-listing-inbox col-12 row  pr-0">
                <div class="listing-inbox-img col-4 p-0"><img src="/Images/Exclamation Icon.png"></div>
                <div class="listing-inbox-text-wrapper col-8 p-0">
                    <div class="listing-inbox-txt-top">You have <strong>{{$new_message}}</strong> new messages</div>
                    <div class="listing-inbox-txt-btm"><a href="/api/inbox">» See your inbox</a></div>
                </div>
            </div>

            @if($user->user_type == 1)
            <div class="dashboard-profile-listing-inbox col-12 row  pr-0">
                <div class="listing-inbox-img col-4 p-0"><img src="/Images/Exclamation Icon.png"></div>
                <div class="listing-inbox-text-wrapper col-8 p-0">
                    <div class="listing-inbox-txt-btm"><a href="/api/show-all-users">» Show All Boardrooms</a></div>
                </div>
            </div>
            @endif
            <div class="dashboard-profile-listing-boardroom-info col-12">
                <div class="act-board board row col-12">
                    <div class="board-num col-5 p-0"><strong>{{isset($active_listing)?$active_listing:0}}</strong></div>
                    <div class="board-txt col-7 p-0">Active Boardroom</div>
                </div>
                <div class="pen-board boar row col-12">
                    <div class="board-num col-5 p-0"><strong>{{isset($pending_listing)?$pending_listing:0}}</strong></div>
                    <div class="board-txt col-7 p-0"><span>Pending Boardroom</span></div>
                </div>
                <div class="deact-board board row col-12">
                    <div class="board-num col-5 p-0"><strong>{{isset($deactivate_listing)?$deactivate_listing:0}}</strong></div>
                    <div class="board-txt col-7 p-0">Deactivated</div>
                </div>

                <div class="new-board board row col-12">
                    <div class="board-num col-5 p-0"><strong>{{isset($new_booking)?$new_booking:0}}</strong></div>
                    <div class="board-txt col-7 p-0">New Booking</div>
                </div>
                <div class="total-board board row col-12">
                    <div class="board-num col-5 p-0"><strong>{{isset($total_bookings)?$total_bookings:0}}</strong></div>
                    <div class="board-txt col-7 p-0"> Total Booking</div>
                </div>
                <div class="view-report">
                    <div class="report-txt"> <a href="{{ URL('/api/reports')}}">View Report</a> </div>
                    <div class="report-img"> <img src="/Images/reporticon.svg"></div>
                </div>

            </div>
        </div>

        <div class="dashboard-listing">

            @if(!$user->isVerified)
            <div class="alert alert-danger" id="dashboard-verification-bag">
                <p>You need to verify your email address!
                    Sign into your email account and click
                    on the verification link we emailed you
                    at
                    <strong>{{$user->email}}</strong>
                </p>
                <p>
                    Click on <a href="{{ URL('/api/resendVerficationEmail')}}">Resend</a> button to send verification email again
                </p>
            </div>
            @endif

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            @php
            $status = isset($_GET['status']) ? $_GET['status'] : 'all';
            @endphp
            <div class="listing-status-heading">See Boardrooms</div>
            <select id="listing-status" style="width:auto;">
                <option {{ (isset( $status)  && ($status ==  'all')) ? "selected=\"selected\"" : "" }} value="all">All</option>
                <option {{  (isset( $status)  && ($status ==  '0'))  ? "selected=\"selected\"" : "" }}value="0">Incomplete</option>
                <option {{  (isset( $status)  && ($status ==  '1'))  ? "selected=\"selected\"" : "" }} value="1">Pending</option>
                <option {{  (isset( $status)  && ($status ==  '2'))  ? "selected=\"selected\"" : "" }}value="2">Active</option>
                <option {{  (isset( $status)  && ($status ==  '3'))  ? "selected=\"selected\"" : "" }}value="3">De-activated</option>
                @if($user->user_type == '3')
                <option {{  (isset( $status)  && ($status ==  '4'))  ? "selected=\"selected\"" : "" }}value="4">Removed</option>
                @endif
            </select>


            @if($list_count > 0)
            @foreach($listing as $list)
            <div class="card">
                @if($list->status == 0)
                @php $status = 'incomplete'@endphp

                @elseif($list->status == 1)
                @php $status = 'pending'@endphp

                @elseif($list->status==2)
                @php $status = 'active'@endphp

                @elseif($list->status==3)
                @php $status = 'De-activated'@endphp

                @elseif($list->status==4)
                @php $status = 'Removed'@endphp

                @endif

                <div class="card-header">
                    <div class="card-header-text  card-header-{{$status}}">{{$status}}</div>

                    <div class="card-status-wrapper">
                        <button type="submit" class="btn dropdown-toggle" data-toggle="dropdown">
                            <img class="doticon" src="/Images/3doticon.png">
                        </button>
                        <div class="dropdown-menu">
                            @if($list->status == 3)

                            <div class="db-activate"><a href="{{ URL('/api/activate/listing/'.$list->id)}}">Activate</a></div>
                            @else
                            <div class="db-deactivate"><a href="{{ URL('/api/deactivate/listing/'.$list->id)}}">De-Activate</a></div>

                            @if($list->status != 4)
                            <div class="db-remove" id="{{$list->id}}">Remove</div>
                            @endif
                            @endif
                            <div class="db-duplicate"><a href="{{ URL('/api/listing/duplicate/'.$list->id)}}">Duplicate</a></div>
                            {{-- {{ URL('/api/remove/listing/'.$list->id)}} --}}
                        </div>
                        <div id="dialog-remove-confirm" title="Remove Listing?" style="display:none;">
                            <p>Are you sure to remove this listing ?</p>
                        </div>
                    </div>


                </div>



                <div class="card-body">

                    <div class="list-img">
                        @if(isset($list->pictures) && count($list->pictures) > 0 )
                        @foreach($list->pictures as $picture)
                        @if($picture->preview_image == 1)
                        <div>
                            <img src="/Images/{{$picture->picture_path.'/'.$picture->picture}}" alt="" height="150" width="150">
                        </div>
                        @endif
                        @endforeach
                        @else
                        <div>
                            <img src="/Images/placeholder.png" alt="" height="150" width="150">
                        </div>
                        @endif
                    </div>
                    <div class="list-dtl">
                        <div class="list-title">
                            <h5 class="card-title">{{$list->name}}</h5>
                        </div>
                        <div class="list-adr">
                            @if($list->address())
                            @if(count($list->address) > 0 )
                            {{ $list->address[0]->formatted_address }}
                            @endif
                            @else
                            <p>No Address</p>
                            @endif
                        </div>
                        <div class="list-capacity">
                            @if($list->capacity)
                            <p>{{$list->capacity->display}} People</p>
                            @else
                            <p>No capacity Defined </p>
                            @endif
                        </div>
                        @if($user->user_type == '3')
                        <div class="list-capacity">
                            <p>Host Name:
                                @if($list->user)
                                {{$list->user->name}}
                                @else
                                Unable to find host
                                @endif
                            </p>
                            <p>Host Email:
                                @if($list->user)
                                {{$list->user->email}}
                                @else
                                Unable to find host
                                @endif
                            </p>
                        </div>
                        @endif
                        @php
                        $perHour = (empty($list->per_hour_rate) ? 0 : $list->per_hour_rate) ;
                        $perHalfDay = (empty($list->per_day_rate) ? 0 : ($list->per_day_rate / 2)) ;
                        $perDay = (empty($list->per_day_rate) ? 0 : $list->per_day_rate) ;
                        $halfDiscountRate = (empty($list->half_discount_rate) ? 0 : $list->half_discount_rate) ;
                        $fullDiscountRate = (empty($list->full_discount_rate) ? 0 : $list->full_discount_rate) ;
                        $calcDiscountHour = 0;
                        $calcDiscountHour = $perHour * ($halfDiscountRate * 0.01);
                        $calcDiscountDay = 0;
                        $calcDiscountDay = $perDay * ($fullDiscountRate * 0.01);
                        $calcDiscountHalfDay = $perHalfDay * ($halfDiscountRate * 0.01);
                        @endphp

                        <div class="list-hrs">
                            <div class="list-per-hrs">
                                <p>${{$perHour}}/hour</p>
                            </div>

                            @if($list->half_discount_rate > 0)
                            <div class="list-per-hrs">
                                <p>${{round($perHalfDay - $calcDiscountHalfDay)}}/half day</p>
                            </div>
                            @else
                            <div class="list-per-hrs">
                                <p>${{round($perHalfDay)}}/half day</p>
                            </div>
                            @endif

                            @if($list->full_discount_rate > 0)
                            <div class="list-per-day">
                                <p>${{round($perDay - $calcDiscountDay)}}/day</p>
                            </div>
                            @else
                            <div class="list-per-day">
                                <p>${{round($perDay)}}/day</p>
                            </div>
                            @endif
                            @if($list->sales_tax > 0)
                            <div class="list-per-day">
                                <p>{{round($list->sales_tax)}}%</p>
                            </div>
                            @endif

                        </div>

                        <div class="list-icons">
                            @if($list->status == 0)
                            <div class="list-action"><a href="{{ URL('api/edit/listing/'.$list->id )}}">COMPLETE YOUR
                                    LISTING </a></div>
                            @else
                            <span class="calender-icon"><a href="{{ URL('api/listing/Calendar#'.$list->id )}}"><img src="/Images/calender.png"></a></span>
                            @if($list->status != '3')
                            <div class="list-action"><a href="{{ URL('api/edit/listing/'.$list->id )}}">» EDIT LISTING</a>
                            </div>
                            @endif
                            @endif
                            @if((Auth::user()->id==232 || Auth::user()->id == 173 || Auth::user()->id == 377 | Auth::user()->id == 357 | Auth::user()->id == 444 | Auth::user()->id == 3 | Auth::user()->id == 44) && $list->status == 1)
                            <div class="list-review"><a href="{{ URL('api/listing/'.$list->id.'/approve' )}}">Approve Listing</a>
                            </div>
                            @endif

                            @if((Auth::user()->user_type==3))
                            <div class="list-email"><a href="{{ URL('api/listing/'.$list->id.'/email' )}}">Email Host</a>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
                {{dd($user)}}
                <div class="comment-box">
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
            @endif

        </div>
    </div>
</div>

@endsection
