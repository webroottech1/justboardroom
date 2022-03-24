{{-- @extends('layouts.master')
@section('content') --}}
<script type="text/javascript" src="{{ asset('js/hosting.js') }}"></script>
{{-- {{dd($hosting_rule)}} --}}
<div class="card2 ml-2 hosting-arrangements listing-hosting-preference py-5 listingStepp" id="listing-step-5">
    <div class="container">
        <section class="listing-midprt pt-5">
            <div class="row mx-auto">
                <div class="col-md-9">
                    <div class="jbr-tips mb-4">
                        <h4><span class="mr-3 orng-box"><img
                                    src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Just
                            Boardrooms tips!</h4>
                        <p class="sub-title">In this section of your boardroom listing setup, feel free to include
                            any special instructions you want to give
                            to your potential Guests as it pertains to the booking and use of your boardroom. </p>

                        <p class="sub-title">Consider whether you require any specific information from your Guest
                            prior to the meeting, such as the number
                            of people attending it. Do you want to allow your guests to bring any food or drink into
                            your meeting rooms? Or make it clear that
                            they cannot? Are there special instructions on how to enter the building or premises that
                            potential guests need to know? </p>
                        <p class="sub-title">You can add each individual note or preferences one by one by clicking
                            on the ADD button and then
                            entering your comments into the open field.</p>
                        <p></p>
                    </div>
                    <div class="hosting-preference form-grey-box position-relative">
                        <div class="row px-3">
                            <p class="step-title px-0">HOSTING PREFERENCE</p>
                            <p class="ha-txt-sub-header col-12 p-0"></p>
                            <div class="form-group mt-1 mb-4 advance-notice-wrapper col-12 p-0">
                                <div class="notice-wrapper d-flex">
                                    <div class="step-sub-text bold-text requiredstar me-1 ml-0">How much advance notice
                                        do you require for a guest to book your boardroom? </div>
                                    <div class="hours-select-wrapper">
                                        <select id="hours-duration" class="hours-duration select-bb-gray ">

                                            <option value="0">Select</option>
                                            @for ($i = 1; $i <= 23; $i++)
                                                <option {{(isset($listing) && $listing->advance_notice == $i)?'selected':''}} value={{$i}}>{{$i}}</option>
                                            @endfor


                                        </select>
                                        <span>&nbsp;Hour</span>
                                    </div>
                                </div>
                            </div>

                            <div class="house-rules-wrapper col-12 p-0">
                                <div class="step-sub-text">Are there House Rules for your boardroom?</div>
                                <div class="house-rules-sub-txt smallp">(Examples: Return furniture to original location
                                    or turn off TV when leaving)
                                </div>
                                <div class="house-rules-input-wrapper">
                                    <div class="hosting-multi-field-wrapper col-12 p-0">
                                        <div class="hosting-multi-fields">
                                            @if (isset($hosting_rule))
                                                @foreach ($hosting_rule as $hostRules)
                                                    <div class="hosting-multi-field row pl-3 col-12" style="display:block;">
                                                        <textarea class="textarea-b-gray col-11" rows="1" name="rules[]"
                                                            id="hosting_rules" maxlength="500">{{$hostRules->hosting_rule}}</textarea>
                                                        <svg class="hosting-remove-field bi-type-bold"
                                                            xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                            fill="currentColor" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                                                            </path>
                                                        </svg>
                                                        <span class="sub-title smallp" id="hosting_rules_len"> 0 / 500
                                                            CHARACTERS MAX</span>

                                                        </div>
                                                @endforeach
                                            @else
                                            <div class="hosting-multi-field row pl-3 col-12" style="display:none;">
                                                <textarea class="textarea-b-gray col-11" rows="1" name="rules[]"
                                                    id="hosting_rules" maxlength="500"></textarea>
                                                <svg class="hosting-remove-field bi-type-bold"
                                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                    fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                                                    </path>
                                                </svg>
                                                <span class="sub-title smallp" id="hosting_rules_len"> 0 / 500
                                                    CHARACTERS MAX</span>

                                                </div>

                                            @endif

                                        </div>
                                        <button type="button" class="hosting-add-field">Add</button>
                                    </div>
                                </div>
                            </div>

                            <div class="house-instruction-wrapper col-12 p-0 mb-4">
                                <div class="step-sub-text requiredstar col-12 p-0">Provide access instructions for your
                                    guests when they
                                    arrive.</div>
                                <p class="ha-txt-sub-header col-12 p-0 smallp">The following information will be sent to
                                    your Guest upon booking.</p>
                                <textarea class="textarea-b-gray form-control py-2 px-3" id="house-instruction-input"
                                    rows="4" cols="50" maxlength="500" placeholder="Enter Instructions"> {{(isset($listing) ? $listing->hosting_instruction:'')}} </textarea>
                                <span class="sub-title smallp" id="house_instruction_len">0 / 500 CHARACTERS MAX</span>
                            </div>
                            <div class="form-group btn-submit">
                                <button type="submit" onclick="event.preventDefault();submitpost();" class="btn save-btn listaddress-btn-notactive"
                                    id="btn-address">Save</button>
                                <div class="mb-2 mt-2">
                                    <p class="mb-0 jb-text-color required-field">*Required Field</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
