@extends('layouts.master')

@section('content')
<div id="listnowhero" class="jumbotron not-home p-0">
    <div class="home-container container h-100" id="content">
            <div class="row h-100 d-flex justify-content-center">
                <div class="col-md-9 mt-auto d-md-block d-none">
                <div class="col-md-12">
            <div class="card reset">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/password/email') }}">
                        @csrf

                        <div class="form-group-reset row col-md-12">
                            <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex col-md-12 mt-2">
                                <button type="submit" class="btn btn-jb col-12 font-weight-bold">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>           
                        </div>
                        <div>                 
                        </div>

                    </form>
                </div>
            </div>
        </div>
            
        </div>
    </div>


   <div class="modal" id="login">
    <div class="modal-dialog">
      <div class="modal-content">  
          <div class="modal-body pb-0">
            <div>
              <h4 class="modal-title">Welcome to justboardrooms</h4>
            </div>
            <div class="pt-3">
              <span class="modal-sub-title">Currently the Just Boardrooms website only allows access to hosting functionalities. 
                To book a boardroom, please download our app on iOS or Android.</span>
            </div>
            <div class="pt-3 pb-3 text-center">

              <form id="ltnw-login">
                <!-- <div class="form-group"> -->
                <div class="py-2">
                  <input type="email" class="form-control" placeholder="Email" id="email" name="emaillist">
                </div>
                <div class="py-2">
                  <input type="password" class="form-control" placeholder="Password" id="pwd" name="pwd">
                </div>
                <!-- </div> -->
                <!-- <div class="form-group"> -->
                <!-- </div> -->
                <div class="alert-login-forms" id="add-error-bag">
                  <ul id="list-login-errors">
                  </ul>
                </div>
                <div class="py-2">
                  <button  type="submit" id="btn-login" class="btn btn-jb col-12 p-2">LOGIN IN HOSTING</button>
                </div>
                <div class="text-left pb-4">
                  <a class="reset_pass text-white" href="{{url('/password/email')}}">Forgot your password?</a>
                </div>
              </form>

              <div class="modal-footer login-forms">
                <div>
                  <span class="text-white">Don't have an account?</span>
                </div>
                <div>
                  <button onclick="event.preventDefault();addRegisterForm();" type="submit" class="btn btn-sign-up btn-register" data-toggle="modal" >SIGN UP</button>
                </div>
              </div>
            
            </div>

          </div>

      </div>
    </div>
  </div>

  <div class="modal" id="register">
    <div class="modal-dialog">
      <div class="modal-content">  
          <div class="modal-body pb-0">
            <div>
              <h4 class="modal-title">Start listing your boardroom for free</h4>
            </div>
            <div class="pt-3 pb-3 text-center">

              <form id="ltnw-register">
                <!-- <div class="form-group"> -->
                <div class="row py-2">
                  <div class="col-6">
                    <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
                  </div>
                </div>
                <div class="py-2">
                  <input type="email" class="form-control" placeholder="Email" id="email_register" name="email_register">
                </div>
                <div class="py-2">
                  <input type="password" class="form-control" placeholder="Password" id="pwd_register" name="pwd_register">
                </div>
                <div class="py-2">
                  <input type="password" class="form-control" placeholder="Confirm password" id="c_password" name="c_password">
                </div>

                <!-- </div> -->
                <!-- <div class="form-group"> -->
                <!-- </div> -->
                <div class="alert-register-forms" id="add-error-bag-register">
                  <ul id="list-register-errors">
                  </ul>
                </div>
                <div class="py-2">
                  <button  type="submit" id="btn-register" class="btn btn-jb col-12 p-2">CREATE MY ACCOUNT</button>
                </div>
              </form>

              <div class="modal-footer register-forms">
                <div>
                  <span class="text-white">Already have an account?</span>
                </div>
                <div>
                  <button onclick="event.preventDefault();loginForm();" type="submit" class="btn btn-sign-up btn-register" data-toggle="modal" >LOG IN</button>
                </div>
              </div>
            
            </div>

          </div>

      </div>
    </div>
  </div>  
    
</div>   
   @endsection
