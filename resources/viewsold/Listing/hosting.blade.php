<div class="card2 ml-2 hosting-arrangements">
    <div class="alert alert-danger" id="hosting-error-bag">
        <ul id="hosting-info-errors">
        </ul>
    </div>
    <div class="row px-3">
        <p class="step-title">HOSTING PREFERENCE</p>
        <p class="ha-txt-sub-header col-12 p-0"></p>
        <div class="form-group mt-1 mb-4 advance-notice-wrapper col-12 p-0">
            <div class="notice-wrapper row col-12">
                <div class="step-sub-text requiredstar">How much advance notice do you require for a guest to book your boardroom?
                </div>

                <div class="hours-select-wrapper">
                    <input class="input-bb-gray" type="number" id="hours-select" name="hours-select" min="1" max="999" maxlength="4" value="{{isset($about->advance_notice)?$about->advance_notice:"1"}}">
                    <div class="hours-select-text" >Hours</div>
                </div>
            </div>
        </div>

        <div class="house-rules-wrapper col-12 p-0">
            <div class="step-sub-text">Are there House Rules for your boardroom?</div>
            <div class="house-rules-sub-txt">(Examples: Return furniture to original location or turn off TV when leaving)
            </div>
            <div class="house-rules-input-wrapper col-12 row">
                <div class="hosting-multi-field-wrapper col-12 p-0">
                    <div class="hosting-multi-fields">
                            @php $max = 500; @endphp

                            @if(isset($hosting_rule) && count($hosting_rule)>0)
                            @foreach($hosting_rule as $rule)
                            <div class="hosting-multi-field row pl-3 col-12">
                            @php

                            $valcount = strlen($rule->hosting_rule);
                            $remCount = $max - $valcount ;
                            @endphp

                            <textarea class="textarea-bb-gray col-11" rows="1" name="rules[]" id="hosting_rules"
                                maxLength={{$max}}>{{$rule->hosting_rule}}</textarea>
                            <svg class="hosting-remove-field bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            <span class="sub-title" id="hosting_rules_len"> {{$valcount}} / {{$max}} CHARACTERS MAX</span>

                            </div>
                            @endforeach
                            @else
                            <div class="hosting-multi-field row pl-3 col-12" style="display:none;">
                            <textarea class="textarea-bb-gray col-11"  rows="1" name="rules[]" id="hosting_rules" maxLength="500"></textarea>
                            <svg class="hosting-remove-field bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            <span class="sub-title" id="hosting_rules_len"> 0 / {{$max}} CHARACTERS MAX</span>

                            </div>
                            @endif

                    </div>
                    <button type="button" class="hosting-add-field">Add</button>
                </div>
            </div>
        </div>
        @php
        if(!$user->isVerified){
            $btnClass = 'hosting-btn-notactive';
            $btndisabled = 'disabled';
        }
        else{
            $btnClass = 'hosting-btn-active';
            $btndisabled = '';
        }
        @endphp

        <div class="house-instruction-wrapper col-12 p-0">
            <div class="step-sub-text requiredstar col-12 p-0">Provide access instructions for your guests when they
                arrive.</div>
            <p class="ha-txt-sub-header col-12 p-0">The following information will be sent to your Guest upon booking.</p>
            <textarea class=" col-12" id="house-instruction-input" rows="4" cols="50" maxlength="500"
                placeholder="Enter instructions">{{isset($about->hosting_instructions)?$about->hosting_instructions:""}}</textarea>
                <span class="sub-title" id="house_instruction_len"> 0 / 500 CHARACTERS MAX</span>
        </div>


        {{-- <div class="listing-instruction" id="listing-cancellation-policy">Listing Cancellation Policy</div> --}}
        <div class="required-text"><span>*</span> Required Field </div>

        {{-- <div class="next-button-hosting text-center mt-3 ml-2"> <span
                class="fa fa-arrow-right hosting-button hosting-save" id="btn-bd-hosting-save">SAVE</span> </div> --}}
        <div class="next-button-hosting text-center mt-3 ml-2">
            <!-- <span
                class="fa fa-arrow-right hosting-button hosting-save-submit" id="btn-bd-hosting-save-submit" onclick="event.preventDefault();submitForReview();" data-toggle="modal">SAVE &
                SUBMIT FOR REVIEW</span> -->
            @if($user->terms)
            <button type="submit" id="btn-bd-hosting-save-submit" class="btn btn-submit-review {{$btnClass}}"
                onclick="event.preventDefault();">SAVE </button>
            @else
            <button type="submit" id="btn-bd-hosting-save-submit" class="btn btn-submit-review {{$btnClass}}"
                onclick="event.preventDefault();" data-toggle="modal">SAVE</button>
            @endif
        </div>
        {{-- @if(!$user->isVerified)
        <div class="alert alert-danger" id="hosting-verification-bag">
            <p>In order to submit your listing for review please Check your mailbox and click on the link to verify your email</p>
        </div>
        @endif --}}
    </div>

</div>
