<div class="card2 ml-2 content-form boardroominfo">
    <div class="alert alert-danger mt-3" id="info-error-bag">
        <ul id="list-info-errors">
        </ul>
    </div>
    <form id="frmlistinginfo">
        <p class="step-title">ABOUT YOUR BOARDROOM</p>
        <div class="row px-3 mt-3">
            
            <div class="form-group col-sm-12 col-md-12 col-lg-7 p-1">
                <label for="bd-name" class="requiredstar">Give your boardroom a name</label>
                <input type="text" class="input-bb-orange form-control"
                    value="{{isset($about->name)?$about->name:""}}" id="bd-name"
                    placeholder="Enter name" name="bdname">
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-5 p-1" >
                <label for="bd-capacity" class="requiredstar">What is the capacity?</label>
                <select class="form-control select-bb-gray" id="bd-capacity">
                    <option value="">Select</option>
                    @foreach ($capacity as $k=>$val)
                    <option
                        {{ (isset($about->capacity_id) && $about->capacity_id ==  $k) ? "selected=\"selected\"" : "" }}
                        value="{{ $k }}">{{ $val}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 p-0">
                <label for="bd-desc" class="requiredstar">Tell us about your boardroom</label>
                <textarea class="textarea-b-gray form-control rounded-0" id="bd-desc" rows="6" maxlength="500"
                    name=bd-desc placeholder="For example: Enjoy your next brainstorm session or business meeting in this spacious boardroom featuring a gorgeous reclaimed wood table and 6 comfortable chairs. With plenty of natural light, this boardroom is ideal for adding creativity and inspiration to your next meeting. We’re located in The Beach close to coffee shops and great takeout, and are easily accessed by public transit with plenty of free on-street parking.">{{isset($about->description )?$about->description:""}}</textarea>
                    <span class="sub-title" id="bd_desc_len"> 0 / 500 CHARACTERS MAX</span>
            </div>

            <div>
                <label for="bd-amenities">What amenities do you offer?</label>
            </div>

            <!-- Default inline 1-->
            <div class="col-12 p-0">
                <p class="gray mb-1">Building</p>
                <div class="col-12 row">
                    @foreach ($amenities_building as $k=>$val)
                    <div class="col-6 p-0">
                        <div
                            class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input"
                                name="building-check" @if ( isset($amenities) &&
                                in_array($k, $amenities)) checked="checked" @endif
                                id="bd-{{$k}}" value={{$k}}>
                            <label class="custom-control-label"
                                for="bd-{{$k}}">{{$val}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 p-0">
                <p class="gray mb-1">Boardroom</p>
                <div class="col-12 row">
                    @foreach ($amenities_boardroom as $k=>$val)
                    <div class="col-6 p-0">
                        <div
                            class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input"
                                name="boardroom-check" @if ( isset($amenities) &&
                                in_array($k, $amenities)) checked="checked" @endif
                                id="board-{{$k}}" value={{$k}}>
                            <label class="custom-control-label"
                                for="board-{{$k}}">{{$val}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 p-0">
                <p class="gray mb-1">Technology & Communication</p>
                <div class="col-12 row">
                    @foreach ($amenities_tech as $k=>$val)
                    <div class="col-6 p-0">
                        <div
                            class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input"
                                name="tech-check" @if ( isset($amenities) &&
                                in_array($k, $amenities)) checked="checked" @endif
                                id="tech-{{$k}}" value={{$k}}>
                            <label class="custom-control-label"
                                for="tech-{{$k}}">{{$val}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <label class="mt-3">Are there other amenities or features that you would like to highlight?</label>
            <p class="sub-title mb-1">(Examples: Accessible by public transportation or food options nearby)</p>
                    
            <div class="multi-field-wrapper form-group mt-2 col-12 p-0">
                <div class="multi-fields">
                        @php $max = 500;  @endphp
                        @if(isset($user_amen) && count($user_amen) > 0)
                            @foreach($user_amen as $amen)
                            <div class="multi-field row ml-2" >
                                @php 
                                    $valcount = strlen($amen);
                                    $remCount = $max - $valcount ;
                                @endphp

                                <textarea class="textarea-bb-gray col-11" rows="1" name="stuff[]" id="user_amen"  maxLength="{{$max}}">{{$amen}}</textarea>
                                <svg class="remove-field col-1 bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <span class="sub-title" id="user_amen_len"> 0 / {{ $max }} CHARACTERS MAX</span>
                                
                            </div>
                            @endforeach
                        @else
                        <div class="multi-field row ml-2" style="display:none;">
                            <textarea class="textarea-bb-gray col-11" rows="1" name="stuff[]" id="user_amen"  maxLength="{{$max}}"></textarea>
                            <svg class="remove-field col-1 bi-type-bold" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            <span class="sub-title" id="user_amen_len"> 0 / {{ $max }} CHARACTERS MAX</span>
    
                        </div>
                        @endif

                </div>
                <button type="button" class="add-field">Add</button>
            </div>

            <div class="col-12 p-0 mb-2">
                <p class="mb-0 jb-text-color required-field">*Required Field</p>
            </div>

            <div class="form-group">
                <button onclick="event.preventDefault();"
                    type="submit" class="btn btn-primary"
                    id="btn-bd-info">Save</button>
            </div>
        </div>
    </form>
</div>