<div class="profile-main mt-25">


    <div class="first_name profile-textbox">
        <div class="first-name profilelabel requiredstar">First Name</div>

        <input type="text" class="form-control"  id="first-name" placeholder="First Name" name="firstname" value="{{isset($user_profile->first_name)? ucfirst($user_profile->first_name) :''}}">
    </div>
    <div class="last_name profile-textbox">

        <div class="last-name profilelabel requiredstar">Last Name</div>
        <input type="text" class="form-control"  id="last-name" placeholder="Last Name" name="lastname" value="{{isset($user_profile->last_name)?ucfirst($user_profile->last_name):''}}">
    </div>
    <div class="company profile-textbox">
        <div class="company profilelabel">Company</div>
        <input type="text" class="form-control"  id="company" placeholder="Company" name="company" value="{{isset($user_profile->company)?$user_profile->company:''}}">
    </div>
    <div class="company profile-textbox">
        <div class="company profilelabel">Tax ID (mandatory if you plan to charge Sales Tax)</div>
        <input type="text" class="form-control"  id="tax_id" placeholder="Tax ID" name="tax_id" value="{{isset($user_profile->tax_id)?$user_profile->tax_id:''}}">
    </div>
    <div class="title profile-textbox">
        <div class="title profilelabel">Title</div>
        <input type="text" class="form-control"  id="title" placeholder="Title" name="title" value="{{isset($user_profile->title)?$user_profile->title:''}}">
    </div>
    <div class="phone profile-textbox">
        <div class="phone profilelabel requiredstar">Phone</div>
        <input type="text" class="form-control"  id="phone" placeholder="Phone E.g. 4161234567" name="phone" value="{{isset($user_profile->phone)?$user_profile->phone:''}}" maxLength=10>
    </div>
    <div class="address profile-textbox">
        <div class="address profilelabel requiredstar">Address</div>
        <input type="text" class="form-control"  id="address" placeholder="Address" name="address" value="{{isset($user_profile->address)?$user_profile->address:''}}">
    </div>
    <div class="city profile-textbox">
        <div class="city profilelabel requiredstar">City</div>
        <input type="text" class="form-control"  id="city" placeholder="City" name="city" value="{{isset($user_profile->city)?$user_profile->city:''}}">
    </div>
    <div class="province profile-textbox">
        <div class="province profilelabel requiredstar">Province/State</div>
        <input type="hidden" id="selected-province" name="selected-province" value="{{(isset($user_profile->province) ? $user_profile->province : '')}}">
        <input type="hidden" id="selected-country" name="selected-country" value="{{(isset($user_profile->country) ? $user_profile->country : '')}}">
        <select class="form-control profile" id="province" name="province">
        </select>
    </div>
    <div class="postal_code profile-textbox">
        <div class="postal_code profilelabel requiredstar">Postal Code or Zip Code</div>
        <input type="text" class="form-control"  id="postal_code" placeholder="M1M1M1" name="postal_code" value="{{isset($user_profile->postal_code)?$user_profile->postal_code:""}}">
    </div>
    <div class="country profile-textbox">
        <div class="country profilelabel requiredstar">Country</div>
        <select class="form-control profile" id="country" name="country">
            
            <option value="CA" {{ isset($user_profile) ? (strtoupper($user_profile->country) == 'CA' ? 'selected' : '') : ''}}>Canada</option>
            <option value="US" {{ isset($user_profile) ? (strtoupper($user_profile->country) == 'US' ? 'selected' : '') : ''}}>United States</option>
        </select>
    </div>
    {{-- <div class="required-text"><span>*</span> Required Field </div>
    <div class="profile-btn">
        <button  type="submit" class="btn btn-primary" id="btn-profile-save">Save</button>
    </div> --}}
</div>
