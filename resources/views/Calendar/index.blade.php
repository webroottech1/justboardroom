@extends('layouts.master')
@section('content')

<div class="calendar-wrapper mt-110 mh-690">

<div class="pb-3">
  </div>
  <div class="boardroom-cal-tab-wrapper">
      <div class="boardroom-name-tab">
          @php $isViewAllActive = empty(Session::get('listId') ); @endphp
          @php $sessionListId = Session::get('listId'); @endphp
          <input type="hidden" id="sessLI" name="sessLI" value="{{$sessionListId}}">
         <div class="btn-view-all" id="viewAllCalendar">VIEW ALL EVENTS</div>
          @php $i = 0;   @endphp
          @foreach($listing as $list)
            <div class="list-item  list-item-{{$list->id}} calender-listing-{{$list->id}}" id="{{$list->id}}">{{$list->name}}</div>
          @endforeach
      </div>
      <div class="boardroom-calender">
          <div id='calendar'></div>

          <div class="cal-bot-markup">
              <div class="markup-unique markup-available">
                  <div class="markup-color"></div>
                  <div class="markup-text">Available</div>
              </div>

              <div class="markup-unique markup-closed">
                  <div class="markup-color"></div>
                  <div class="markup-text">Closed</div>
              </div>

              <div class="markup-unique markup-external">
                  <div class="markup-color"></div>
                  <div class="markup-text">External</div>
              </div>

              <div class="markup-unique markup-internal">
                  <div class="markup-color"></div>
                  <div class="markup-text">Internal</div>
              </div>

          </div>
      </div>
  </div>
 @if(Auth::user()->user_type!='3')
  <div class="boardroom-cal-detail-wrapper">

    <div class="br-today-data-wrapper mb-20">
        <div class="bd-name"></div>

        @php
        $tz = 'America/Toronto';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
       //echo $dt->format('F j, Y');
        @endphp


        <div class="bd-curr-date">@php echo $dt->format('F j, Y'); ;  @endphp</div>

        <div class="bd-booking-data-wrapper">

        </div>

    </div>


        {{-- // Reserve your boardroom --}}

        @if(empty( Session::get('gcToken') )  && empty( Session::get('msToken') ))
        <div class="reserve-br pt-15">
            <div class="reserve-br-text">Reserve your boardroom</div>
            <div class="alert alert-danger" id="calendar-error-bag">
                <ul id="calendar-errors">
                </ul>
            </div>

            <!-- <div class="start-date-wrapper date-wrapper mt-10">
                <div class=" date-text">
                    AVAILABILITY:
                </div>
                <div class="availability-text date-text">
                    {{ $timeAvailability ?? '' }}
                </div>
            </div> -->
            <div class="start-date-wrapper date-wrapper mt-10">
                <div class="start-date-text  date-text">START DATE</div>
                <div class="start-date-time-wrapper date-time-wrapper">
                    <div class="start-date"><input type="text" id="start_date"></div>
                    <div class="start-time">
                        <select id="start-time">
                            @foreach($clock as $key=>$value)
                            <option  value={{$key}}>{{$value}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

            </div>

            <div class="end-date-wrapper date-wrapper">
                <div class="end-date-text  date-text">END DATE</div>
                <div class="end-date-time-wrapper date-time-wrapper">
                    <div class="end-date"><input type="text" id="end_date"></div>
                    <div class="end-time">
                        <select id="end-time" class="end-time">
                            @foreach($clock as $key=>$value)
                            <option  value={{$key}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="repeat-weekly-wrapper">
                <div class="repeat-weekly custom-control-inline custom-control mt-20">
                    <input type="checkbox" id="repeat_weekly" name="repeat_weekly" value="repeat_weekly" onclick="repeatWeekly()">
                    <label for="repeat_weekly custom-control-label"> Repeat this weekly</label>
                </div>

                <div class="repeat-weekly-week-wrapper">
                    @php
                        $weekarr = [
                            'SUNDAY' => 'S',
                            'MONDAY' => 'M',
                            'TUESDAY' => 'T',
                            'WEDNESDAY' => 'W',
                            'THURSDAY' => 'T',
                            'FRIDAY' => 'F',
                            'SATURDAY' => 'S'
                            ]  ;
                    @endphp


                    @foreach ( $weekarr  as $k => $v)
                        <div class="repeat-weekly-week">
                            <div><input type="checkbox" id="{{$k}}" name="weekly-check" value="{{$k}}"></div>
                            <div><label for="sunday custom-control-label"> {{$v}}</label></div>
                        </div>
                    @endforeach

                </div>


                <div class="repeat-untill">
                    <div class="repeat-untill-text  date-text">REPEAT UNTIL</div>
                   <input type="text" id="repeat_untill_date">
                </div>


            </div>

            <button type="submit" id="btn-reserve-br" class="btn" >RESERVE BOARDROOM</button>

        </div>
        @endif



        <div class="cal-sync-wrapper">
                <div class="cal-sync-wrapper-text">Calendar Syncing</div>
                <div class="cal-sync-wrapper-desc">Would you like to sync your boardroom calendar to automatically import all of your internal bookings?</div>

                <span class="switch-wrapper">
                    <div class="switch switch-yellow">
                        <input type="radio" class="switch-input" name="calsync" value="calsyncyes" id="calsyncyes" @if(!empty( Session::get('gcToken') ) || !empty( Session::get('msToken') )) checked @endif>
                        <label for="calsyncyes" class="switch-label switch-label-off">YES</label>

                        <input type="radio" class="switch-input" name="calsync" value="calsyncno" id="calsyncno" @if(empty (Session::get('gcToken') ) || empty( Session::get('msToken') ) ) checked @endif>
                        <label for="calsyncno" class="switch-label switch-label-on">NO</label>
                        <span class="switch-selection"></span>
                    </div>
                </span>
                <div id="syncOption" class="row col-12">
                    @if(empty( Session::get('gcToken') )  && empty( Session::get('msToken') ))
                     {{-- <a href="{{ URL::route('oauth') }}"  class="btn syncGCalendar mt-2 google-icon col-10" id="connect-gog-button"> Connect your Google</a> 
                     <a href="{{ URL::route('outlook.login') }}"  class="btn syncGCalendar mt-2 outlook-icon col-10"> Connect your Outlook</a>  --}}
                    @else
                        @if(!empty( Session::get('gcToken') ) )
                          <a href="#"  class="btn resync google-icon mt-2 col-6" id="btn-re-sync-google"> Re-sync</a> 
                        @elseif(!empty( Session::get('msToken') ) )
                         <a href="#"  class="btn resync outlook-icon mt-2 col-6" id="btn-re-sync-outlook"> Re-sync</a> 
                        @endif
                    @endif
                </div>
        </div>
  </div>
  @endif

  <div class="modal"  id="cancel-booking-modal">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-11 justify-content-center">
                    <div class="col-12 align-self-center">
                        <h3 class="modal-title">Cancel your booking</h3>
                    </div>
                </div>
                <div class="col-1 justify-content-center">
                    <div class="align-self-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body term-body">
                <div class="card example-1 border-0 scrollbar-ripe-malinka">
                    <div class="card-body p-0">
                        <p>
                        To cancel this booking, please contact Just Boardrooms at support@justboardrooms.com
                        </p>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <div class="term-footer">
                    <button type="submit" class="btn btn-secondary mr-4" id="btn-cancel-got-it">GOT IT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal"  id="resync-modal-inprogress">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-11 justify-content-center">
                    <div class="col-12 align-self-center">
                        <h3 class="modal-title">Syncing your Calendar</h3>
                    </div>
                </div>
                <div class="col-1 justify-content-center">
                    <div class="align-self-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body term-body">
                <div class="card example-1 border-0 scrollbar-ripe-malinka">
                    <div class="card-body p-0">
                        <p>
                         Google Sync in progress
                        </p>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <div class="term-footer">
                    <button type="submit" class="btn btn-secondary mr-4" id="btn-resync-got-it">GOT IT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal"  id="resync-modal-complete">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-11 justify-content-center">
                    <div class="col-12 align-self-center">
                        <h3 class="modal-title">Syncing Completed</h3>
                    </div>
                </div>
                <div class="col-1 justify-content-center">
                    <div class="align-self-center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body term-body">
                <div class="card example-1 border-0 scrollbar-ripe-malinka">
                    <div class="card-body p-0">
                        <p>
                         Google Sync in Completed
                        </p>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <div class="term-footer">
                    <button type="submit" class="btn btn-secondary mr-4" id="btn-resync-complete-got-it">GOT IT</button>
                </div>
            </div>
        </div>
    </div>
</div>



    {{-- <div class="active-boardroom">1</div> --}}



    <div class="modal"  id="reservation-details">
        <div class="modal-dialog  modal-dialog-centered" >
            <div class="modal-content reservation-modal">
                <div class="modal-body term-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="card example-1 border-0 scrollbar-ripe-malinka">
                        <div class="card-body p-0">
                            <h3 class="modal-title reservation-details d-flex justify-content-center mb-4">Reservation Details</h3>
                            <div class="res-detail-msg"></div>
                            <div class="row col-12 rdetails m-0">
                                <div class="col-5 mx-0 px-0 label-container">
                                    <span class="label">Building Name:</span>
                                </div>
                                <div class="col-7 mx-0 px-0">
                                    <span class="details bname">-</span>
                                </div>

                                <div class="col-5 mx-0 px-0 label-container">
                                    <span class="label">Room Name:</span>
                                </div>
                                <div class="col-7 mx-0 px-0">
                                    <span class="details rname">-</span>
                                </div>

                                <div class="col-5 mx-0 px-0 label-container">
                                    <span class="label">Meeting ID:</span>
                                </div>
                                <div class="col-7 mx-0 px-0">
                                    <span class="details meeting-id">The Turn Lab</span>
                                </div>

                                <div class="col-5 mx-0 px-0 label-container">
                                    <span class="label">Start/End Date:</span>
                                </div>
                                <div class="col-7 mx-0 px-0">
                                    <span class="details date">-</span>
                                </div>

                                <div class="col-5 mx-0 px-0 label-container">
                                    <span class="label">Start/End Time:</span>
                                </div>
                                <div class="col-7 mx-0 px-0">
                                    <span class="details time">-</span>
                                </div>

                                <div class="col-5 mx-0 px-0 label-container">
                                    <span class="label">Guest Name:</span>
                                </div>
                                <div class="col-7 mx-0 px-0">
                                    <span class="details gname">-</span>
                                </div>
                                <div class="rtb-button">
                                    <div class="mx-0 px-0 btn-msg-guest msg-size">
                                        <input type="hidden" value="" class="listing-id"/>
                                        <input type="hidden" value="" class="guest-id"/>
                                        {{-- <span class="message-guest">Message Guest</span> --}}
                                        <button type="button" class="message-guest hosting-add-field">Message Guest</button>
                                    </div>
                                    <div class="mx-0 px-0 btn-req-approve">
                                        <input type="hidden" value="" class="payment-id"/>
                                        <input type="hidden" value="" class="booking-id"/>
                                        {{-- <span class="request-approve">Approve</span> --}}
                                        <button type="button" class="request-approve  hosting-add-field">Approve</button>

                                    </div>
                                    <div class="mx-0 px-0 btn-req-decline">
                                        <input type="hidden" value="" class="payment-id"/>
                                        <input type="hidden" value="" class="booking-id"/>
                                        {{-- <span class="request-decline">Decline</span> --}}
                                        <button type="button" class="request-decline  hosting-add-field">Decline</button>
                                    </div>
                                </div>


                                <div id="dialog-remove-request-confirm" title="Decline Booking" style="display:none;">
                                    <p>Decline this booking request?</p>
                               </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

