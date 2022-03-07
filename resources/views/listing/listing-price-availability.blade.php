@extends('layouts.master') 
@section('content') 
<div class="listing-price-availability py-5">
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
						<p class="sub-title">If you’re unsure about how to price your boardroom, please contact us at: info@justboardrooms.com </p>
						<p class="sub-title mb-2">As a general guideline, pricing should fall within the ranges below, with location and amenities influencing final rates.   </p>
						<div class="col-6 p-0 pt-1">
							<table class="table small priceTable">
								<thead style="background-color: lightgray;">
									<tr>
										<td>Number of Guests</td>
										<td>Price Range Per Hour</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2-6</td>
										<td>$25 - $55</td>
									</tr>
									<tr>
										<td>7-12</td>
										<td>$55 - $90+</td>
									</tr>
								</tbody>
							</table> 
						</div>
						<p class="sub-title">We will review your boardroom pricing during the approval process and if for any reason we believe
						there may be a more appropriate pricing we’ll contact you to discuss. We encourage you to offer half-day and full-day discounts,
						as Guests will typically book one of these options to make sure they have enough pre and post meeting time to make the most of
						their business meetings.   </p>
						<p class="sub-title">Click on the Sales Tax options to read our note concerning your decision and responsibilities around collecting – or not collecting - Sales Tax.</p>
					</div>
					<div class="price-availability form-grey-box position-relative">
						<p class="step-title">Price &amp; Availability</p>
						<div class="row mx-0 mt-3">
							<div class="form-group mt-3 question-wrapper">
								<div class="hourly-wrapper col-12 p-0">
									<div class="hourly-text p-0 bold-text requiredstar">Set the hourly rate for your boardroom</div>
									<div class="hours-select-wrapper d-flex">
										<span class="mx-3 me-1">$</span>
										<input class="input-bb-gray price" type="number" id="hourly-price-input" min="1" max="9999" maxlength="4" name="hourly-price-input" value="" placeholder="________">
										<div class="hours-select-text px-2">
											<span> / Hour </span>
										</div>
										<div>
											<select id="rate-currency" name="rate-currency" class="form-control form-select rate-currency select-bb-gray">
												<option value="">Select Currency</option>
												<option value="CAD">CAD</option>
												<option value="USD">USD</option>
											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="form-group mt-3 mb-4 booking-duration-wrapper">
								<div class="booking-wrapper">
									<div class="booking-duration-text bold-text requiredstar me-3 ml-0">What is the minimium booking duration? </div>
									<div class="booking-input">
										<select id="booking-duration" class="booking-duration select-bb-gray ">
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
							<div class="form-group my-2 question-wrapper">
								<div class="txt-switch-wrapper">
									<div class="qus-text bold-text requiredstar col-7 p-0">Would you like to offer a half day discount?</div>
									<span class="switch-wrapper">
										<div class="switch switch-yellow">
											<!-- <input type="radio" class="switch-input" name="hourhalfdiscount" value="hourhalfdiscountyes" id="hourhalfdiscountyes"> -->
											<label for="hourhalfdiscountyes" class="switch-label switch-label-on">YES</label>
											<!-- <input type="radio" class="switch-input" name="hourhalfdiscount" value="hourhalfdiscountno" id="hourhalfdiscountno"> -->
											<label for="hourhalfdiscountno" class="switch-label switch-label-off">NO</label>
											<!-- <span class="switch-selection"></span> -->
										</div>
									</span>
								</div>
								<div class="m-4">
									<mat-form-field class="full-width discount-input">
										<span matprefix="">Discount Rate &nbsp;</span>
										<input type="number" id="discount-price-input" placeholder="0" value="" max="99" maxlength="3" class="input-bb-gray">
										<mat-icon matsuffix="">&nbsp;%</mat-icon>
									</mat-form-field>
								</div>
							</div>

							<div class="form-group my-2 question-wrapper">
								<div class="txt-switch-wrapper">
									<div class="qus-text bold-text requiredstar col-7 p-0">Would you like to offer a full day booking discount?</div>
									<span class="switch-wrapper">
										<div class="switch switch-yellow">
											<!-- <input type="radio" class="switch-input" name="dailybookingdiscount" value="dailybookingdiscountyes" id="dailybookingdiscountyes"> -->
											<label for="dailybookingdiscountyes" class="switch-label switch-label-off">YES</label>
											<!-- <input type="radio" class="switch-input" name="dailybookingdiscount" value="dailybookindiscountno" id="dailybookindiscountno"> -->
											<label for="dailybookindiscountno" class="switch-label switch-label-on">NO</label>
											<!-- <span class="switch-selection"></span> -->
										</div>
									</span>
								</div>
								<div class="m-4">
									<mat-form-field class="full-width daily-discount-input" style="display: none;">
										<span matprefix="">Discount Rate &nbsp;</span>
										<input type="number" id="price-input-daily" placeholder="0" value="" max="99" maxlength="3" class="input-bb-gray">
										<mat-icon matsuffix="">&nbsp;%</mat-icon>
									</mat-form-field>
								</div>

							</div>

							<div class="form-group my-2 question-wrapper">
								<div class="txt-switch-wrapper">
									<div class="qus-text bold-text requiredstar col-7 p-0">Would you like us to collect Sales Tax on your booking?</div>
									<span class="switch-wrapper">
										<div class="switch switch-yellow">
											<!-- <input type="radio" class="switch-input" name="hst" value="hstyes" id="hstyes"> -->
											<label for="hstyes" class="switch-label switch-label-off">YES</label>
											<!-- <input type="radio" class="switch-input" name="hst" value="hstno" id="hstno"> -->
											<label for="hstno" class="switch-label switch-label-on">NO</label>
											<!-- <span class="switch-selection"></span>  -->
										</div>
									</span>
								</div>
								<div class="m-4">
									<mat-form-field class="full-width sales-tax-input" style="display: none;">
										<span matprefix="">Sales Tax&nbsp;</span>
										<input type="number" id="sales-tax" placeholder="0" value="" max="9999" maxlength="5" class="input-bb-gray">
										<mat-icon matsuffix="">&nbsp;%</mat-icon>
										<button type="button" class="addTaxId">Update Tax ID</button>
									</mat-form-field>
								</div>
							</div>

							<div class="day-wrapper-text requiredstar">Select the hours that your boardroom is
								available for booking</div>
							<div class="days-wrapper mb-5">

											<div class="Monday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Monday</div>
									<div class="monavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" name="monavail" class="availcheckbox form-check-input" value="monavailable" id="flexCheckChecked" checked>
										<label for="monavail"> Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									
										
											<div class="timeContainer-Monday" style="width:75%">
																	<div class="available-from-to showboardroomday">    <div class="ml-2" style="width:37%;"><select id="Monday-from" class="day-from" value="09:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00" selected="selected">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select></div>   <div class="mx-2" style="width:6%;"> <span>to</span> </div>    <div class=""><select id="Monday-to" class="day-to" value="17:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00" selected="selected">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select> </div></div></div>
											
											<div class="input-group plus-minus">
												<div class="input-group-prepend addTime">
													<button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
												</div>
												<div class="input-group-prepend removeTime">
													<button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
												</div>																		
											</div>
											<!-- <a href="#" id="addTime" class="Monday" style="display:">Add Time</a> -->
										<div class="unavailable-from-to hideboardroomday"> Unavailable</div>

									</div>



								</div>
											<div class="Tuesday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Tuesday</div>
									<div class="tueavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" name="monavail" class="availcheckbox form-check-input" value="monavailable" id="flexCheckChecked" checked>
										<label for="tueavail">Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									

											
											<div class="timeContainer-Tuesday" style="width:75%">
																	<div class="available-from-to showboardroomday">    <div class="ml-2" style="width:37%;"><select id="Tuesday-from" class="day-from" value="09:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00" selected="selected">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select></div>   <div class="mx-2" style="width:6%;"> <span>to</span> </div>    <div class=""><select id="Tuesday-to" class="day-to" value="17:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00" selected="selected">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select> </div><div></div></div></div>
											<div class="input-group plus-minus">
												<div class="input-group-prepend addTime">
													<button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
												</div>
												<div class="input-group-prepend removeTime">
													<button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
												</div>																		
											</div>
											<!-- <a href="#" id="addTime" class="Tuesday" style="display:">Add Time</a> -->
										<div class="unavailable-from-to hideboardroomday"> Unavailable</div>

									</div>



								</div>
											<div class="Wednesday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Wednesday</div>
									<div class="wedavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" name="monavail" class="availcheckbox form-check-input" value="monavailable" id="flexCheckChecked" checked>
										<label for="wedavail"> Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									

											
											<div class="timeContainer-Wednesday" style="width:75%">
																	<div class="available-from-to showboardroomday">    <div class="ml-2" style="width:37%;"><select id="Wednesday-from" class="day-from" value="09:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00" selected="selected">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select></div>   <div class="mx-2" style="width:6%;"> <span>to</span> </div>    <div class=""><select id="Wednesday-to" class="day-to" value="17:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00" selected="selected">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select> </div></div></div>
											<div class="input-group plus-minus">
												<div class="input-group-prepend addTime">
													<button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
												</div>
												<div class="input-group-prepend removeTime">
													<button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
												</div>																		
											</div>
											<!-- <a href="#" id="addTime" class="Wednesday" style="display:">Add Time</a> -->
										<div class="unavailable-from-to hideboardroomday"> Unavailable</div>

									</div>



								</div>
											<div class="Thursday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Thursday</div>
									<div class="thuavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" name="monavail" class="availcheckbox form-check-input" value="monavailable" id="flexCheckChecked" checked>
										<label for="thuavail"> Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									

											
											<div class="timeContainer-Thursday" style="width:75%">
																	<div class="available-from-to showboardroomday">    <div class="ml-2" style="width:37%;"><select id="Thursday-from" class="day-from" value="09:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00" selected="selected">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select></div>   <div class="mx-2" style="width:6%;"> <span>to</span> </div>    <div class=""><select id="Thursday-to" class="day-to" value="17:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00" selected="selected">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select> </div></div></div>
											<div class="input-group plus-minus">
												<div class="input-group-prepend addTime">
													<button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
												</div>
												<div class="input-group-prepend removeTime">
													<button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
												</div>																		
											</div>
											<!-- <a href="#" id="addTime" class="Thursday" style="display:">Add Time</a> -->
										<div class="unavailable-from-to hideboardroomday"> Unavailable</div>

									</div>



								</div>
											<div class="Friday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Friday</div>
									<div class="friavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" name="monavail" class="availcheckbox form-check-input" value="monavailable" id="flexCheckChecked" checked>
										<label for="friavail"> Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									

											
											<div class="timeContainer-Friday" style="width:75%">
																	<div class="available-from-to showboardroomday">    <div class="ml-2" style="width:37%;"><select id="Friday-from" class="day-from" value="09:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00" selected="selected">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select></div>   <div class="mx-2" style="width:6%;"> <span>to</span> </div>    <div class=""><select id="Friday-to" class="day-to" value="17:00">       <option value="00:00">12.00 AM</option>       <option value="01:00">01.00 AM</option>       <option value="02:00">02.00 AM</option>       <option value="03:00">03.00 AM</option>       <option value="04:00">04.00 AM</option>       <option value="05:00">05.00 AM</option>       <option value="06:00">06.00 AM</option>       <option value="07:00">07.00 AM</option>       <option value="08:00">08.00 AM</option>       <option value="09:00">09.00 AM</option>       <option value="10:00">10.00 AM</option>       <option value="11:00">11.00 AM</option>       <option value="12:00">12.00 PM</option>       <option value="13:00">01.00 PM</option>       <option value="14:00">02.00 PM</option>       <option value="15:00">03.00 PM</option>       <option value="16:00">04.00 PM</option>       <option value="17:00" selected="selected">05.00 PM</option>       <option value="18:00">06.00 PM</option>       <option value="19:00">07.00 PM</option>       <option value="20:00">08.00 PM</option>       <option value="21:00">09.00 PM</option>       <option value="22:00">10.00 PM</option>       <option value="23:00">11.00 PM</option>   </select> </div></div></div>
											<div class="input-group plus-minus">
												<div class="input-group-prepend addTime">
													<button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
												</div>
												<div class="input-group-prepend removeTime">
													<button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
												</div>																		
											</div>
											<!-- <a href="#" id="addTime" class="Friday" style="display:">Add Time</a> -->
										<div class="unavailable-from-to hideboardroomday" style="display: none;"> Unavailable</div>

									</div>



								</div>
											<div class="Saturday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Saturday</div>
									<div class="satavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" id="dayavail_priceavail" name="satavail" class="form-check-input availcheckbox" value="satavailable" >
										<label for="satavail"> Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									
											<input class="form-control ssunavailable" type="text" placeholder="Unavailable" aria-label="Unavailable">
											
											<!-- <div class="timeContainer-Saturday" style="width:75%"> -->
																	<!-- </div> -->
											<!-- <div class="addTime"> -->
											<!-- <svg id="addTime" class="Saturday" style="display: none;" width="1.0em" height="1.0em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> -->
												<!-- <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path> -->
												<!-- <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path> -->
											<!-- </svg> -->
											<!-- </div> -->
											<!-- <a href="#" id="addTime" class="Saturday" style="display:">Add Time</a> -->
										<!-- <div class="unavailable-from-to showboardroomday" style="display: block;"> Unavailable</div> -->

									</div>



								</div>
											<div class="Sunday-wrapper day-unique" style="padding: 7px 0px">
									<div class="dayname">Sunday</div>
									<div class="sunavailable-wrapper avail-checkbox-wrapper">
										<input type="checkbox" id="dayavail_priceavail" name="sunavail" class="form-check-input availcheckbox" value="sunavailable">
										<label for="sunavail"> Available</label><br>
									</div>
									<div class="from-to-wrapper">
																									
											<input class="form-control ssunavailable" type="text" placeholder="Unavailable" aria-label="Unavailable">
											
											<!-- <div class="timeContainer-Saturday" style="width:75%"> -->
																	<!-- </div> -->
											<!-- <div class="addTime"> -->
											<!-- <svg id="addTime" class="Saturday" style="display: none;" width="1.0em" height="1.0em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> -->
												<!-- <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path> -->
												<!-- <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path> -->
											<!-- </svg> -->
											<!-- </div> -->
											<!-- <a href="#" id="addTime" class="Saturday" style="display:">Add Time</a> -->
										<!-- <div class="unavailable-from-to showboardroomday" style="display: block;"> Unavailable</div> -->

									</div>

								</div>
							</div>

							<div class="mb-3 px-4 form-group btn-submit" style="width: 100%">
								<button type="submit" id="btn-bd-price" class="btn save-btn" onclick="event.preventDefault();">Save</button>					
							</div>
							<div class="mb-2 mt-2">
								<p class="mb-0 jb-text-color required-field">*Required Field</p>
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
							<li class="step0 active"></li>
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