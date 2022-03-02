<nav class="navbar navbar-expand navbar-dark navbar-custom fixed-top navbar-header-wrapper">
    <div class="container1" style="width: 100%">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <div class="header-logo" style="margin: auto;"><a href="/api/dashboard"><img src="https://cmsdev.justboardrooms.com/Images/Logo_New.svg" width="194" height="36"></a></div>
            
                    <div class="header-link" id="header-link-top"> 
                        <ul class="navbar-nav top-header">
                            <li class="nav-item">
                                <a class="nav-link" href="https://jbwp.ttldev.net/help-center">Help Centre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://jbwp.ttldev.net/contact/">Contact</a>
                            </li>
                            
                        </ul>

                        <ul class="navbar-nav bottom-header">
                            <li class="nav-item active">
                                <a class="nav-link active" href="/api/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="/api/listing/address">List Boardroom</a>
                                                                </li>
                                                        <li class="nav-item">
                                    <a class="nav-link" href="/api/listing/Calendar">Calendar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/api/inbox">Inbox</a>
                            </li>
                            <li class="nav-item11 user-profile-pic">
                                <button type="submit" class="btn dropdown-toggle" data-toggle="dropdown">
                                                                                                                <div class="profile-pic">
                                            <div class="profile-username">A</div>
                                        </div>
                                                                    </button>
                                <div class="dropdown-menu">
                                <a class="nav-link header-account-link" href="/api/listing/173/userProfile#profile">Account</a>
                                    <!-- <a class="nav-link header-account-link" href="/api/listing/173/userProfile#setting">Setting</a> -->
                                    <a class="nav-link" href="/api/reports">Report</a>
                                    <a class="nav-link" onclick="event.preventDefault();logout();">Log out</a>
                                </div>
                                
                                <!--<button type="submit" class="btn btn-primary" onclick="event.preventDefault();logout();">Logout</button>-->
                            </li>
                        </ul>
                    </div>

            </ul>
        </div>
    </div>
</nav>