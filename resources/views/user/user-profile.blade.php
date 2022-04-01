@extends('layouts.master')

@section('content')
<div id="user-profile-body" class="user-profile-body-wrapper mt-90  mh-690 bg-content-grey">
    <div class="user-profile-wrapper bg-content-grey pt-4">
            <div class="account-main">
                <div class="account-text-header account-header">Account Information</div>
                <div class="setting-text-header account-header" style="display:none;">Settings</div>
                                    <div class="profile-pic">
                        <div class="profile-username">A</div>
                    </div>
                <div class="up-add-photo mt-20 up-add-update-photo"> Add Photo</div>
                
                <div class="add-photo-link mb-4" style="display: none;">
                    <form id="uploadForm" action="upload.php" method="post">
                        <label>Upload Image File:</label><br>
                        <input type="file" name="image" id="image-selecter" accept="image/*">
                        <input type="submit" value="Submit" class="btnSubmit">
                    </form>
                </div>


                <div class="email-pass-wrapper">

                    <div class="alert alert-danger" id="change-error-bag" style="display: none;">
                        <ul id="change-info-errors">
                        </ul>
                    </div>

                    <div class="alert alert-success" id="change-password-bag" style="display: none;">
                        <ul id="change-password-success">
                        </ul>
                    </div>
                    <div class="email account-textbox mb-3">
                        <div class="email-text">Email</div>

                        <div class="input-changelink-wrapper">
                            <input type="text" id="email" placeholder="Email" name="email" value="anthonys@theturnlab.com">
                            <div class="change-link email-change-link" id="email-change">Change</div>
                        </div>
                    </div>
                    <div class="pwd account-textbox mt-25">
                        <div class="pwd-text">Password</div>

                        <div class="input-changelink-wrapper">
                            <input type="password" id="pwd" name="pwd">
                            <div class="change-link password-change-link" id="pass-change">Change</div>
                        </div>

                    </div>

                    <!-- <div class="edit-settings-link mt-25">EDIT SETTINGS</div> -->
                    <div class="edit-account-info-link mt-25" style="display:none;">EDIT ACCOUNT INFORMATION</div>

                </div>
            </div>
            <div class="profile-payment-settings-main mt-25">
                <div class="profile-payment-tab">
                    <div id="dialog-profile-payment-confirm" title="Leave site?" style="display:none;">
                        <p>Are you sure to move ?</p>
                    </div>

                    <div class="alert alert-danger" id="profile-error-bag" style="display: none;">
                        <ul id="profile-info-errors">
                        </ul>
                    </div>
                    <div class="alert alert-success" id="profile-success-bag" style="display: none;">
                        <ul id="profile-success">
                        </ul>
                    </div>

                    
                    <div class="alert alert-danger" id="payment-error-bag" style="display: none;">
                        <ul id="payment-info-errors">
                        </ul>
                    </div>
                    <div class="alert alert-success" id="payment-success-bag" style="display: none;">
                        <ul id="payment-success">
                        </ul>
                    </div>



                    <div class="tab">
                        <div id="profileClick" class="profile-tab tablinks profile-payment-tablink profile-tab active" onclick="openProfile('profile')">Profile</div>
                        <div id="paymentClick" class="payment-tab tablinks paymentmethod-tab profile-payment-tablink" onclick="openProfile('paymentmethod')">Payment Method</div>
                    </div>

                    <div id="profile" class="tabcontent" style="display: block;">
                            <div class="profile-main mt-25">


    <div class="first_name profile-textbox">
        <div class="first-name profilelabel requiredstar">First Name</div>

        <input type="text" class="form-control firstname" id="first-name" placeholder="First Name" name="firstname" value="{{
        ($users->id == isset($user_detail->user_id)) ?$user_detail->firstname :  $users->first_name 
       }}">
    </div>
    <div class="last_name profile-textbox">

        <div class="last-name profilelabel requiredstar">Last Name</div>
        <input type="text" class="form-control lastname" id="last-name" placeholder="Last Name" name="lastname" value="{{$users->last_name}}">
    </div>
    <div class="company profile-textbox">
        <div class="company profilelabel">Company</div>
        <input type="text" class="form-control companyuser" id="company" placeholder="Company" name="company" value="{{ ($users->id == isset($user_detail->user_id) ) ? $user_detail->company : '' }}">
    </div>
    <div class="company profile-textbox">
        <div class="company profilelabel">Tax ID (mandatory if you plan to charge Sales Tax)</div>
        <input type="text" class="form-control tax_id" id="tax_id" placeholder="Tax ID" name="tax_id" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->tax_id : '' }}">
    </div>
    <div class="title profile-textbox">
        <div class="title profilelabel">Title</div>
        <input type="text" class="form-control titlee" id="title" placeholder="Title" name="title" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->title : '' }}">
    </div>
    <div class="phone profile-textbox">
        <div class="phone profilelabel requiredstar">Phone</div>
        <input type="text" class="form-control phoneuser" id="phoneuser" placeholder="Phone E.g. 4161234567" name="phoneuser" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->phone : '' }}" maxlength="10">
    </div>
    <div class="address profile-textbox">
        <div class="address profilelabel requiredstar">Address</div>
        <input type="text" class="form-control addressuser" id="address" placeholder="Address" name="address" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->address : '' }}">
    </div>
    <div class="city profile-textbox">
        <div class="city profilelabel requiredstar">City</div>
        <input type="text" class="form-control cityuser" id="city" placeholder="City" name="city" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->city : '' }}">
    </div>
    <div class="province profile-textbox">
        <div class="province profilelabel requiredstar">Province/State</div>
        <input type="hidden" id="selected-province" name="selected-province" value="ON">
        <input type="hidden" id="selected-country" name="selected-country" value="CA">
        <input class="form-control provincee"  type="text" id="provincee" name="provincee" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->province : '' }}">
        {{-- <select class="form-control profile" id="province" name="province">
        </select>
    </div> --}}
    <div class="postal_code profile-textbox">
        <div class="postal_code profilelabel requiredstar">Postal Code or Zip Code</div>
        <input type="text" class="form-control postal_codee" id="postal_codee" placeholder="M1M1M1" name="postal_codee" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->postal_code : '' }}">
    </div>
    <div class="country profile-textbox">
        <div class="country profilelabel requiredstar">Country</div>
        <select class="form-control profile countryy" id="countryy" name="countryy">
            
            <option value="CA"  {{ (isset($user_detail->payment_country) == 'CA' ) ? 'selected="selected"' : '' }} >Canada</option>
            <option  value="US" {{ (isset($user_detail->payment_country) == 'US' ) ? 'selected="selected"' : '' }}>United States</option>
        </select>
    </div>
    
