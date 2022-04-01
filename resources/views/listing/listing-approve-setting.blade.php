<script type="text/javascript" src="{{ asset('js/request.js') }}"></script>

<div class="card2 ml-2 requestlisting listing-approval-setting py-5 listingStepp" id="listing-step-6">
	<div class="container">
		<section class="listing-midprt pt-5">
			<div class="row mx-auto">
				<div class="col-md-9">
					<div class="jbr-tips mb-4">
						<h4><span class="mr-3 orng-box"><img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Just Boardrooms tips!</h4>
						<p class="sub-title mb-2">With the Request to Book feature, a Guest must first get your approval to book your boardroom. The Guest will go through all the usual scheduling and payment details, but their boardroom booking and payment will not go through until you approve their request.</p>
						<p></p>
					</div>
					<div class="approval-setting form-grey-box position-relative">
							<div class="step-title">APPROVAL SETTING</div>
							<div class="step-sub-text requiredstar bold-text my-4">Use Request to Book feature for this boardroom listing?</div>

							<div class="chkbox-wrapper mb-4">
								<div class="box box-1 d-flex">
									<div class="bx">
										<input type="radio" {{(isset($listing) && $listing->listing_type == 1) ? 'checked':''}} id="approval-yes" name="approval-yes" class="form-check-input"/>
										<label for="approval-yes">Yes</label>
									</div>

									<div class="txt">
										You will get a notification when a Guest has requested to book your boardroom. You must reply within 24 hours to the request. Otherwise the booking request will automatically be cancelled.
									</div>
								</div>
								<div class="box box-2 d-flex">
									<div class="bx">
										<input type="radio" {{(isset($listing) && $listing->listing_type == 0) ? 'checked':''}} id="approval-no" name="approval-yes" class="form-check-input"/>
										<label for="approval-no">No</label>
									</div>

									<div class="txt">
										A Guest does not require your approval to book your boardroom and their transaction will go through automatically. You will get a notification once the booking has been processed.
									</div>
								</div>
							</div>
							<div class="listing-instruction" id="listing-cancellation-policy"><a href="#">Listing Cancellation Policy</a></div>
							<div class="mb-2 mt-2">
								<p class="mb-0 jb-text-color required-field">*Required Field</p>
							</div>
							<div class="mb-3" style="width: 100%">
								<button type="submit" id="btn-bd-request" class="btn save-btn submit" onclick="event.preventDefault();">SAVE &amp; SUBMIT FOR REVIEW</button>
							</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
