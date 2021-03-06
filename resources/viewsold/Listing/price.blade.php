<div class="card2 ml-2 price-availability mt-3">

    {{-- <div class="alert alert-danger" id="price-error-bag">
        <ul id="price-
        info-errors">
        </ul>
    </div> --}}

    <p class="step-title">Price & Availability</p>
    <div class="row px-3 mt-3">
        <div class="form-group mt-3 question-wrapper">
            <div class="hourly-wrapper col-12 p-0">
                <div class="hourly-text p-0 requiredstar" >Set the hourly rate for your boardroom</div>
                <div class="hours-select-wrapper d-flex">
                    <span class="ml-3">$</span>
                    <input class="input-bb-gray price" type="number" id="hourly-price-input" min="1" max="9999" maxlength="4" name="hourly-price-input"
                    value="{{isset($about->per_hour_rate)?$about->per_hour_rate:""}}">
                    <div class="hours-select-text">
                        <span> / Hour </span>
                    </div>
                    <div>
                        <select id="rate-currency" name="rate-currency" class="form-control rate-currency">
                            <option value="">Select Currency</option>
                            <option value="CAD" {{( (isset($about->currency) && (strtoupper($about->currency) == 'CAD')  ) ? 'selected' : '')}}>CAD</option>
                            <option value="USD" {{( (isset($about->currency) && (strtoupper($about->currency) == 'USD') ) ? 'selected' : '')}}>USD</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="col-4 p-0">
                    <mat-form-field class="full-width hourly-input border-bottom-gray">
                        <span matPrefix>&nbsp;&nbsp;$</span>
                        <input type="number" id="hourly-price-input" placeholder="0" min="0" max="99999999"
                            value="{{isset($about->per_hour_rate)?$about->per_hour_rate:""}}">
                        <span>/hour</span>
                    </mat-form-field>
                </div> -->
            </div>

        </div>
        <div class="form-group mt-3 mb-4 booking-duration-wrapper">
            <div class="booking-wrapper">
                <div class="booking-duration-text requiredstar">What is the minimium booking duration? </div>
                <div class="booking-input">
                    <select id="booking-duration" class="booking-duration">
                        @for($i = 1; $i < 24; $i++): ?>
                        <option
                            {{ (isset($about->min_hour) && $about->min_hour ==  $i) ? "selected=\"selected\"" : "" }}
                            value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <span>&nbsp;&nbsp;&nbsp;hr</span>
                </div>
            </div>

        </div>
        <div class="form-group mt-3 mb-4 question-wrapper">
            <div class="txt-switch-wrapper">
                <div class="qus-text requiredstar col-6 p-0">Would you like to offer a half day discount?</div>
                <span class="switch-wrapper">
                    <div class="switch switch-yellow">
                        <input type="radio" class="switch-input" name="hourhalfdiscount" value="hourhalfdiscountyes"
                            id="hourhalfdiscountyes" @if ( isset($about->half_day_discount) && $about->half_day_discount
                        == true) checked="checked" @endif>
                        <label for="hourhalfdiscountyes" class="switch-label switch-label-off">YES</label>
                        <input type="radio" class="switch-input" name="hourhalfdiscount" value="hourhalfdiscountno"
                            id="hourhalfdiscountno" @if ( isset($about->half_day_discount) && $about->half_day_discount
                        == false) checked="checked" @endif>
                        <label for="hourhalfdiscountno" class="switch-label switch-label-on">NO</label>
                        <span class="switch-selection"></span>
                    </div>
                </span>
            </div>
            <div class="mt-4">
                <mat-form-field class="full-width discount-input">
                    <span matPrefix>Discount Rate &nbsp;</span>
                    <input type="number" id="discount-price-input" placeholder="0"
                        value="{{isset($about->half_discount_rate)?$about->half_discount_rate:""}}"
                        max="99" maxlength="3" >
                    <mat-icon matSuffix>%</mat-icon>
                </mat-form-field>
            </div>

        </div>

        <div class="form-group mt-3 mb-4 question-wrapper">
            <div class="txt-switch-wrapper">
                <div class="qus-text requiredstar col-6 p-0">Would you like to offer a full day booking discount?</div>
                <span class="switch-wrapper">
                    <div class="switch switch-yellow">
                        <input type="radio" class="switch-input" name="dailybookingdiscount"
                            value="dailybookingdiscountyes" id="dailybookingdiscountyes" @if (
                            isset($about->full_day_discount ) && $about->full_day_discount == true) checked="checked"
                        @endif>
                        <label for="dailybookingdiscountyes" class="switch-label switch-label-off">YES</label>
                        <input type="radio" class="switch-input" name="dailybookingdiscount"
                            value="dailybookindiscountno" id="dailybookindiscountno" @if (
                            isset($about->full_day_discount ) && $about->full_day_discount == false) checked="checked"
                        @endif>
                        <label for="dailybookindiscountno" class="switch-label switch-label-on">NO</label>
                        <span class="switch-selection"></span>
                    </div>
                </span>
            </div>
            <div class="mt-4">
                <mat-form-field class="full-width daily-discount-input">
                    <span matPrefix>Discount Rate</span>
                    <input type="number" id="price-input-daily" placeholder="0"
                        value="{{isset($about->full_discount_rate)?$about->full_discount_rate:""}}"
                        max="99" maxlength="3">
                    <mat-icon matSuffix>%</mat-icon>
                </mat-form-field>
            </div>

        </div>

        <div class="form-group mt-3 mb-4 question-wrapper">
            <div class="txt-switch-wrapper">
                <div class="qus-text requiredstar col-6 p-0">Would you like us to collect Sales Tax on your booking?</div>
                <span class="switch-wrapper">
                    <div class="switch switch-yellow">
                        <input type="radio" class="switch-input" name="hst" value="hstyes" id="hstyes" @if (
                            isset($about->hst_check) && $about->hst_check == true) checked="checked" @endif>
                        <label for="hstyes" class="switch-label switch-label-off">YES</label>
                        <input type="radio" class="switch-input" name="hst" value="hstno" id="hstno" @if (
                            isset($about->hst_check) && $about->hst_check == false) checked="checked" @endif>
                        <label for="hstno" class="switch-label switch-label-on">NO</label>
                        <span class="switch-selection"></span>
                    </div>
                </span>
            </div>
            <div class="mt-4">
                <mat-form-field class="full-width sales-tax-input  sales-tax-{{  isset($about->hst_check) ? $about->hst_check : '' }}">
                    <span matPrefix>Sales Tax</span>
                    <input type="number" id="sales-tax" placeholder="0"
                        value="{{isset($about->sales_tax)?$about->sales_tax:''}}"
                        max="9999" maxlength="5">
                    <mat-icon matSuffix>%</mat-icon>
                    <button type="button" class="addTaxId">Update Tax ID</button>
                </mat-form-field>
            </div>
        </div>

        <div class="day-wrapper-text requiredstar">Select the hours that your boardroom is
            available for booking</div>
        <div class="days-wrapper">

            @foreach ($days as $day_key=>$day_val)
            <div class="{{$day_val}}-wrapper day-unique" style="padding: 12px 0px">
                <div class="dayname">{{$day_val}}</div>
                <div class="{{$day_key}}available-wrapper avail-checkbox-wrapper">
                    <input type="checkbox" id="dayavail_priceavail" name="{{$day_key}}avail" class="availcheckbox"
                        value="{{$day_key}}available" @if (isset($day_to[$day_val]) && $day_to[$day_val][0]!=0) checked  @else
                        @endif>
                    <label for="{{$day_key}}avail"> Available</label><br>
                </div>
                <div class="from-to-wrapper">
                    @php
                    $dayunavailableclass = $dayavailableclass = '';
                    $display = '';
                    @endphp
                    @if(isset($day_to[$day_val]) && $day_to[$day_val][0] == 0)
                    @php
                    $dayunavailableclass = 'showboardroomday';
                    $dayavailableclass = 'hideboardroomday';
                    $display = 'none';
                    @endphp

                    @else
                    @php
                    $dayunavailableclass = 'hideboardroomday';
                    $dayavailableclass = 'showboardroomday';
                   //$display = 'block';
                    @endphp
                    @endif


                        @php
                        $df = "";
                        $dt = "";
                            if(count($day_from) > 0 || count($day_to) > 0 ){
                                if(!empty($day_from[$day_val]) || !empty($day_to[$day_val])){
                                    $df = json_encode($day_from[$day_val], true);
                                    $dt = json_encode($day_to[$day_val], true);
                                }
                            }
                        @endphp

                        <div class="timeContainer-{{$day_val}}" style="width:80%">
                        @if (!empty($df) || !empty($dt) )
                            @foreach(json_decode($df, true) as $k=>$v)

                            <div class="available-from-to {{$dayavailableclass}}">
                                <div class="ml-2  from-date-wrap" style="width:35%"><select id="{{$day_val}}-from" class="day-from">

                                    @foreach($clock as $key=>$value)

                                        @if (isset(json_decode($df, true)[$k]) && (json_decode($df, true)[0] != 0 || json_decode($df, true)[$k] == '00:00'))
                                        <option {{ ((isset($k) && $key == json_decode($df, true)[$k]) ? "selected" : "" )}}
                                        value={{$key}}>{{$value}}</option>
                                        @else
                                            <option
                                                {{ (isset($v) && $key == '09:00') ? "selected" : "" }} value={{$key}}>{{$value}}</option>
                                        @endif



                                    @endforeach
                                </select></div>
                                <div class="mx-2  from-to" style="width:10%"> <span>to</span>  </div>
                                <div class="" style=""><select id="{{$day_val}}-to" class="day-to">

                                    @foreach($clock as $keys=>$values)

                                    @if ( (isset(json_decode($dt, true)[0])) && json_decode($dt, true)[0] != 0 )
                                    <option {{ (isset(json_decode($dt, true)[0]) && $keys == json_decode($dt, true)[$k]) ? "selected" : "" }}
                                        value={{$keys}}>{{$values}}</option>
                                    @else
                                        <option
                                            {{ (isset($values) && $keys == '17:00') ? "selected" : "" }} values={{$keys}}>{{$values}}</option>
                                    @endif

                                    {{-- <option {{ (isset(json_decode($dt, true)[0]) && $keys == json_decode($dt, true)[0]) ? "selected" : "" }}
                                        value={{$keys}}>{{$values}}</option> --}}
                                    @endforeach
                                </select></div>
                                <div><svg id="removeTime" name="removeTime" width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg></div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="addTime">
                        <svg id="addTime" class="{{$day_val}}" style="display:{{$display}}" width="1.0em" height="1.0em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        </div>
                        <!-- <a href="#" id="addTime" class="{{$day_val}}" style="display:{{$display}}">Add Time</a> -->
                    <div class="unavailable-from-to {{$dayunavailableclass}}"> Unavailable</div>

                </div>



            </div>
            @endforeach
        </div>

        <div class="mb-2 mt-2">
            <p class="mb-0 jb-text-color required-field">*Required Field</p>
        </div>
       <!--<div class="next-button text-center mt-3 ml-2"> <span class="fa fa-arrow-right" id="btn-bd-price"
                onclick="event.preventDefault();addPriceInfo();">Save</span> </div>-->
        <br>
        <div class="mb-3" style="width: 100%">
            <button type="submit" id="btn-bd-price" class="btn btn-primary" onclick="event.preventDefault();">Save</button>

        </div>
    </div>

</div>
