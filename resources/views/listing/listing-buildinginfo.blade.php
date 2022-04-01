<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuy4U3KFAhhK1gtshBsDJIiKDnK16upg&libraries=places&callback=initMap">
</script>
<script src="{{ asset('/js') }}/addressAuto.js"></script>

{{-- Fixed Alert Start --}}
<div class="card2 first-screen show ml-2 listingStepp" id="listing-step-1">
    <div class="jbr-tips mb-4">
        <h4>
            <span class="mr-3 orng-box">
                <img src="https://justboardrooms.com/wp-content/themes/understrap/images/orange_box.png">
            </span>
            Just Boardrooms tips!
        </h4>
        <p>
            Please make sure to give your complete address including the postal code or zip code as this
            will make it easier for the system to geo locate your physical space and create an online
            map pin location. If your boardroom is within a larger building with a more familiar name,
            feel free to include it under the "building name" section. Anything that will make your
            boardroom more familiar and easier to locate will help in promoting your space.
        </p>
    </div>
    {{-- Fixed Alert End --}}
    {{-- Building Info Form Start --}}
    <div class="listing-building-info form-grey-box position-relative">
        <form id="frmlistingaddress" autocomplete="none" class="frm-listing-address">
            <p class="step-title"> Building Info</p>
            <div class="alert alert-danger" id="address-error-bag" style="display: none;">
                <ul id="list-address-errors"></ul>
            </div>
            <div class="row px-3 mt-4">
                <div class="form-group px-0 mt-1 mb-1">
                    <label for="list-address" class="requiredstar">
                        What is the address of your building? Make sure the pin in the map below is in the correct
                        location.
                    </label>
                    <input type="text"
                        class="input-bb-orange form-control pac-target-input"
                        id="list-address"
                        value="{{ isset($listing->address) ? $listing->address->formatted_address : '' }}"
                        placeholder="Enter Address"
                        name="listA" onfocus="geolocate()"
                        list="autocompleteOff"
                        autocomplete="off"
                    >
                </div>
                <div class="form-group mt-1 mb-1 addressmap">
                    <div id="map"></div>
                </div>
                <input id="postalcode" name="postal_code" type="hidden" value="{{ isset($listing->address) ? $listing->address->postal_code : '' }}">
                <input id="country" name="country" type="hidden" value="">
                <input id="province" name="province" type="hidden" value="{{ isset($listing->address) ? $listing->address->province : '' }}">
                <input id="lat" name="lat" type="hidden" value="{{ isset($listing->address) ? $listing->address->lat : '' }}">
                <input id="lng" name="lng" type="hidden" value="{{ isset($listing->address) ? $listing->address->lng : '' }}">
                <input id="list_id" name="list_id" type="hidden" value="{{session('listingSpace') != 0 ? session('listingSpace') : ''}}">
                <div class="form-group px-0 mt-1 mb-1">
                    <label for="building-name">Enter your building name</label>
                    <span class="ifaplicable">(If Applicable)</span>
                    <input type="text" class="input-bb-gray form-control" id="building-name" placeholder="Enter name"
                        name="buildingName" value="{{ isset($listing->name) ? $listing->name : '' }}" maxlength="100">
                </div>
                <div class="form-group btn-submit">
                    <button type="button" class="btn save-btn listaddress-btn-notactive" id="btn-address"
                        onclick="addbuildinginfo()" disabled="">Save</button>
                    <div class="mb-2 mt-2">
                        <p class="mb-0 jb-text-color required-field">*Required Field</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function addbuildinginfo() {
        $(".listing-alert-1").html('');
        var current_fs, next_fs, previous_fs;
        event.preventDefault();

        var address = $('#list-address').val();
        if (address == "") {
            $(".listing-alert-1").append('<li>Building Info: Please Enter a Valid Address</li>');
            $('.listing-alert-1').show().addClass('alert-danger');
            return false;
        }

        if (($('#map').height() == 0)) {
            $(".listing-alert-1").append(
                '<li>Building Info: Make sure the pin in the map is in the correct location.</li>');
            $('.listing-alert-1').show().addClass('alert-danger');
            return false;
        }

        $.ajax({
            url: '{{ url('/') }}/listing/add/address',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                formatted_address: $("#frmlistingaddress input[name=listA]").val(),
                postal_code: $("#postalcode").val(),
                lat: $("#lat").val(),
                lng: $("#lng").val(),
                list_id: $("#list_id").val(),
                building_name: $("#building-name").val(),
                intersection_a: $("#intersection-a").val(),
                intersection_b: $("#intersection-b").val(),
                country: $("#country").val(),
                province: $("#province").val()
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function(data) {
                /* console.log(data);
                return;
               */
                $('.listing-alert-1').append('<li> Building Info: Save Sucessfully </li>').show().delay(
                    2000).hide(500);
                $('.listing-alert-1').addClass('alert-success').removeClass('alert-danger');
                current_fs = $("#btn-address").parent().parent().parent().parent().parent();
                next_fs = current_fs.next();

                console.log(next_fs);

                $(".prev").css({
                    'display': 'block'
                });
                $('.card2').removeClass('show');
                $('.boardroominfo').addClass('show');
                var active = jQuery('.listing-building-info #progressbar .active').length;
                if (active > 1) {
                    addBoardroomInfo(); // 2
                }
                $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

                document.getElementById('list_id').value = data.id;
                document.getElementById('listing_id').value = data.id;

                /* Tip Box Pop Up */
                var indexbar = $('div .card2.show').index();
                indexbar = indexbar + 1;
                $('.listing-building-info .content-form .tip-box .tips-content').hide();
                $(".listing-building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")").show();
                $(".listing-building-info .content-form .tip-container").show();
                $('html, body').animate({
                    scrollTop: '0px'
                }, 100);
                onLoadStep(2);
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors.error);
                $.each(errors.error, function(key, value) {
                    console.log(value);
                    $('.listing-alert-1').append('<li> Building Info: ' + value + '</li>');
                });
                $('.listing-alert-1').show().addClass('alert-danger').removeClass('alert-success');
                $('html, body').animate({
                    scrollTop: '0px'
                }, 0);

            }
        });
    }
</script>
