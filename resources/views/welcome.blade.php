@extends('layouts.master')
@section('content')
      <div class="welcome_page">
<div class="boardroom-banner">  
	<div class="banner-box positon-relative">
		<div class="banner-text">
			<div class="row">
				<div class="col-md-6">
					<h1><span>Meetings</span><br>When and Where<br> you want them</h1>
					<p>Download the app and get started today</p>
					<div class="row">
						<div class="col-md-3">
							<img src="{{asset('imgs/revent-app-store.png')}}" class="img-fluid" alt="app-store">
						</div>
						<div class="col-md-3">
							<img src="{{asset('imgs/revent-treat-play-store.png')}}" class="img-fluid" alt="play-store">
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<section class="just-booking">
	<div class="container heading-section">
        <div class="row">
            <div class="col-md-12 mt-5 pl-md-0">
                <h2 class="jb-header-just-booking"> Just Booking</h2>
            </div>
        </div>
    </div>
	<div class="container how-wrk-section">
            <div class="row">
                <div class="col-lg-6 pr-4 pl-md-0 pl-4">
                 <h3><span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>How it works</h3>
                    <div class="copy">
                     <p><strong>Meetings when and where you want them.</strong> Browse boardrooms, find the ideal one for your needs, check availability, then book it. The app handles everything else, from inviting attendees through to final payment.</p>
					<p><strong>Boardrooms in your pocket.</strong> Rent them by the hour, the day, or longer. Find detailed information in each boardroom’s listing, including pictures, location, room capacity, available technology, and fee.</p>
					<p><strong>Health and safety during Covid-19.</strong> Our hosting partners take extra care to follow the appropriate Covid-19 protocols, so that you can maintain peace of mind when booking a boardroom. Make sure to check out the boardroom description and use our internal messaging interface to communicate directly with the host if you have any outstanding questions or concerns.</p>
                    </div>
                    <div class="app">
						<div class="row">
						   <div class="col-6"> <span class="align-bottom">  Get the app and start browsing </span> </div>
							<div class="col-6"><a href="https://apps.apple.com/us/app/justboardrooms/id1576735826"><img class="px-2" src="https://justboardrooms.com/wp-content/themes/understrap/images/iosCTA.png"></a>
						  <a href="https://play.google.com/store/apps/details?id=com.justboardrooms&amp;hl=en_CA&amp;gl=US"> <img src="https://justboardrooms.com/wp-content/themes/understrap/images/androidCTA.png"> </a></div>
						</div>
                    </div>  

                    <!-- </div> -->
            </div>
            <div class="col-lg-6">
                <img class="section-img img-fluid" src="{{asset('imgs/Rectangle-5.png')}}">
            </div>
        </div>
    </div>
	<div id="jill-walker-img" class="container  quote-section1 my-5 pb-5">
        <div class="row quote h-100">
            <div class="col-lg-4 col-md-6">
                
            </div>
            <div class="col-lg-1 col-md-1 col-2 quotation">
                <img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange-quote.png">
            </div>
            <div class="col-lg-7 col-md-5 col-9 mt-md-5 my-auto">
                <div class="quote-copy">Clean, professional, on demand meeting spaces are now more important than ever for my business success.”</div>
                <div class="cite"> Jill <span class="spacer px-1" style="color: #FF671D;">|</span><span class="job-title"> Entrepreneur</span></div>
            </div>
        </div>
    </div>
	<div class="container making-section">
        <div class="row">
            <div class="col-lg-6 py-lg-5 py-md-0 pr-4 pl-md-0 pl-4">
                <h3 class="section1-header"><span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Making the most of Just Boardrooms</h3>
                <div class="copy">
          
                    <p><strong>What will you need from your boardroom?</strong> It’s your meeting! Take into consideration all your meeting requirements before booking:</p>
					<ul>
					<li style="text-align: left; margin-left: 20px;">Number of guests</li>
					<li style="text-align: left; margin-left: 20px;">Transit or parking options</li>
					<li style="text-align: left; margin-left: 20px;">Available technology</li>
					<li style="text-align: left; margin-left: 20px;">Added features, like break-out rooms, kitchen access, etc.</li>
					</ul>
					<p><strong>Stay in touch with your host.</strong> Be sure to reach out through the app if you have any additional questions about your host’s meeting space.</p>
                </div>
                <div class="app">
                    <div class="row">
                       <div class="col-6"> <span class="align-bottom">  Get the app and start browsing </span> </div>
                        <div class="col-6"><a href="https://apps.apple.com/us/app/justboardrooms/id1576735826"><img class="px-2" src="https://justboardrooms.com/wp-content/themes/understrap/images/iosCTA.png"></a>
                      <a href="https://play.google.com/store/apps/details?id=com.justboardrooms&amp;hl=en_CA&amp;gl=US"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/androidCTA.png"> </a></div>
                    </div>
                    </div>  
            </div>
            <div class="col-lg-6 pt-5">
                <img class="section2-img img-fluid" src="{{asset('imgs/Rectangle-5-copy.png')}}">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mid-banner mt-5 img-fluid reading-section">
    <div class="row mx-0 h-100">
        <div class="col-6">    
        </div>
        <div class="col-6">
			<div class="midsection-copy">Just book it. <br>Just list it. <br><br>Just Boardrooms.</div>
        </div>
    </div>
