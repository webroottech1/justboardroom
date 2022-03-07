@extends('layouts.master')

@section('content')




<div class="jumbotron text-center" style="margin-bottom:0; min-height:690px">

    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-warning">
      {{ session('warning') }}
    </div>
   @endif
    <h1 class="home jtext">List Now page</h2>
    <div>
        <p>start earning money from your boardroom</p>
        <button onclick="event.preventDefault();addLoginForm();" type="button" class="btn btn-primary" data-toggle="modal" >List Now</button>
    </div>



</div>
<div class="modal" id="login">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Welcome Back to justboardrooms</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="alert alert-danger" id="add-error-bag">
                <ul id="list-login-errors">
                </ul>
            </div>
            <form id="ltnw-login">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="emaillist">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd">
              </div>
              <button type="submit" id="btn-login" class="btn btn-primary">Login</button>
              <a class="reset_pass" href="{{url('/password/email')}}">Forget your password?</a>
        </div>
            </form>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button onclick="event.preventDefault();addRegisterForm();" type="submit" class="btn btn-primary btn-register" data-toggle="modal" >sign up</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal" id="register">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Start Listing Your boardroom for free</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="alert alert-danger" id="add-error-bag-register">
                <ul id="list-register-errors">
                </ul>
            </div>
            <form id="ltnw-register">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" id="email_register" name="email_register">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="pwd_register" name="pwd_register">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm password" id="c_password" name="c_password">
                </div>

                <button type="submit" id="btn-register" class="btn btn-primary" data-toggle="modal">Create My Account</button>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-login">Login</button>
        </div>

      </div>
    </div>
  </div>

  <div class="modal"  id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Before you begin</h3>
            </div>
            <div class="modal-body term-body">
                <div class="card example-1 scrollbar-ripe-malinka">
                    <div class="card-body">
                      <h4 id="section1"><strong>First title of the news</strong></h4>
                      <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out
                        qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan
                        mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim
                        qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic.
                        Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
                      <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out
                        qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan
                        mcsweeney's photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim
                        qui you probably haven't heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic.
                        Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.</p>
                    </div>
                  </div>
            </div>
            <div class="modal-footer term-footer">
                <button type="submit" class="btn btn-primary" id="btn-accept">Accept</button>
                <button type="submit" class="btn btn-primary btn-decline" id="btn-decline">Decline</button>
            </div>
        </div>
    </div>
</div>

@endsection