</div>
                    </div>
                </div>
                    <div id="paymentmethod" class="tabcontent" style="display: none ;">
                        <div class="payment-main  mt-25">

    <div class="payee payment-textbox">
        <div class="payee paymentlabel requiredstar">Payee (Person or Business)</div>
        <input type="text" id="payee" class="form-control payeee" placeholder="Payee (Person or Business)" name="payee" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->payee : '' }}">
    </div>
    <div class="mailing-lbl payment-textbox pb-3">Mailing Address</div>

    <div class="address-chk align-items-center">
        <input class="profile-adrs" type="checkbox" checked="checked" id="profile-adrs" name="profile-adrs">
        <label for="profile-adrs">User Profile Address</label>
    </div>
    
    <div class="payment-address payment-textbox">
        <div class="payment--address paymentlabel requiredstar">Address</div>
        <input type="text" id="payment_address" class="form-control payment_address" placeholder="Address" name="payment_address" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->payment_address : '' }}">
    </div>
    <div class="payment-city payment-textbox">
        <div class="form-controlpayment-city paymentlabel requiredstar">City</div>
        <input type="text" id="payment_city" class="form-control payment_city" placeholder="City" name="payment_city" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->payment_city : '' }}">
    </div>
    <div class="payment-province profile-textbox">
        <div class="payment-province paymentlabel requiredstar">Province/State</div>
        <input type="hidden" id="payment-selected-province" name="payment-selected-province" value="ON">
        <input type="hidden" id="payment-selected-country" name="payment-selected-country" value="CA">
        <input type="text" class="form-control payment_province" id="payment_province" name="payment_province" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->payment_province : '' }}">
        
        {{-- <select class="form-control profile payment_province" id="payment_province" name="payment_province">
        </select> --}}
    </div>
    <div class="payment-postal_code payment-textbox">
        <div class="postal_code paymentlabel requiredstar">Postal Code or Zip Code</div>
        <input type="text" id="payment_postal_code" class="form-control payment_postal_code" placeholder="M1M1M1" name="payment_postal_code" value="{{ ($users->id == isset($user_detail->user_id)) ? $user_detail->payment_postal_code : '' }}">
    </div>
    <div class="payment-country profile-textbox">
        <div class="country paymentlabel requiredstar">Country</div>
        <select class="form-control profile payment_country" id="payment_country" name="payment_country">
            <option value="CA" {{ (isset($user_detail->payment_country) == 'CA' ) ? 'selected="selected"' : '' }}>Canada</option>
            <option value="US" {{ (isset($user_detail->payment_country) == 'US' ) ? 'selected="selected"' : '' }}>United States</option>
        </select>
    </div>
    

