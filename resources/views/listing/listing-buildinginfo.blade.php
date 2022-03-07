@extends('layouts.master') 
@section('content')   
<div class="listing-building-info py-5">
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
						<p>Please make sure to give your complete address including the postal code or zip code as this will make it easier for the system to geo locate your physical space and create an online map pin location. If your boardroom is within a larger building with a more familiar name, feel free to include it under the "building name" section. Anything that will make your boardroom more familiar and easier to locate will help in promoting your space.</p>
					</div>
					<div class="building-info form-grey-box position-relative">
						<form id="frmlistingaddress" autocomplete="none" class="frm-listing-address">
							<p class="step-title"> Building Info</p>
							<div class="alert alert-danger" id="address-error-bag" style="display: none;">
								<ul id="list-address-errors">
								</ul>
							</div>
							<div class="row px-3 mt-4">
								<div class="form-group px-0 mt-1 mb-1"> 
								<label for="list-address" class="requiredstar">What is the address of your building? Make sure the pin in the map below is in the correct location.</label> 
												<input type="text" class="input-bb-orange form-control pac-target-input" id="list-address" value="" placeholder="Enter Address" name="listA" onfocus="geolocate()" list="autocompleteOff" autocomplete="off">
								</div>

								<div class="form-group mt-1 mb-1 addressmap">
									<div id="map" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div style="overflow: hidden;"></div><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" aria-label="Map" aria-roledescription="map" role="group" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"></div></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><span id="372A0220-250C-42E6-99D7-8BF4E24ED73A" style="display: none;">To navigate, press the arrow keys.</span></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div class="gm-style-moc" style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-mot"></p></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div></div></div></div> 
									<script defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&amp;libraries=places&amp;callback=initMap">
									</script>
								</div>

								
								<input id="postalcode" name="postal_code" type="hidden" value="">
								<input id="country" name="country" type="hidden" value="">
								<input id="province" name="province" type="hidden" value="">
					  
								<input id="lat" name="lat" type="hidden" value="">
								<input id="lng" name="lng" type="hidden" value="">
								<input id="list_id" name="=list_id" type="hidden" value="0">
								<div class="form-group px-0 mt-1 mb-1">
									<label for="building-name">Enter your building name</label> <span class="ifaplicable">(If Applicable)</span>
									<input type="text" class="input-bb-gray form-control" id="building-name" placeholder="Enter name" name="buildingName" value="" maxlength="100">
								</div>
								<div class="form-group btn-submit">				
									<button type="submit" class="btn save-btn listaddress-btn-notactive" id="btn-address" disabled="">Save</button>
									<div class="mb-2 mt-2">
										<p class="mb-0 jb-text-color required-field">*Required Field</p>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-3">
					<div class="right-listing position-relative">
						<ul id="progressbar" class="progressbar text-center">
							<li class="step0 active"></li>
							<li class="step0"></li>
							<li class="step0"></li>
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