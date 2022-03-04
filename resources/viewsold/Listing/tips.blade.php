@extends('layouts.master') 
<link href="/css/one-page-wonder.min.css" rel="stylesheet">
<!-- Just Boardrooms Tip! -->

<!-- <div class="col-12 d-flex justify-content-end">
    <svg class="tip-close bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg>
</div> -->
<div class="ml-2 tip-box ml-3">
    <!-- Building Info -->
    <div class="row pl-3 pr-3 tips-content" >
        <div class="col-12 d-flex p-0">
            <div class="col-11">
                <div class="row">
                    <div class="d-flex flex-wrap align-content-center">
                        <div class="tip-box-icon"></div>
                    </div>
                    <div class="d-flex flex-wrap align-content-center ml-3">
                        <span class="tip-box-title">Just Boardrooms tips! </span>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="c-black" data-toggle="collapse" href="#tip-box-building" role="button" aria-expanded="false" aria-controls="tip-box-building">
                    <svg class="tip-col-building bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <svg class="tip-exp-building bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" style="display:none">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="collapse show" id="tip-box-building">
                <div class="mt-2">
                    <p class="sub-title mb-0">Please make sure to give your complete address including the postal code or zip code as this will make
                    it easier for the system to geo locate your physical space and create an online map pin location. If your boardroom
                    is within a larger building with a more familiar name, feel free to include it under the "building name" section.
                    Anything that will make your boardroom more familiar and easier to locate will help in promoting your space.</p>
                </div>
        </div>
    </div>

    <!-- About Your Boardroom -->
    <div class="row pl-3 pr-3 tips-content" >
        <div class="col-12 d-flex p-0">
            <div class="col-11">
                <div class="row">
                    <div class="d-flex flex-wrap align-content-center">
                        <div class="tip-box-icon"></div>
                    </div>
                    <div class="d-flex flex-wrap align-content-center ml-3">
                        <span class="tip-box-title">Just Boardrooms tips! </span>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="c-black" data-toggle="collapse" href="#tip-box-about" role="button" aria-expanded="false" aria-controls="tip-box-about">
                    <svg class="tip-col-about bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <svg class="tip-exp-about bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" style="display:none">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="collapse show" id="tip-box-about">
                <div class="mt-2">
                    <p class="sub-title mb-0">Give your boardroom a name, especially if you’re going to list more than one. Clear,
                    appealing pictures of your boardroom will make a big difference in attracting Guests, and we have tips on how to
                    do that! Want to add a specific amenity? Customize your boardroom’s amenities at the bottom of this page. </p>
                </div>
        </div>
    </div>

    <!-- Photos -->

    <div class="row pl-3 pr-3 tips-content" >
        <div class="col-12 d-flex p-0">
            <div class="col-11">
                <div class="row">
                    <div class="d-flex flex-wrap align-content-center">
                        <div class="tip-box-icon"></div>
                    </div>
                    <div class="d-flex flex-wrap align-content-center ml-3">
                        <span class="tip-box-title">Just Boardrooms tips! </span>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="c-black" data-toggle="collapse" href="#tip-box-photos" role="button" aria-expanded="false" aria-controls="tip-box-photos">
                    <svg class="tip-col-photos bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <svg class="tip-exp-photos bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" style="display:none">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="collapse show" id="tip-box-photos">
            <div class="mt-2">
                <p class="sub-title mb-0">Images: We recommend 3-5 high-quality images of your boardroom(s) from various angles.  </p>
                <br>
                <p class="sub-title mb-0">5 tips for capturing professional images on your smartphone:</p>
                <br>
                <p class="sub-title mb-0"><b>1. Perspective is key.</b> Shoot from the corners to get as wide an angle as possible and make your room feel larger.
                Change height levels and don’t be afraid to experiment with dramatic shots from low and high angles. </p>
                <p class="sub-title mb-0"><b>2. Light it up.</b> Well-lit boardrooms are always in high demand, so capture as much light as possible. Natural light
                is always better than fluorescent, so if your space has windows, make sure to include them in the photos. </p>
                <p class="sub-title mb-0"><b>3. Straight lines.</b> The frame of your photo should run parallel to important vertical and horizontal lines in the shot,
                like windows, desks, and ceiling lines. We recommend horizontal photos. </p>
                <p class="sub-title mb-0"><b>4. Edit like a pro.</b> Take advantage of the edit options on your phone to add a touch of saturation and sharpness, or
                easily lower the warmth on rooms with incandescent light to quickly reduce that ‘orange look.’   </p>
                <p class="sub-title mb-0"><b>5. Tap away dark areas.</b> Shooting against windows can be tough because it makes the whole room look dark. Take care
                of this by tapping your phone on the dark part of the room. This will let the window overexpose and lighten everything up, otherwise the room will be completely black.</p>

                </p>
            </div>
        </div>
    </div>

    <!-- Price & Availability -->
    <div class="row pl-3 pr-3 tips-content" >
        <div class="col-12 d-flex p-0">
            <div class="col-11">
                <div class="row">
                    <div class="d-flex flex-wrap align-content-center">
                        <div class="tip-box-icon"></div>
                    </div>
                    <div class="d-flex flex-wrap align-content-center ml-3">
                        <span class="tip-box-title">Just Boardrooms tips! </span>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="c-black" data-toggle="collapse" href="#tip-box-price" role="button" aria-expanded="false" aria-controls="tip-box-price">
                    <svg class="tip-col-price bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <svg class="tip-exp-price bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" style="display:none">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="collapse show" id="tip-box-price">
                <div class="mt-2">
                    <p class="sub-title mb-3">If you’re unsure about how to price your boardroom, please contact us at: info@justboardrooms.com </p>
                    <p class="sub-title mb-0">As a general guideline, pricing should fall within the ranges below, with location and amenities influencing final rates.   </p>
                    <div class="col-6 p-0 pt-1"><table class="table table-bordered small priceTable">
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
                    </table> </div>
                    <p class="sub-title mb-3">We will review your boardroom pricing during the approval process and if for any reason we believe
                    there may be a more appropriate pricing we’ll contact you to discuss. We encourage you to offer half-day and full-day discounts,
                    as Guests will typically book one of these options to make sure they have enough pre and post meeting time to make the most of
                    their business meetings.   </p>
                    <p class="sub-title mb-0">Click on the Sales Tax options to read our note concerning your decision and responsibilities around collecting – or not collecting - Sales Tax.</p>
                </div>
        </div>
    </div>


    <!-- Hosting Preference -->
    <div class="row pl-3 pr-3 tips-content" >
        <div class="col-12 d-flex p-0">
            <div class="col-11">
                <div class="row">
                    <div class="d-flex flex-wrap align-content-center">
                        <div class="tip-box-icon"></div>
                    </div>
                    <div class="d-flex flex-wrap align-content-center ml-3">
                        <span class="tip-box-title">Just Boardrooms tips! </span>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="c-black" data-toggle="collapse" href="#tip-box-hosting" role="button" aria-expanded="false" aria-controls="tip-box-hosting">
                    <svg class="tip-col-hosting bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <svg class="tip-exp-hosting bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" style="display:none">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="collapse show" id="tip-box-hosting">
            <div class="mt-2">
                <p class="sub-title mb-2">In this section of your boardroom listing setup, feel free to include any special instructions you want to give
                to your potential Guests as it pertains to the booking and use of your boardroom.   </p>

                <p class="sub-title mb-2">Consider whether you require any specific information from your Guest prior to the meeting, such as the number
                of people attending it. Do you want to allow your guests to bring any food or drink into your meeting rooms? Or make it clear that
                they cannot? Are there special instructions on how to enter the building or premises that potential guests need to know? </p>
                <p class="sub-title mb-0">You can add each individual note or preferences one by one by clicking on the ADD button and then
                entering your comments into the open field.</p>

                </p>
            </div>
        </div>


    </div>

     <!-- Request to Book -->
     <div class="row pl-3 pr-3 tips-content" >
        <div class="col-12 d-flex p-0">
            <div class="col-11">
                <div class="row">
                    <div class="d-flex flex-wrap align-content-center">
                        <div class="tip-box-icon"></div>
                    </div>
                    <div class="d-flex flex-wrap align-content-center ml-3">
                        <span class="tip-box-title">Just Boardrooms tips! </span>
                    </div>
                </div>
            </div>
            <div class="justify-content-end">
                <a class="c-black" data-toggle="collapse" href="#tip-box-request" role="button" aria-expanded="false" aria-controls="tip-box-request">
                    <svg class="tip-col-request bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                    <svg class="tip-exp-request bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" style="display:none">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="collapse show" id="tip-box-request">
            <div class="mt-2">
                <p class="sub-title mb-2">With the Request to Book feature, a Guest must first get your approval to book your boardroom. The Guest will go through all the usual scheduling and payment details, but their boardroom booking and payment will not go through until you approve their request.</p>


            </div>
        </div>


    </div>


</div>
