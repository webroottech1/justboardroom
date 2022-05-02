<script type="text/javascript" src="{{ asset('js/priceavailability.js') }}"></script>
{{-- {{dd($listing)}} --}}
<div class="card2 ml-2 price-availability mt-3 listing-price-availability py-5 listingStepp" id="listing-step-4">
    <div class="container">
        <section class="listing-midprt pt-5">
            <div class="row mx-auto">
                <div class="col-md-9">
                    <div class="jbr-tips mb-4">
                        <h4><span class="mr-3 orng-box"><img
                                    src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Just
                            Boardrooms tips!</h4>
                        <p class="sub-title">If you’re unsure about how to price your boardroom, please contact us
                            at: info@justboardrooms.com </p>
                        <p class="sub-title mb-2">As a general guideline, pricing should fall within the ranges below,
                            with location and amenities influencing final rates. </p>
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
                        <p class="sub-title">We will review your boardroom pricing during the approval process and
                            if for any reason we believe
                            there may be a more appropriate pricing we’ll contact you to discuss. We encourage you to
                            offer half-day and full-day discounts,
                            as Guests will typically book one of these options to make sure they have enough pre and
                            post meeting time to make the most of
                            their business meetings. </p>
                        <p class="sub-title">Click on the Sales Tax options to read our note concerning your
                            decision and responsibilities around collecting – or not collecting - Sales Tax.</p>
                    </div>
                    <div class="price-availability form-grey-box position-relative">
                        <p class="step-title">Price &amp; Availability</p>
                        <div class="row mx-0 mt-3">
                            <div class="form-group mt-3 question-wrapper">
                                <div class="hourly-wrapper col-12 p-0">
                                    <div class="hourly-text p-0 bold-text requiredstar">Set the hourly rate for your
                                        boardroom</div>
                                    <div class="hours-select-wrapper d-flex">
                                        <span class="mx-3 me-1">$</span>
                                        <input class="input-bb-gray price" type="number" id="hourly-price-input" min="1"
                                            max="9999" maxlength="4" name="hourly-price-input"
                                            value="{{ isset($listing) ? isset($listing->per_hour_rate)  : '' }}"
                                            placeholder="________">
                                        <div class="hours-select-text px-2">
                                            <span> / Hour </span>
                                        </div>
                                        <div>
                                            <select id="rate-currency" name="rate-currency"
                                                class="form-control form-select rate-currency select-bb-gray">
                                                <option value="">Select Currency</option>
                                                <option
                                                    {{ isset($listing) && isset($listing->currency)  &&  $listing->currency == 'CAD' ? 'selected' : '' }}
                                                    value="CAD">CAD</option>
                                                <option
                                                    {{ isset($listing) && isset($listing->currency) && $listing->currency == 'USD' ? 'selected' : '' }}
                                                    value="USD">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mt-3 mb-4 booking-duration-wrapper">
                                <div class="booking-wrapper">
                                    <div class="booking-duration-text bold-text requiredstar me-3 ml-0">What is the
                                        minimium booking duration? </div>
                                    <div class="booking-input">
                                        <select id="booking-duration" class="booking-duration select-bb-gray ">
                                            <option value="0">Select</option>
                                            @for ($i = 1; $i <= 23; $i++)
                                                <option
                                                    {{ isset($listing) && isset($listing->min_hour)   && $listing->min_hour == $i ? 'selected' : '' }}
                                                    value={{ $i }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <span>&nbsp;Hour</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group my-2 question-wrapper">
                                <div class="txt-switch-wrapper">
                                    <div class="qus-text bold-text requiredstar col-7 p-0">Would you like to offer a
                                        half day discount?</div>
                                    <span class="switch-wrapper">
                                        <div class="switch switch-yellow">
                                            <input type="radio" class="switch-input" name="hourhalfdiscount"
                                                value="hourhalfdiscountyes" id="hourhalfdiscountyes">
                                            <label for="hourhalfdiscountyes"
                                                class="switch-label switch-label-on">YES</label>
                                            <input type="radio" class="switch-input" name="hourhalfdiscount"
                                                value="hourhalfdiscountno" id="hourhalfdiscountno">
                                            <label for="hourhalfdiscountno"
                                                class="switch-label switch-label-off">NO</label>
                                            <!-- <span class="switch-selection"></span> -->
                                        </div>
                                    </span>
                                </div>
                                <div class="m-4">
                                    <mat-form-field class="full-width discount-input">
                                        <span matprefix="">Discount Rate &nbsp;</span>
                                        <input type="number" id="discount-price-input" placeholder="0" value="" max="99"
                                            maxlength="3" class="input-bb-gray">
                                        <mat-icon matsuffix="">&nbsp;%</mat-icon>
                                    </mat-form-field>
                                </div>
                            </div>

                            <div class="form-group my-2 question-wrapper">
                                <div class="txt-switch-wrapper">
                                    <div class="qus-text bold-text requiredstar col-7 p-0">Would you like to offer a
                                        full day booking discount?</div>
                                    <span class="switch-wrapper">
                                        <div class="switch switch-yellow">
                                            <input type="radio" class="switch-input" name="dailybookingdiscount"
                                                value="dailybookingdiscountyes" id="dailybookingdiscountyes">
                                            <label for="dailybookingdiscountyes"
                                                class="switch-label switch-label-off">YES</label>
                                            <input type="radio" class="switch-input" name="dailybookingdiscount"
                                                value="dailybookindiscountno" id="dailybookindiscountno">
                                            <label for="dailybookindiscountno"
                                                class="switch-label switch-label-on">NO</label>
                                            <!-- <span class="switch-selection"></span> -->
                                        </div>
                                    </span>
                                </div>
                                <div class="m-4">
                                    <mat-form-field class="full-width daily-discount-input" style="display: none;">
                                        <span matprefix="">Discount Rate &nbsp;</span>
                                        <input type="number" id="price-input-daily" placeholder="0" value="" max="99"
                                            maxlength="3" class="input-bb-gray">
                                        <mat-icon matsuffix="">&nbsp;%</mat-icon>
                                    </mat-form-field>
                                </div>

                            </div>

                            <div class="form-group my-2 question-wrapper">
                                <div class="txt-switch-wrapper">
                                    <div class="qus-text bold-text requiredstar col-7 p-0">Would you like us to collect
                                        Sales Tax on your booking?</div>
                                    <span class="switch-wrapper">
                                        <div class="switch switch-yellow">
                                            <input type="radio" class="switch-input" name="hst" value="hstyes"
                                                id="hstyes">
                                            <label for="hstyes" class="switch-label switch-label-off">YES</label>
                                            <input type="radio" class="switch-input" name="hst" value="hstno"
                                                id="hstno">
                                            <label for="hstno" class="switch-label switch-label-on">NO</label>
                                            {{-- <span class="switch-selection"></span> --}}
                                        </div>
                                    </span>
                                </div>
                                <div class="m-4">
                                    <mat-form-field class="full-width sales-tax-input" style="display: none;">
                                        <span matprefix="">Sales Tax&nbsp;</span>
                                        <input type="number" id="sales-tax" placeholder="0" value="" max="9999"
                                            maxlength="5" class="input-bb-gray">
                                        <mat-icon matsuffix="">&nbsp;%</mat-icon>
                                        <button type="button" class="addTaxId">Update Tax ID</button>
                                    </mat-form-field>
                                </div>
                            </div>

                            <div class="day-wrapper-text requiredstar">Select the hours that your boardroom is
                                available for booking</div>
                            <div class="days-wrapper mb-5">

                                @foreach ($days as $day_key => $day_val)
                                    <div class="{{ $day_val }}-wrapper day-unique" style="padding: 12px 0px">
                                        <div class="dayname">{{ $day_val }}</div>
                                        <div class="{{ $day_key }}available-wrapper avail-checkbox-wrapper">
                                            <input type="checkbox" id="dayavail_priceavail"
                                                name="{{ $day_key }}avail" class="availcheckbox"
                                                value="{{ $day_key }}available"
                                                @if (isset($day_to[$day_val]) && $day_to[$day_val][0] != 0) checked  @else @endif>
                                            <label for="{{ $day_key }}avail"> Available</label><br>
                                        </div>
                                        <div class="from-to-wrapper">
                                            @php
                                                $dayunavailableclass = $dayavailableclass = '';
                                                $display = '';
                                            @endphp
                                            @if (isset($day_to[$day_val]) && $day_to[$day_val][0] == 0)
                                                @php

                                                   
                                                    $dayunavailableclass = 'showboardroomday';
                                                    $dayavailableclass = 'hideboardroomday';
                                                    $display = 'none';
                                                @endphp
                                            @else
                                                @php
                                                    $dayunavailableclass = 'hideboardroomday';
                                                    $dayavailableclass = 'showboardroomday';
                                                    $display = 'block';
                                                @endphp
                                            @endif


                                            @php
                                                $df = '';
                                                $dt = '';
                                                if (isset($day_from) && isset($day_to)) {
                                                    if (count($day_from) > 0 || count($day_to) > 0) {
                                                        if (!empty($day_from[$day_val]) || !empty($day_to[$day_val])) {
                                                            $df = json_encode($day_from[$day_val], true);
                                                            $dt = json_encode($day_to[$day_val], true);
                                                        }
                                                    }
                                                }

                                            @endphp

                                            <div class="timeContainer-{{ $day_val }}" style="width:80%">
                                                @if (!empty($df) || !empty($dt))
                                                    @foreach (json_decode($df, true) as $k => $v)
                                                        <div class="available-from-to {{ $dayavailableclass }}">
                                                            <div class="ml-2  from-date-wrap" style="width:35%"><select
                                                                    id="{{ $day_val }}-from"
                                                                    class="day-from">

                                                                    @foreach ($clock as $key => $value)
                                                                        @if (isset(json_decode($df, true)[$k]) && (json_decode($df, true)[0] != 0 || json_decode($df, true)[$k] == '00:00'))
                                                                            <option
                                                                                {{ isset($k) && $key == json_decode($df, true)[$k] ? 'selected' : '' }}
                                                                                value={{ $key }}>
                                                                                {{ $value }}</option>
                                                                        @else
                                                                            <option
                                                                                {{ isset($v) && $key == '09:00' ? 'selected' : '' }}
                                                                                value={{ $key }}>
                                                                                {{ $value }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select></div>
                                                            <div class="mx-2  from-to" style="width:10%">
                                                                <span>to</span>
                                                            </div>
                                                            <div class="" style=""><select
                                                                    id="{{ $day_val }}-to" class="day-to">

                                                                    @foreach ($clock as $keys => $values)
                                                                        @if (isset(json_decode($dt, true)[0]) && json_decode($dt, true)[0] != 0)
                                                                            <option
                                                                                {{ isset(json_decode($dt, true)[0]) && $keys == json_decode($dt, true)[$k] ? 'selected' : '' }}
                                                                                value={{ $keys }}>
                                                                                {{ $values }}</option>
                                                                        @else
                                                                            <option
                                                                                {{ isset($values) && $keys == '17:00' ? 'selected' : '' }}
                                                                                values={{ $keys }}>
                                                                                {{ $values }}</option>
                                                                        @endif

                                                                        {{-- <option {{ (isset(json_decode($dt, true)[0]) && $keys == json_decode($dt, true)[0]) ? "selected" : "" }}
                                        value={{$keys}}>{{$values}}</option> --}}
                                                                    @endforeach
                                                                </select></div>
                                                            <div><svg id="removeTime" name="removeTime" width="1.2em"
                                                                    height="1.2em" viewBox="0 0 16 16"
                                                                    class="bi bi-dash-circle" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                                </svg></div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="addTime">
                                                <svg id="addTime" class="{{ $day_val }}"
                                                    style="display:{{ $display }};" width="1.0em" height="1.0em"
                                                    viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </div>
                                            <!-- <a href="#" id="addTime" class="{{ $day_val }}" style="display:{{ $display }}">Add Time</a> -->
                                            <div class="unavailable-from-to {{ $dayunavailableclass }}"> Unavailable
                                            </div>

                                        </div>



                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-3 px-4 form-group btn-submit" style="width: 100%">
                                <button type="submit" id="btn-bd-price" class="btn save-btn"
                                    onclick="event.preventDefault();addPriceInfo();">Save</button>
                            </div>
                            <div class="mb-2 mt-2">
                                <p class="mb-0 jb-text-color required-field">*Required Field</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


