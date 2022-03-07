@if(!Auth::check())
<!-- <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav">
        <div class="header-logo" style="margin: auto;"><a href="/api/dashboard"><img src="{{ asset('/Images/Logo_New.svg')}}"  width="194" height="36"></a></div>
        <div class="header-link" id="header-link-top">
            <ul class="navbar-nav top-header">
                <li class="nav-item">
                    <a class="nav-link" href="/list-now">List Now</a>
                </li>
            </ul>
        </div>
    </ul>
</div> -->
<div id="wrapper-navbar" class="sticky-top">
    <!-- <nav class="navbar navbar-expand-md navbar-dark header-top jb-nav-bg-secondary navbar-custom">

        <div id="navbarNavDropdown" class="collapse navbar-collapse bottom-menu">
            <ul id="secondary-menu" class="navbar-nav nav-font ml-auto">
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-186 nav-item">
                    <a title="Help Center" href="https://justboardrooms.com/help-center/" class="nav-link">Help Center</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-185 nav-item">
                    <a title="Contact" href="https://justboardrooms.com/contact/" class="nav-link">Contact</a></li>
                <li class="drift-open-chat menu-item menu-item-type-custom menu-item-object-custom menu-item-514 nav-item">
                    <a title="Live Chat" href="#" class="nav-link">Live Chat</a></li>
            </ul>
        </div>
    </nav> -->
    <nav class="navbar navbar-expand-md navbar-dark header-top jb-nav-bg navbar-custom">

        <div class="container-fluid" style="z-index:101;">
            <!-- Your site title as branding in the menu -->
            <a href="https://justboardrooms.com/" class="navbar-brand custom-logo-link"><img width="464" height="100"
            src="{{ asset('/Images/Logo_New.svg')}}" class="img-fluid" alt="Just Boardrooms"></a><!-- end custom logo -->

            <div id="navbarNavDropdown" class="collapse navbar-collapse top-menu">
                <ul id="main-menu" class="navbar-nav nav-font ml-auto">
                    <!-- <li itemscope="itemscope" class="nav-item">
                        <a title="Find a Space" href="https://justboardrooms.com/find-a-space/" class="nav-link">Find a Space</a></li> -->
                    <li itemscope="itemscope" class="page-item-159 current_page_item active nav-item">
                        <a title="List A Space" href="" class="nav-link" onclick="event.preventDefault();addLoginForm();">List A Space</a></li>
                        <li itemscope="itemscope" class="page-item-159 nav-item">
                        <a title="List A Space" href="#" class="nav-link" href="{{url('/login')}}">Login</a></li>
                    <!-- <li itemscope="itemscope" class="nav-item">
                        <a title="FAQ" href="https://justboardrooms.com/faq/" class="nav-link">FAQ</a></li>
                    <li itemscope="itemscope" class="nav-item">
                        <a title="The Why" href="https://justboardrooms.com/the-why/" class="nav-link">The Why</a></li> -->
                </ul>
            </div>
        </div><!-- .container -->
    </nav><!-- .site-navigation -->

</div>
@endif

@if(Auth::check())
<nav class="navbar navbar-expand navbar-dark navbar-custom fixed-top navbar-header-wrapper">
    <div class="container1" style="width: 100%">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <div class="header-logo" style="margin: auto;"><a href="/api/dashboard"><img src="{{ asset('/Images/Logo_New.svg')}}"  width="194" height="36"></a></div>

                    <div class="header-link" id="header-link-top">
                        <ul class="navbar-nav top-header">
                            <li class="nav-item">
                                <a class="nav-link" href="https://jbwp.ttldev.net/help-center">Help Centre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://jbwp.ttldev.net/contact/">Contact</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">Live Chat</a>
                            </li> --}}
                        </ul>

                        <ul class="navbar-nav bottom-header">
                            <li class="nav-item">
                                <a class="nav-link" href="/api/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="/api/listing/address">List Boardroom</a>
                                    <?php /*<a class="nav-link" style="text-decoration: line-through;">List Boardroom</a>*/ ?>
                            </li>
                            @if(Auth::user()->user_type =='3')
                            <li class="nav-item">
                                    <a class="nav-link" href="/api/users">Users</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                    <a class="nav-link" href="/api/listing/Calendar">Calendar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/api/inbox">Inbox</a>
                            </li>
                            <li class="nav-item11 user-profile-pic">
                                <button type="submit" class="btn dropdown-toggle" data-toggle="dropdown">
                                    @php $initial = strtoupper(substr(Auth::user()->name, 0, 1));


                                    @endphp
                                    @if(isset(Auth::user()->profile->profile_pic))
                                        <div class="profile-pic">
                                            <div class="profile-username"><img  src="/profile/{{Auth::user()->profile->profile_pic}}" class="" /></div>
                                        </div>
                                        @else
                                        <div class="profile-pic">
                                            <div class="profile-username">{{$initial}}</div>
                                        </div>
                                    @endif
                                </button>
                                <div class="dropdown-menu">
                                <a class="nav-link header-account-link" href="/api/listing/{{Auth::user()->id}}/userProfile#profile">Account</a>
                                    <!-- <a class="nav-link header-account-link" href="/api/listing/{{Auth::user()->id}}/userProfile#setting">Setting</a> -->
                                    <a class="nav-link" href="/api/reports">Report</a>
                                    <a class="nav-link" onclick="event.preventDefault();logout();">Log out</a>
                                </div>
                                {{-- <!--<a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>--> --}}
                                <!--<button type="submit" class="btn btn-primary" onclick="event.preventDefault();logout();">Logout</button>-->
                            </li>
                        </ul>
                    </div>

            </ul>
        </div>
    </div>
</nav>
<?php
/*
<div style="border: 0px solid red; position: fixed; top: 88px; padding-top: 15px; width: 100%; text-align: center; z-index: 99; background-color: #fff; color: red;">
Our "List Boardroom" functionality is currently undergoing maintenance will be up shortly. Sorry for the inconvenience.
</div>
<style>
.mt-110 {
  margin-top: 150px;
}
</style>
*/
?>
@endif
