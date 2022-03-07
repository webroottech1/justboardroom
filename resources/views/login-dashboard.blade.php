<style>
nav.navbar {
    display: none;
}
.jb_maincont nav.navbar {
    display: block;
}
.jb_maincont {
    margin-top: 0 !important;
}
#main-menu {
    justify-content: end;
}
</style>
@extends('layouts.master')
@section('content')
<nav class="navbar navbar-expand navbar-dark navbar-custom fixed-top navbar-header-wrapper">

	<div class="container-fluid" style="z-index:101;">
		<!-- Your site title as branding in the menu -->
		<a href="{{url('/')}}" ><img width="194" height="100" src="https://cmsdev.justboardrooms.com/Images/Logo_New.svg" class="img-fluid" alt="Just Boardrooms"></a><!-- end custom logo -->

		<div id="navbarNavDropdown" class="collapse navbar-collapse top-menu">
			<ul id="main-menu" class="navbar-nav nav-font ml-auto">
				<!-- <li itemscope="itemscope" class="nav-item">
					<a title="Find a Space" href="https://justboardrooms.com/find-a-space/" class="nav-link">Find a Space</a></li> -->
				<li itemscope="itemscope" class="page-item-159 current_page_item active nav-item">
					<a title="List A Space" href="#" class="nav-link" onclick="#">List A Space</a></li>
					<li itemscope="itemscope" class="page-item-159 nav-item">
					<a title="List A Space" href="{{url('/login')}}" class="nav-link" >Login</a></li>
				<!-- <li itemscope="itemscope" class="nav-item">
					<a title="FAQ" href="https://justboardrooms.com/faq/" class="nav-link">FAQ</a></li>
				<li itemscope="itemscope" class="nav-item">
					<a title="The Why" href="https://justboardrooms.com/the-why/" class="nav-link">The Why</a></li> -->
			</ul>
		</div>
	</div><!-- .container -->