</div>
<section class="just-booking heading-section">
	<div class="container">
        <div class="row">
            <div class="col-md-12 mt-md-5 pl-md-0">
                <h2>Just Booking</h2>
            </div>
            <div class="col-lg-6 pt-3 pr-5 pl-md-0">
                <h3 class="section1-header"><span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>How it works</h3>
                <div class="copy">
                    <p><strong>Monetize your meeting space.</strong> Create your free host account, apply to list your boardroom, and start generating income.</p>
					<p><strong>A safe and secure solution that offsets your overhead.</strong> As a host you maintain ultimate control over your boardroom. We’ll answer any questions you have about opening your space up to others, how best to attract guests, and what to expect.</p>
                </div>
                <div class="app">
                    <div class="row">
                      <div class="col-12 mt-5">
						<a class="jb-button text-uppercase open-host-account" href="https://host.justboardrooms.com/">Open your host account today</a>
                      </div>
                    </div>  
                </div>
            </div>
            <div class="col-lg-6 pt-3 pl-md-0">
                <img src="{{asset('imgs/Rectangle-9.png')}}" class="img-fluid">
            </div>
        </div>
    </div>
	<div class="container video-player">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Discover a simple, <br>all-in-one solution to monetizing your boardroom</h3>
                <video class="jb-video" controls="" poster="https://justboardrooms.com/wp-content/themes/understrap/images/home_video_thumbnail.png">
                    <source src="https://justboardrooms.com/wp-content/themes/understrap/images/JB-Video1-V4.mp4" type="video/mp4">
                    Your Browser Does Not Support The Video Tag
                </video>
            </div>
        </div>
    </div>
	<div id="working-img" class="container quote-section2 my-5 pl-0">
        <div class="row quote h-100">
            <div class="col-lg-4 col-md-6">
                
            </div>
            <div class="col-lg-1 col-md-1 col-2 quotation">
                <img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange-quote.png">
                
            </div>
            <div class="col-lg-7 col-md-5 col-9 mt-md-5 my-auto">
                <div class="quote-copy">Just Boardrooms allows me to earn extra income without adding stress to my already full plate."</div>
                <div class="cite">Natalie <span class="spacer" style="color: #FF671D;">|</span><span class="job-title"> Building &amp; Business Owner</span></div>
            </div>
        </div>
    </div>
	<div class="container">
        <div class="row">
            <div class="col-lg-6 py-5 pr-5 pl-md-0">
                <h3 class="section1-header"><span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Making the most of your listing</h3>
                <div class="copy">
                    <p><strong>Let Just Boardrooms guide you.</strong> Listing your meeting space is a simple, step-by-step process. The more information buckets you fill, the easier it is for us to get you approved and start attracting Just Boardrooms users.</p>
					<p><strong>Be the host with the most.</strong> It’s your space! The more Just Boardrooms users you can attract, the more income you will generate. We recommend:</p>
					<ul>
					<li style="margin-left: 20px;">4-10 high-resolution pictures</li>
					<li style="margin-left: 20px;">Short, catchy, vivid descriptions</li>
					<li style="margin-left: 20px;">Detailed technology specifications</li>
					<li style="margin-left: 20px;">Consider finishing touches, like a mini fridge of drinks and snacks</li>
					<li style="margin-left: 20px;">Considering the current situation with Covid-19, we encourage adding your health and safety policies to your description to ensure potential guests feel secure when booking your space</li>
					</ul>
                </div>
                <div class="app">
                    <div class="row">
                        <div class="col-12">
							<a class="jb-button text-uppercase section4-button" href="https://host.justboardrooms.com/">Get started today</a>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-lg-6 pt-5">
                <img src="{{asset('imgs/Rectangle-9-copy.png')}}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div id="our-why-img" class="container-fluid end-section mt-5 pt-5">
    <div class="row end-banner h-100 mx-0">
        <div class="col-lg-7 col-md-4 my-auto">    
        </div>
        <div class="col-lg-5 col-md-5  mb-auto endsection-ourwhy">
            <div class="endsection-heading">Our Why</div>
            <div class="endsection-copy my-5">We aim to empower the modern business professional with the ability to make more human connections through a simple, technology-based, environmentally friendly solution.</div>
            <a class="jb-button" href="https://justboardrooms.com/the-why/">LEARN MORE</a>
        </div>
    </div>
</div>
</div> 
@endsection    