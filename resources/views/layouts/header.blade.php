<nav class="navbar navbar-expand navbar-dark navbar-custom fixed-top navbar-header-wrapper">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <div class="header-logo" style="margin: auto;"><a href="{{ url('/') }}"><img
                            src="https://cmsdev.justboardrooms.com/Images/Logo_New.svg" width="250"></a></div>

                <div class="header-link" id="header-link-top">
                    @if (auth()->user() != NULL)
                    <ul class="navbar-nav top-header">
                        <li class="nav-item11 user-myacc">
                            <a type="submit" class="btn dropdown-toggle" data-toggle="dropdown">
                                My account
                            </a>
                            <div class="dropdown-menu">
                                <a class="nav-link header-account-link"
                                    href="/api/listing/173/userProfile#profile">Account</a>
                                <!-- <a class="nav-link header-account-link" href="/api/listing/173/userProfile#setting">Setting</a> -->
                                <a class="nav-link" href="/api/reports">Report</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>

                            <!--<button type="submit" class="btn btn-primary" onclick="event.preventDefault();logout();">Logout</button>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://jbwp.ttldev.net/help-center">Help Centre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://jbwp.ttldev.net/contact/">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Live chat</a>
                        </li>

                    </ul>
                    @endif
                    <ul class="navbar-nav bottom-header">
                        <li class="nav-item active">
                            <a class="nav-link active" href="{{ url('/listing/dashboard') }}">Find a space</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/listing/create') }}">List a space</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/the-why') }}">The Why</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News</a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>
