@extends('layouts.master') 
@section('content') 
<div class="listing-photos py-5">
	<div class="container">
		<section class="listing-pg-title">
			<h2 class="title">List your boardroom <span>w</span>ith us</h2>
			<p class="sub-title">Start earning extra income <span>w</span>ith your boardroom</p>
		</section>
		<section class="listing-midprt pt-5"> 
			<div class="row mx-auto">
				<div class="col-md-9">
					<div class="jbr-tips mb-4">
						<h4><span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Just Boardrooms tips!</h4>
						<p class="sub-title">Images: We recommend 3-5 high-quality images of your boardroom(s) from various angles.  </p>
						<br>
						<p class="sub-title  mb-0">5 tips for capturing professional images on your smartphone:</p>
						<br>
						<p class="sub-title"><b>1. Perspective is key.</b> Shoot from the corners to get as wide an angle as possible and make your room feel larger.
						Change height levels and don’t be afraid to experiment with dramatic shots from low and high angles. </p>
						<p class="sub-title"><b>2. Light it up.</b> Well-lit boardrooms are always in high demand, so capture as much light as possible. Natural light
						is always better than fluorescent, so if your space has windows, make sure to include them in the photos. </p>
						<p class="sub-title"><b>3. Straight lines.</b> The frame of your photo should run parallel to important vertical and horizontal lines in the shot,
						like windows, desks, and ceiling lines. We recommend horizontal photos. </p>
						<p class="sub-title"><b>4. Edit like a pro.</b> Take advantage of the edit options on your phone to add a touch of saturation and sharpness, or
						easily lower the warmth on rooms with incandescent light to quickly reduce that ‘orange look.’   </p>
						<p class="sub-title"><b>5. Tap away dark areas.</b> Shooting against windows can be tough because it makes the whole room look dark. Take care
						of this by tapping your phone on the dark part of the room. This will let the window overexpose and lighten everything up, otherwise the room will be completely black.</p>
						<p></p>
					</div>
					<div class="photoslisting form-grey-box position-relative">
						<div class="alert alert-danger mt-3" id="photo-error-bag" style="display: none;">
							<ul id="list-photo-errors">
							</ul>
						</div>
						<div class="row px-3">
							<div class="col-12 px-0"><p class="step-title">PHOTOS</p></div>
							<div class="col-12 px-0"><p class="mt-4 requiredstar photos-desc">What does your boardroom look like? Share up to 5 photos</p></div>
							<div class="col-12 px-0"><p class="photos-sub-desc">Be sure to include photos from different angles to show all sides of the room. 
								Each photo must be at least 300 pixels wide or tall, in jpg or png format.</p>
							</div>
							<div class="col-12 px-0"><p class="photos-sub-desc">To add additional pictures, please select the box below.</p>
							</div>
							<div class="col-12">
								<div class="mb-4 dropzone dz-clickable ui-sortable" id="myDrop">
									<div class="dz-default dz-message" data-dz-message="">
										<span class="photos-drag-desc">Drag Images Here<br>OR<br></span><button class="photos-select-image">SELECT IMAGE</button>
									</div>
								</div>
								<input type="button" id="add_file" value="Save" class="btn save-btn mt-3">
								<div class="mb-4">
									<input id="listing_id" name="listing_id" type="hidden" value="351">
								</div>
								<div>
									<p class="mb-0 jb-text-color required-field">*Required Field</p>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="right-listing position-relative">
						<ul id="progressbar" class="progressbar text-center">
							<li class="step0"></li>
							<li class="step0"></li>
							<li class="step0 active"></li>
							<li class="step0"></li>
							<li class="step0"></li>
							<li class="step0"></li>
						</ul>
						<h6 class="mb-5 side-graph-step">Building Info</h6>
						<h6 class="mb-5 side-graph-step">About Your Boardroom</h6>
						<h6 class="mb-5 side-graph-step">Photos</h6>
						<h6 class="mb-5 side-graph-step">Price &amp; Availability</h6>
						<h6 class="mb-5 side-graph-step">Hosting Preference</h6>
						<h6 class="mb-5 side-graph-step">Approval Settings</h6>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>  
@endsection