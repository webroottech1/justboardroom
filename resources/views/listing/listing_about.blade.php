@extends('layouts.master') 
@section('content') 
<div class="listing-about-br py-5">
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
					<div class="about-your-br form-grey-box position-relative">
						<form id="frmlistinginfo" class="frm-listing-info">
							<p class="step-title">Add Your Boardroom</p>
							<div class="row px-3 mt-3">
								<div class="form-group col-sm-12 col-md-12 col-lg-6 p-1">
									<label for="bd-name" class="requiredstar">Give your Boardroom a Name</label>
									<input type="text" class="input-bb-orange form-control" value="" id="bd-name" placeholder="Enter Name" name="bdname" />
								</div>
								<div class="form-group col-sm-12 col-md-12 col-lg-6 p-1">
									<label for="bd-capacity" class="requiredstar">What is the Capacity?</label>
									<select class="form-control form-select select-bb-gray" id="bd-capacity">
										<option value="">Select</option>
										<option value="1">&lt;5</option>
										<option value="2">5-10</option>
										<option value="3">11-20</option>
										<option value="4">&gt;20</option>
									</select>
								</div>
								<div class="form-group col-12 p-0">
									<label for="bd-desc" class="requiredstar">Tell us About your boardroom</label>
									<textarea
										class="textarea-b-gray form-control rounded-0"
										id="bd-desc"
										rows="6"
										maxlength="500"
										name="bd-desc"
										placeholder="For example: Enjoy your next brainstorm session or business meeting in this spacious boardroom featuring a gorgeous reclaimed wood table and 6 comfortable chairs. With plenty of natural light, this boardroom is ideal for adding creativity and inspiration to your next meeting. We???re located in The Beach close to coffee shops and great takeout, and are easily accessed by public transit with plenty of free on-street parking."
									></textarea>
									<span class="sub-title" id="bd_desc_len">0 / 500 CHARACTERS MAX</span>
								</div>

								<div class="anmt-ofr px-0">
									<label for="bd-amenities">What amenities do you offer?</label>
								</div>

								<div class="col-12 p-0">
									<p class="gray mb-1"> > Building</p>
									<div class="col-12 row">
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="building-check" id="bd-2" value="2" />
												<label class="custom-control-label" for="bd-2">Air Conditioning</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="building-check" id="bd-4" value="4" />
												<label class="custom-control-label" for="bd-4">Parking</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="building-check" id="bd-5" value="5" />
												<label class="custom-control-label" for="bd-5">Reception</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="building-check" id="bd-8" value="8" />
												<label class="custom-control-label" for="bd-8">Washroom</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 p-0">
									<p class="gray mb-1"> > Boardroom</p>
									<div class="col-12 row">
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="boardroom-check" id="board-1" value="1" />
												<label class="custom-control-label" for="board-1">Accessibility Friendly</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="boardroom-check" id="board-3" value="3" />
												<label class="custom-control-label" for="board-3">Breakout Space</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="boardroom-check" id="board-9" value="9" />
												<label class="custom-control-label" for="board-9">Whiteboard</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="boardroom-check" id="board-12" value="12" />
												<label class="custom-control-label" for="board-12">Water</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="boardroom-check" id="board-13" value="13" />
												<label class="custom-control-label" for="board-13">Tea / Coffee</label>
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 p-0">
									<p class="gray mb-1"> > Technology &amp; Communication</p>
									<div class="col-12 row">
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="tech-check" id="tech-6" value="6" />
												<label class="custom-control-label" for="tech-6">Teleconference</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="tech-check" id="tech-7" value="7" />
												<label class="custom-control-label" for="tech-7">Flatscreen TV</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="tech-check" id="tech-10" value="10" />
												<label class="custom-control-label" for="tech-10">Wi-Fi</label>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="form-check-input custom-control-input" name="tech-check" id="tech-11" value="11" />
												<label class="custom-control-label" for="tech-11">Projector</label>
											</div>
										</div>
									</div>
								</div>

								<label class="mt-3 mb-1">Are there other amenities or features that you would like to highlight?</label>
								<p class="sub-title mb-1">(Examples: Accessible by public transportation or food options nearby)</p>

								<div class="multi-field-wrapper form-group mt-2 col-12 p-0">
									<div class="multi-fields">
										<div class="multi-field row ml-2" style="display: none;">
											<textarea class="textarea-bb-gray col-11" rows="1" name="stuff[]" id="user_amen" maxlength="500"></textarea>
											<svg class="remove-field col-1 bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
												<path
													fill-rule="evenodd"
													d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
												></path>
											</svg>
											<span class="sub-title" id="user_amen_len"> 0 / 500 CHARACTERS MAX</span>
										</div>
									</div>
									<button type="button" class="add-field">Add</button>
								</div>

								<div class="form-group">
									<button onclick="event.preventDefault();" type="submit" class="btn save-btn" id="btn-bd-info">Save</button>
								</div>
								
								<div class="col-12 p-0 mb-2">
									<p class="mb-0 jb-text-color required-field">* Required fields</p>
								</div>

							</div>
						</form>
					</div>
				</div>
				<div class="col-md-3">
					<div class="right-listing position-relative">
						<ul id="progressbar" class="progressbar text-center">
							<li class="step0"></li>
							<li class="step0 active"></li>
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