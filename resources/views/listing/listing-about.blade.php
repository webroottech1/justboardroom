{{-- {{dd($listing)}} --}}
<div class="card2 ml-2 content-form boardroominfo listingStepp" id="listing-step-2">
    <div class="jbr-tips mb-4" >
        <h4><span class="mr-3 orng-box"><img
                    src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png"></span>Just
            Boardrooms tips!</h4>
        <p>Please make sure to give your complete address including the postal code or zip code as this will make it
            easier for the system to geo locate your physical space and create an online map pin location. If your
            boardroom is within a larger building with a more familiar name, feel free to include it under the "building
            name" section. Anything that will make your boardroom more familiar and easier to locate will help in
            promoting your space.</p>
    </div>
    <div class="about-your-br form-grey-box position-relative">
        <form id="frmlistinginfo" class="frm-listing-info">
            <p class="step-title">Add Your Boardroom</p>
            <div class="row px-3 mt-3">
                <div class="form-group col-sm-12 col-md-12 col-lg-6 p-1">
                    <label for="bd-name" class="requiredstar">Give your Boardroom a Name</label>
                    <input type="text" class="input-bb-orange form-control" value="{{isset($listing->name)?$listing->name:''}}" id="bd-name"
                        placeholder="Enter Name" name="bdname" />
                </div>
                <div class="form-group col-sm-12 col-md-12 col-lg-6 p-1">
                    <label for="bd-capacity" class="requiredstar">What is the Capacity?</label>
                    <select class="form-control form-select select-bb-gray" id="bd-capacity">

                        <option {{(isset($listing->listing_capacity_id ) && ($listing->listing_capacity_id == 0))?'selected':''}} value="0" >Select</option>
                        <option {{(isset($listing->listing_capacity_id ) && ($listing->listing_capacity_id == 1))?'selected':''}} value="1">&lt;5</option>
                        <option {{(isset($listing->listing_capacity_id ) && ($listing->listing_capacity_id == 2))?'selected':''}} value="2">5-10</option>
                        <option {{(isset($listing->listing_capacity_id ) && ($listing->listing_capacity_id == 3))?'selected':''}} value="3">11-20</option>
                        <option {{(isset($listing->listing_capacity_id ) && ($listing->listing_capacity_id == 4))?'selected':''}} value="4">&gt;20</option>

                    </select>
                </div>
                <div class="form-group col-12 p-0">
                    <label for="bd-desc" class="requiredstar">Tell us About your boardroom</label>
                    <textarea class="textarea-b-gray form-control rounded-0" id="bd-desc" rows="6" maxlength="500" name="bd-desc"
                        placeholder="For example: Enjoy your next brainstorm session or business meeting in this spacious boardroom featuring a gorgeous reclaimed wood table and 6 comfortable chairs. With plenty of natural light, this boardroom is ideal for adding creativity and inspiration to your next meeting. We’re located in The Beach close to coffee shops and great takeout, and are easily accessed by public transit with plenty of free on-street parking.">{{isset($listing->description)?$listing->description:''}}</textarea>
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
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(2))?'checked':''}} class="form-check-input custom-control-input"
                                    name="building-check" id="bd-2"  value="2" />
                                <label class="custom-control-label" for="bd-2">Air Conditioning</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(4))?'checked':''}} class="form-check-input custom-control-input"
                                    name="building-check" id="bd-4" value="4" />
                                <label class="custom-control-label" for="bd-4">Parking</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(5))?'checked':''}} class="form-check-input custom-control-input"
                                    name="building-check" id="bd-5" value="5" />
                                <label class="custom-control-label" for="bd-5">Reception</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(8))?'checked':''}} class="form-check-input custom-control-input"
                                    name="building-check" id="bd-8" value="8" />
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
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(1))?'checked':''}} class="form-check-input custom-control-input"
                                    name="boardroom-check" id="board-1" value="1" />
                                <label class="custom-control-label" for="board-1">Accessibility Friendly</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(3))?'checked':''}} class="form-check-input custom-control-input"
                                    name="boardroom-check" id="board-3" value="3" />
                                <label class="custom-control-label" for="board-3">Breakout Space</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(9))?'checked':''}} class="form-check-input custom-control-input"
                                    name="boardroom-check" id="board-9" value="9" />
                                <label class="custom-control-label" for="board-9">Whiteboard</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(12))?'checked':''}} class="form-check-input custom-control-input"
                                    name="boardroom-check" id="board-12" value="12" />
                                <label class="custom-control-label" for="board-12">Water</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(13))?'checked':''}} class="form-check-input custom-control-input"
                                    name="boardroom-check" id="board-13" value="13" />
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
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(6))?'checked':''}} class="form-check-input custom-control-input" name="tech-check"
                                    id="tech-6" value="6" />
                                <label class="custom-control-label" for="tech-6">Teleconference</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(7))?'checked':''}} class="form-check-input custom-control-input" name="tech-check"
                                    id="tech-7" value="7" />
                                <label class="custom-control-label" for="tech-7">Flatscreen TV</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(10))?'checked':''}} class="form-check-input custom-control-input" name="tech-check"
                                    id="tech-10" value="10" />
                                <label class="custom-control-label" for="tech-10">Wi-Fi</label>
                            </div>
                        </div>
                        <div class="col-6 p-0">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" {{(isset($amenities) && $amenities->contains(11))?'checked':''}} class="form-check-input custom-control-input" name="tech-check"
                                    id="tech-11" value="11" />
                                <label class="custom-control-label" for="tech-11">Projector</label>
                            </div>
                        </div>
                    </div>
                </div>

                <label class="mt-3 mb-1">Are there other amenities or features that you would like to
                    highlight?</label>
                <p class="sub-title mb-1">(Examples: Accessible by public transportation or food options nearby)</p>

                <div class="multi-field-wrapper form-group mt-2 col-12 p-0">
                    <div class="multi-fields">
                        <div class="multi-field row ml-2" style="display: none;">
                            <textarea class="textarea-bb-gray col-11" rows="1" name="stuff[]" id="user_amen" maxlength="500"></textarea>
                            <svg class="remove-field col-1 bi-type-bold" xmlns="http://www.w3.org/2000/svg"
                                width="1.5em" height="1.5em" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                            <span class="sub-title" id="user_amen_len"> 0 / 500 CHARACTERS MAX</span>
                        </div>
                    </div>
                    <button type="button" class="add-field">Add</button>
                </div>

                <div class="form-group">
                    <button onclick="event.preventDefault();addBoardroomInfo();" type="submit" class="btn save-btn"
                        id="btn-bd-info">Save</button>
                </div>

                <div class="col-12 p-0 mb-2">
                    <p class="mb-0 jb-text-color required-field">* Required fields</p>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
    function addBoardroomInfo() {
        $(".listing-alert-2").html('');
        var otherAmenities = $(".multi-field:visible").length;
        var user_amen = [];
        user_amen = $("textarea[id='user_amen']")
            .map(function() {
                return $(this).val();
            }).get();

        /* var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        } */
        var building = [];

        $.each($("input[name='building-check']:checked"), function() {
            building.push($(this).val());
        });
        $.each($("input[name='boardroom-check']:checked"), function() {
            building.push($(this).val());
        });
        $.each($("input[name='tech-check']:checked"), function() {
            building.push($(this).val());
        });

        $.ajax({
            url: '{{ route('add-boardroominfo') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                name: $('#bd-name').val(),
                description: $('#bd-desc').val(),
                capacity_id: $('#bd-capacity').val(),
                amenities: building,
                list_id: $("#list_id").val(),
                user_amen: user_amen,
                other_amenities: otherAmenities
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function(data) {

                /* console.log(data);
                return; */

                $('.listing-alert-2').append('<li> Boardroom Info: Save Sucessfully </li>').show().delay(
                    2000).hide(500);
                $('.listing-alert-2').addClass('alert-success').removeClass('alert-danger');


                current_fs = $("#btn-bd-info").parent().parent().parent().parent();
                next_fs = current_fs.next();
                $(".prev").css({
                    'display': 'block'
                });

                $('.card2').removeClass('show');
                $('.photoslisting').addClass("show");

                var active = jQuery('.building-info #progressbar .active').length;
                if (active > 2) {
                    $("#add_file").click(); // 3
                }

                $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");
                //timoutsubmit();
                /* Tip Box Pop Up */
                var indexbar = $('div .card2.show').index();
                indexbar = indexbar + 1;
                $('.building-info .content-form .tip-box .tips-content').hide();
                $(".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")").show();
                $(".building-info .content-form .tip-container").show();
                /* / */
                $('html, body').animate({
                    scrollTop: '0px'
                }, 100);
                onLoadStep(3);
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                if (!errors.error.length > 0) {
                    $.each(errors.error, function(key, value) {
                        $('.listing-alert-2').append('<li> Boardroom Info: ' + value + '</li>');
                    });
                } else {
                    $('.listing-alert-2').append('<li> Boardroom Info: ' + errors.error + '</li>');
                }
                $('.listing-alert-2').show().addClass('alert-danger').removeClass('alert-success');
                $('html, body').animate({
                    scrollTop: '0px'
                }, 0);
            }
        });
    }


    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            if ($('.multi-field').is(":visible") == false) {
                $('.multi-field').find('textarea').text('');
                $('.multi-field').show();
            } else {
                $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('textarea')
                    .val('').focus();
                $('.multi-field-wrapper').find('.multi-fields').find('.multi-field:last-child').find(
                    '#user_amen_len').text('0 / 500 CHARACTERS MAX');
            }
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1) {
                $(this).parent('.multi-field').remove();
            } else {
                $(this).parent('.multi-field').find('textarea').text('');
                $(this).parent('.multi-field').hide();
            }
        });
        var max = 500;
        var bd_desc_len = $('#bd-desc').val().length;
        $('#bd_desc_len').text(bd_desc_len + ' / ' + max + ' CHARACTERS MAX');
    });

    $('#user_amen').keyup(function() {
        var max = 500;
        var len = $(this).val().length;
        var remLen = max - len;
        $(this).parent().find('#user_amen_len').text(len + ' / ' + max + ' CHARACTERS MAX');
    });

    $('#bd-desc').keyup(function() {
        var max = 500;
        var len = $(this).val().length;
        $(this).parent().find('#bd_desc_len').text(len + ' / ' + max + ' CHARACTERS MAX');
    });
</script>
