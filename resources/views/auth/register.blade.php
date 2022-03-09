@extends('layouts.master')

@section('content')
    <div class="registerpage">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                        <div class="jb-registerform">
                            <div class="card-body py-5">
                                <h4 class="register-title mb-4">Start listing your Boardroom for free</h4>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf


                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input id="name" type="text" placeholder="First Name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name" value="{{ old('first_name') }}" required
                                                autocomplete="first_name" autofocus>

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <div class="col-md-6">
                                            <input id="last_name" placeholder="Last Name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" value="{{ old('last_name') }}" required
                                                autocomplete="last_name" autofocus>

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">



                                        <div class="col-md-12">
                                            <input id="email" placeholder="E-Mail Address" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="password" placeholder="Password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">


                                        <div class="col-md-12">
                                            <input id="password-confirm" placeholder="Confirm Password" type="password"
                                                class="form-control" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">

                                        <div class="col-12">
                                            <button type="submit" class="btn w-100 registerbtnjb">
                                                {{ __('CREATE MY ACCOUNT') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="login-footer">
                                    <div class="row mx-auto">
                                        <div class="col-md-8">
                                            <p class="text-white m-0">Already have an account?</p>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-sign-up btn-register"
                                                href="{{ route('login') }}">{{ __('LOG IN') }}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
