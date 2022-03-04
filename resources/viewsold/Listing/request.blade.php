<div class="card2 ml-2 requestlisting">
    <div class="alert alert-danger" id="request-error-bag">
        <ul id="request-info-errors">
        </ul>
    </div>
    <div class="approval-setting">
        <div class="step-title">APPROVAL SETTING</div>
        <div class="step-sub-text requiredstar" style="margin-top:25px">Use Request to Book feature for this boardroom listing?</div>

        <div class="chkbox-wrapper">
            <div class="box box-1">
                <div class="bx">

                    <input type="checkbox" id="approval-yes" name="approval-yes" @if ( isset($listing_type) &&
                    $listing_type == 1) checked="checked" @endif>
                    <label for="approval-yes">Yes</label>
                </div>

                <div class="txt">
                    You will get a notification when a Guest has requested to book your boardroom. You must reply within 24 hours to the request. Otherwise the booking request will automatically be cancelled.
                </div>
            </div>
            <div class="box box-2">
                <div class="bx">
                    <input type="checkbox" id="approval-no" name="approval-yes" @if ( isset($listing_type) &&
                     $listing_type == 0) checked="checked" @endif>
                    <label for="approval-no">No</label>
                </div>

                <div class="txt">
                    A Guest does not require your approval to book your boardroom and their transaction will go through automatically. You will get a notification once the booking has been processed.
                </div>
            </div>
        </div>
        <div class="listing-instruction" id="listing-cancellation-policy">Listing Cancellation Policy</div>
        <div class="mb-2 mt-2">
            <p class="mb-0 jb-text-color required-field">*Required Field</p>
        </div>
        <div class="mb-3" style="width: 100%">
            <button type="submit" id="btn-bd-request" class="btn btn-primary" onclick="event.preventDefault();">SAVE & SUBMIT FOR REVIEW</button>
        </div>
    </div>

    @php
    $isTerms = 0;
    if(isset($user->terms) ){
        $isTerms = $user->terms;
    }
    @endphp
    <input type="hidden" id="terms" name="terms" value="{{$isTerms}}">


</div>
