@php
    if(isset($user_payment->profile_mailing_address) && $user_payment->profile_mailing_address == 1) {
        $checked = 1 ;
        $address = isset($user_profile->address)?$user_profile->address:null;
        $city = isset($user_profile->city)?$user_profile->city:null;
        $province = isset($user_profile->province)?$user_profile->province:null;
        $country = isset($user_payment->country)?$user_payment->country:null;
        $postal_code = isset($user_profile->postal_code)?$user_profile->postal_code:null;
    }
    else{
        $checked = 0 ;
        $address = isset($user_payment->address)?$user_payment->address:null;
        $city = isset($user_payment->city)?$user_payment->city:null;
        $province = isset($user_payment->province)?$user_payment->province:null;
        $country = isset($user_payment->country)?$user_payment->country:null;
        $postal_code = isset($user_payment->postal_code)?$user_payment->postal_code:null;
    }
@endphp


<div class="payment-main  mt-25">

    <div class="payee payment-textbox">
        <div class="payee paymentlabel requiredstar">Payee (Person or Business)</div>
        <input type="text" id="payee" class="form-control" placeholder="Payee (Person or Business)" name="payee" value="{{isset($user_payment->payee)?$user_payment->payee:""}}">
    </div>
    <div class="mailing-lbl payment-textbox">Mailing Address</div>

    <div class="address-chk">
        <input type="checkbox" @if($checked) checked="checked" @endif id="profile-adrs" name="profile-adrs">
        <label for="profile-adrs">User Profile Address</label>
    </div>

    <div class="payment-address payment-textbox">
        <div class="payment--address paymentlabel requiredstar">Address</div>
        <input type="text" id="payment_address" class="form-control" placeholder="Address" name="payment_address"  value="{{$address}}">
    </div>
    <div class="payment-city payment-textbox">
        <div class="form-controlpayment-city paymentlabel requiredstar">City</div>
        <input type="text" id="payment_city" class="form-control" placeholder="City" name="payment_city"  value="{{$city}}">
    </div>
    <div class="payment-province profile-textbox">
        <div class="payment-province paymentlabel requiredstar">Province/State</div>
        <input type="hidden" id="payment-selected-province" name="payment-selected-province" value="{{$province}}">
        <input type="hidden" id="payment-selected-country" name="payment-selected-country" value="{{$country}}">
        <select class="form-control profile" id="payment_province" name="payment_province">
        </select>
    </div>
    <div class="payment-postal_code payment-textbox">
        <div class="postal_code paymentlabel requiredstar">Postal Code or Zip Code</div>
        <input type="text" id="payment_postal_code" class="form-control"placeholder="M1M1M1" name="payment_postal_code" value="{{$postal_code}}" >
    </div>
    <div class="payment-country profile-textbox">
        <div class="country paymentlabel requiredstar">Country</div>
        <select class="form-control profile" id="payment_country" name="payment_country">
            <option value="CA" {{ isset($user_profile) ? (strtoupper($user_profile->country) == 'CA' ? 'selected' : '') : ''}}>Canada</option>
            <option value="US" {{ isset($user_profile) ? (strtoupper($user_profile->country) == 'US' ? 'selected' : '') : ''}}>United States</option>
        </select>
    </div>
    {{-- <div class="required-text"><span>*</span> Required Field </div>
    <div class="payment-btn">
        <button  type="submit" class="btn btn-primary"
            id="btn-payment-save">Save</button>
    </div> --}}

</div>
