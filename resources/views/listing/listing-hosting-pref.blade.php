@extends('layouts.master') 
@section('content') 
<div class="listing-hosting-preference py-5">
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
						<p class="sub-title">In this section of your boardroom listing setup, feel free to include any special instructions you want to give
						to your potential Guests as it pertains to the booking and use of your boardroom.   </p>

						<p class="sub-title">Consider whether you require any specific information from your Guest prior to the meeting, such as the number
						of people attending it. Do you want to allow your guests to bring any food or drink into your meeting rooms? Or make it clear that
						they cannot? Are there special instructions on how to enter the building or premises that potential guests need to know? </p>
						<p class="sub-title">You can add each individual note or preferences one by one by clicking on the ADD button and then
						entering your comments into the open field.</p>
						<p></p>
					</div>
					<div class="hosting-preference form-grey-box position-relative">
						<div class="row px-3">
							<p class="step-title px-0">HOSTING PREFERENCE</p>
							<p class="ha-txt-sub-header col-12 p-0"></p>
							<div class="form-group mt-1 mb-4 advance-notice-wrapper col-12 p-0">				
								<div class="notice-wrapper d-flex">
									<div class="step-sub-text bold-text requiredstar me-1 ml-0">How much advance notice do you require for a guest to book your boardroom? </div>
									<div class="hours-select-wrapper">
										<select id="hours-duration" class="hours-duration select-bb-gray ">
											: ?&gt;
											<option value="0">Select</option>
											: ?&gt;
											<option value="1">1</option>
											: ?&gt;
											<option value="2">2</option>
											: ?&gt;
											<option value="3">3</option>
											: ?&gt;
											<option value="4">4</option>
											: ?&gt;
											<option value="5">5</option>
											: ?&gt;
											<option value="6">6</option>
											: ?&gt;
											<option value="7">7</option>
											: ?&gt;
											<option value="8">8</option>
											: ?&gt;
											<option value="9">9</option>
											: ?&gt;
											<option value="10">10</option>
											: ?&gt;
											<option value="11">11</option>
											: ?&gt;
											<option value="12">12</option>
											: ?&gt;
											<option value="13">13</option>
											: ?&gt;
											<option value="14">14</option>
											: ?&gt;
											<option value="15">15</option>
											: ?&gt;
											<option value="16">16</option>
											: ?&gt;
											<option value="17">17</option>
											: ?&gt;
											<option value="18">18</option>
											: ?&gt;
											<option value="19">19</option>
											: ?&gt;
											<option value="20">20</option>
											: ?&gt;
											<option value="21">21</option>
											: ?&gt;
											<option value="22">22</option>
											: ?&gt;
											<option value="23">23</option>
																</select>
										<span>&nbsp;Hour</span>
									</div>
								</div>
							</div>

							<div class="house-rules-wrapper col-12 p-0">
								<div class="step-sub-text">Are there House Rules for your boardroom?</div>
								<div class="house-rules-sub-txt smallp">(Examples: Return furniture to original location or turn off TV when leaving)
								</div>
								<div class="house-rules-input-wrapper">
									<div class="hosting-multi-field-wrapper col-12 p-0">
										<div class="hosting-multi-fields">
												
																			<div class="hosting-multi-field row pl-3 col-12" style="display:none;">
												<textarea class="textarea-b-gray col-11" rows="1" name="rules[]" id="hosting_rules" maxlength="500"></textarea> 
												<svg class="hosting-remove-field bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
												</svg>
												<span class="sub-title smallp" id="hosting_rules_len"> 0 / 500 CHARACTERS MAX</span>

												</div>
												
										</div>
										<button type="button" class="hosting-add-field">Add</button>
									</div>
								</div>
							</div>
							
							<div class="house-instruction-wrapper col-12 p-0 mb-4">
								<div class="step-sub-text requiredstar col-12 p-0">Provide access instructions for your guests when they
									arrive.</div>
								<p class="ha-txt-sub-header col-12 p-0 smallp">The following information will be sent to your Guest upon booking.</p>
								<textarea class="textarea-b-gray form-control py-2 px-3" id="house-instruction-input" rows="4" cols="50" maxlength="500" placeholder="Enter Instructions"></textarea>
									<span class="sub-title smallp" id="house_instruction_len">0 / 500 CHARACTERS MAX</span>
							</div>       
							<div class="form-group btn-submit">				
								<button type="submit" class="btn save-btn listaddress-btn-notactive" id="btn-address"disabled="">Save</button>
								<div class="mb-2 mt-2">
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
							<li class="step0"></li>
							<li class="step0"></li>
							<li class="step0 active"></li>
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