</nav>
<div class="dashboard-banner">
    <div id="listnowhero" class="jumbotron not-home p-0">
        <div class="home-container container h-100" id="content">
            <div class="row h-100">
                <div class="col-md-6 d-md-block d-none align-self-center"></div>

                <div class="col-md-6 d-md-block d-none home-header">
                    <h1 class="jumbotron-text my-5">
                        Monetize your <br />
                        meeting space<span class="accent-color">.</span>
                    </h1>
                    <div class="white-transparent-back col-8">
                        <div class="p-4 col-12">
                            <div class="col-12 justify-content-center text-center m-auto">
                                <span class="header-float-title" style="font-size: 21px; /* text-align: center!important; */ font-weight: 600;">Start earning money with Just Boardrooms.</span>
                            </div>
                            <div class="col-12 justify-content-center text-center m-auto pt-3">
                                <div class="app-store-link">
                                    <a title="GET STARTED" href="#" class="btn btn-jb col-12 font-weight-bold" onclick="event.preventDefault();addLoginForm();">GET STARTED</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper homepage fas-wrapper py-4" id="full-width-page-wrapper">
        <div class="container" id="content">
            <div class="row">
                <div class="col-md-12 content-area" id="primary">
                    <main class="site-main" id="main" role="main"></main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row end -->
        </div>
        <!-- #content -->

        <div class="container">
            <div class="row">
                <div class="col-md-4 d-md-block d-none">
                    <div class="jb-breadcrumb">
                        <ul id="ah-breadcrumb" class="ah-breadcrumb">
                            <li class="item"><a href="https://justboardrooms.com">Home</a></li>
                            <li class="seperator">/</li>
                            <li class="item-current item">List A Space</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 d-block d-md-none">
                    <h1 class="jumbotron-text-mobile my-5 p-3" style="margin-bottom: 77px !important;">
                        Monetize your<br />
                        meeting space.
                    </h1>
                    <div class="white-transparent-back m-3 d-none">
                        <div class="row p-5">
                            <div class="col-12 app-store-text-mobile">
                                Start earning money with Just Boardrooms.
                            </div>
                            <div class="col-12">
                                <div class="app-store-link">
                                    <a class="jb-button" href="#">
                                        Get Started
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-block d-md-none">
                    <div class="grey-line"></div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <div class="row">
                <div class="col-md-12 my-5 mt-md-0">
                    <h3>
                        <span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png" /></span>Make your space work for you
                    </h3>
                </div>
                <div class="col-md-6 px-5 h-100 text-center">
                    <img src="https://justboardrooms.com/wp-content/uploads/2020/06/Path-1195.png" />
                </div>
                <div class="col-md-6 p-5 h-100">
                    <div class="short-copy-section mb-5">
                        <div>
                            <p>
                                <strong>Free cash flow.</strong> The gig economy is booming. With more employees now forced to work from home, the demand for safe, clean and professional meeting and work spaces has never been higher. Just
                                Boardrooms is your chance to create an added revenue stream, attract foot traffic into your space, and empower a greener economy. It just makes sense.
                            </p>
                        </div>
                    </div>

                    <div class="app">
                        <div class="row">
                            <div class="col-12">
                                <div class="orange-bar"></div>
                                <div class="coming-soon">
                                    <p>Just Boardrooms app coming soon!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">See how easy it is to list your boardroom</h3>
                    <video class="jb-video" controls="" poster="https://justboardrooms.com/wp-content/themes/understrap/images/listnow_video_thumbnail.png">
                        <source src="https://justboardrooms.com/wp-content/themes/understrap/images/JB-Video2-V5.mp4" type="video/mp4" />
                        Your Browser Does Not Support The Video Tag
                    </video>
                </div>
            </div>
        </div>

        <!-- </div> -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="quartet my-5">Why list with Just Boardrooms?</div>
                </div>
            </div>
            <div class="row d-none d-md-flex">
                <div class="col-md-3 text-center">
                    <img src="https://host.justboardrooms.com/Images/Money-Growth.png" />
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://host.justboardrooms.com/Images/Promote-Growth-icon.png" />
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://host.justboardrooms.com/Images/Economy-growth-icon.png" />
                </div>
                <div class="col-md-3 text-center">
                    <img src="https://host.justboardrooms.com/Images/Success-icon.png" />
                </div>
            </div>
            <div class="row d-none d-md-flex">
                <div class="col-md-3 text-center">
                    <div class="quartet-copy">Generate revenue and offset overhead</div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="quartet-copy">Promote your business, attract new opportunities</div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="quartet-copy">Empower the sharing, carbon-reducing economy</div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="quartet-copy">Achieve success with the help of our customer success team</div>
                </div>
            </div>
            <div class="pt-5">
                <div class="app">
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="orange-bar">
          </div> -->
                            <div class="coming-soon">
                                <p>List now!</p>
                                <button onclick="event.preventDefault();addLoginForm();" type="button" class="btn btn-jb" data-toggle="modal">Click here!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Quad -->
            <div class="row d-md-none d-flex p-3">
                <div class="row">
                    <div class="col-6 text-center">
                        <img src="https://justboardrooms.com/wp-content/uploads/2020/06/Money-Growth.png" />
                        <div class="quartet-copy">Generate revenue and offset overhead</div>
                    </div>
                    <div class="col-6 text-center">
                        <img src="https://justboardrooms.com/wp-content/uploads/2020/06/Promote-Growth-icon.png" />
                        <div class="quartet-copy">Promote your business, attract new opportunities</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <img src="https://justboardrooms.com/wp-content/uploads/2020/06/Economy-growth-icon.png" />
                        <div class="quartet-copy">Empower the sharing, carbon-reducing economy</div>
                    </div>
                    <div class="col-6 text-center">
                        <img src="https://justboardrooms.com/wp-content/uploads/2020/06/Success-icon.png" />
                        <div class="quartet-copy">Achieve success with the help of our customer success team</div>
                    </div>
                </div>
            </div>

            <!-- -->
        </div>
    </div>
</div>
<div id="cindy-lau" class="container-fluid dashboard-end-section mt-5 pt-5">
    <div class="row end-banner white h-100">
        <div class="col-md-2 my-auto"></div>
		<div class="col-md-4 my-auto">
            <div class="quotation">
                <img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange-quote.png" />
            </div>
            <div class="quote">Just Boardrooms is extra money in my business’s pocket with minimal effort.”</div>
            <div class="cite">Cindy Wilner-Lau <span class="spacer" style="color: #ff671d;">|</span><span class="job-title font-italic"> Artist &amp; Studio Owner</span></div>
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
            <div class="img-model-signup" style="text-align: center;">
              <img class="appleicon" src="{{ url('/imgs/signup-apple.png')}}" style="margin:7px">
              <img class="appleicon" src="{{ url('/imgs/android-signup.png')}}" style="margin:7px">
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
                  <button  type="submit" id="btn-login" class="btn btn-jb col-12 p-2">LOG IN TO HOSTING</button>
                </div>
                <div class="text-left pb-4">
                  <a class="reset_pass text-white" href="{{--{{url('/password/email')}} --}}">Forgot your password?</a>
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
                <input type="hidden" name="g-recaptcha-response" id="recaptcha">
                <script src="https://www.google.com/recaptcha/api.js?render=6LfRf4MbAAAAAJIqLyaWsEVb8kQw7ZDiU4Wl-zKf"></script>
                {{-- <script>
                  grecaptcha.ready(function() {
                      grecaptcha.execute('6LfRf4MbAAAAAJIqLyaWsEVb8kQw7ZDiU4Wl-zKf', {action: 'registration'}).then(function(token) {
                          if (token) {
                            document.getElementById('recaptcha').value = token;
                          }
                      });
                  });
                </script>                 --}}
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









@endsection
