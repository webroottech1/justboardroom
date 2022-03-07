
{{-- @extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">{{ __('Login') }}</div>


                <div class="card-body">
                    <fozrm method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>


                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}


@extends('layouts.master')
@section('content')
<div class="loginpg">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <!-- <div class="card-header">Login</div> -->
                        <div class="card-body">
							<h4 class="login-title">Welcome to justboardrooms</h4>
							<p class="modal-sub-title">Currently the Just Boardrooms website only allows access to hosting functionalities. To book a boardroom, please download our app on iOS or Android.</p>
							<div class="img-model-signup my-2" style="text-align: center;">
								<img class="appleicon" src="imgs/signup-apple.png" style="margin:7px">
								<img class="appleicon" src="imgs/android-signup.png" style="margin:7px">
							</div>
							<div class="pt-3 pb-3 text-center">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
									<div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

									<div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


									<div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-jb col-12 p-2">
                                                {{ __('LOG IN TO HOSTING') }}
                                            </button>
                                        </div>
                                    </div>

								</form>
								<div class="login-footer">
									<div class="row mx-auto">
										<div class="col-md-6">
											<p class="text-white m-0">Don't have an account?</p>
										</div>
										<div class="col-md-4">

                                            <a class="btn btn-sign-up btn-register" href="{{ route('register') }}">{{ __('SIGN UP') }}</a>

										</div>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
	</div>

    @endsection
