@extends('layouts.master')

@section('content')
<div id="user-profile-body" class="user-profile-body-wrapper mt-90  mh-690 bg-content-grey">
    <div class="user-profile-wrapper bg-content-grey pt-4">
            <div class="account-main">
                <div class="account-text-header account-header">Account Information</div>
                <div class="setting-text-header account-header" style="display:none;">Settings</div>
                @if(isset($user_profile->profile_pic))
                    <div class="img-preview profile-pic">
                        <div class="profile-username">
                            <img src="/profile/{{$user_profile->profile_pic}}" class=" profile-username img-thumbnail" width="80" height="80" />
                        </div>
                    </div>

                <div class="up-update-photo mt-20 up-add-update-photo">Update Photo</div>
                @else
                    <div class="profile-pic">
                        <div class="profile-username">{{$initial}}</div>
                    </div>
                <div class="up-add-photo mt-20 up-add-update-photo"> Add Photo</div>
                @endif

                <div class="add-photo-link mb-25" style="display: none;">
                    <form id="uploadForm" action="upload.php" method="post" >
                        <label>Upload Image File:</label><br/>
                        <input type="file" name="image" id="image-selecter" accept="image/*">
                        <input type="submit" value="Submit" class="btnSubmit" />
                    </form>
                </div>


                <div class="email-pass-wrapper">

                    <div class="alert alert-danger" id="change-error-bag">
                        <ul id="change-info-errors">
                        </ul>
                    </div>

                    <div class="alert alert-success" id="change-password-bag">
                        <ul id="change-password-success">
                        </ul>
                    </div>
                    <div class="email account-textbox">
                        <div class="email-text">Email</div>

                        <div class="input-changelink-wrapper">
                            <input type="text"  id="email" placeholder="Email" name="email" value={{$user->email}}>
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

                    <div class="alert alert-danger" id="profile-error-bag">
                        <ul id="profile-info-errors">
                        </ul>
                    </div>
                    <div class="alert alert-success" id="profile-success-bag">
                        <ul id="profile-success">
                        </ul>
                    </div>

                    
                    <div class="alert alert-danger" id="payment-error-bag">
                        <ul id="payment-info-errors">
                        </ul>
                    </div>
                    <div class="alert alert-success" id="payment-success-bag">
                        <ul id="payment-success">
                        </ul>
                    </div>



                    <div class="tab">
                        <div class="profile-tab tablinks profile-payment-tablink active profile-tab" onclick="openProfilePayment(event, 'profile')">Profile</div>
                        <div class="payment-tab tablinks paymentmethod-tab profile-payment-tablink" onclick="openProfilePayment(event, 'paymentmethod')">Payment Method</div>
                    </div>

                    <div id="profile" class="tabcontent">
                            @include('Listing.profile')
                    </div>

                    <div id="paymentmethod" class="tabcontent">
                        @include('Listing.payment')   
                    </div>
                </div>
                <div class="setting-tab">
                    @include('Listing.setting')
                </div>
                <div class="required-text"><span>*</span> Required Field </div> 
                <div class="profile-payment-btn"> 
                    <button  type="submit" class="btn btn-primary" id="btn-profile-payment-save">Save</button>
                </div>               
            </div>
    </div>
</div>
<script>
    $(document).load().scrollTop(0);
</script>

@endsection