</div>
   
                    </div>
                </div>
                <div class="setting-tab" style="display: none;">
                    <div class="setting-main">
    <div class="setting-chk1 setting-checkbox">
        <input type="checkbox" id="chk1" name="chk1">
        <label for="chk1">Notification Setting</label>
    </div>
    <div class="setting-chk2 setting-checkbox">
        <input type="checkbox" id="chk2" name="chk2">
        <label for="chk1">Emailing Setting</label>
    </div>

    <div class="setting-chk3 setting-checkbox">
        <input type="checkbox" id="chk3" name="chk3">
        <label for="chk1">Emailing Setting 3</label>
    </div>

    <div class="setting-chk4 setting-checkbox">
        <input type="checkbox" id="chk4" name="chk4">
        <label for="chk1">Emailing Setting 4</label>
    </div>

    <div class="setting-chk5 setting-checkbox">
        <input type="checkbox" id="chk5" name="chk5">
        <label for="chk1">Emailing Setting 5</label>
    </div>


    
</div>                    </div>
                <div class="required-text"><span>*</span> Required Field </div> 
                <div class="profile-payment-btn"> 
                   
                    <input type="hidden" class="form-control user_id" id="user_id" placeholder="user ID" name="user_id" value="{{$users->id}}">
                    <div id="success_message">
                        

                    </div>
                    <button type="submit" class="btn btn-primary update_user" id="btn-profile-payment-save">Save</button>
                </div>               
            </div>
    </div>
</div>
<script>
    $(document).load().scrollTop(0);


    function openProfile( e) {
      //  console.log(e);
        var x = document.getElementById("paymentmethod");
        var y = document.getElementById("profile");
        var profile = document.getElementById("profileClick");
        var payment = document.getElementById("paymentClick");
        
        if(e == 'paymentmethod'){
        


        // x.style.cssText += ';display:block !important;';
        y.style.display = "none";
        x.style.display = "block";
        payment.classList.add("active");
        // payment.classList.add("");
        profile.classList.remove("active");
        console.log(profile);
            
        }else{
            
        // y.style.cssText = ';display:block !important;';
        x.style.display = "none";
        y.style.display = "block";
        profile.classList.add("active");
        
        payment.classList.remove("active");
        console.log(x);
            console.log(y);


        }

// 
}
</script>



<script>
    $(document).ready(function () {
          
        $(document).on('click', '.update_user' ,function (e) {
            e.preventDefault();
            var user_id = $('.user_id').val();
           // console.log('hello');

            var data = {
                'user_id' : $('.user_id').val(),
                'firstname' : $('.firstname').val(),
                'lastname' : $('.lastname').val(),
                'company' : $('.companyuser').val(),
                'tax_id' : $('.tax_id').val(),
                'title' : $('.titlee').val(),
                'phone' : $('.phoneuser').val(),
                'address' : $('.addressuser').val(),
                'city' : $('.cityuser').val(),
                'province' : $('.provincee').val(),
                'postal_code' : $('.postal_codee').val(),
                'payee' : $('.payeee').val(),
                'profile-adrs' : $('.profile-adrs').val(),
                'payment_address' : $('.payment_address').val(),
                'payment_city' : $('.payment_city').val(),
                'payment_province' : $('.payment_province').val(),
                'payment_postal_code' : $('.payment_postal_code').val(),
                'payment_country' : $('.payment_country').val(),
                'country' : $('.countryy').val(),
          


            }
            //  console.log(data);
           
             $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

  //  JQUERY POST METHOD 
            $.ajax({
                type: "put",
                url: "/user/"+user_id+"/update",
                data: data,
                dataType: "JSON",
                success: function (response) {
                    console.log(response);
                    
                    if(response.status == 400){
                        $('#profile-info-errors').html("");
                        $('#profile-info-errors').addClass("alert alert-danger");
                        $.each(response.errors, function (key, err_values) { 
                        $('#profile-info-errors').append('<li>'+err_values+'</li>');
                        $('#profile-error-bag').alert('block');
                        $("#profile-error-bag").show()
                        setTimeout(function() {
                            $("#profile-error-bag").fadeOut();
                    }, 3000);
                          
                    
                    });
                    }else{
                        $('#profile-info-errors').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#success_message').show();
                        setTimeout(function() {
                       
                        $("#success_message").fadeOut();
                    }, 3000);
                        // $('#AddStudentModal').modal('hide');
                        // $('#AddStudentModal').find('input').val("");
                        // fetchstudent();

                    }
                }
            });

        });
    });
        </script>

@endsection


