function progressbarclick(){
    $('#progressbar .active').bind('click', function(){
        console.log('hii')
        jQuery('._1KJtL').remove()
        var indexbar = $('#progressbar .active').index(this) ;
        indexbar = indexbar + 1;
        $('.building-info .content-form .card2').removeClass('show')
        $( ".building-info .content-form .card2:nth-child(" + indexbar + ")" ).addClass('show');

        $('.building-info .content-form .tip-box .tips-content').hide();
        $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
        $( ".building-info .content-form .tip-container" ).show();
    });
}

function defaultstepjump(){
    var lastsavestep = jQuery('.latest-step').text();
    var lastsavestatus = jQuery('.latest-status').text();

    if(lastsavestep == '' || lastsavestatus == 2){
        lastsavestep = 1;
    }
    $('.building-info .content-form .card2').removeClass('show')
    $( ".building-info .content-form .card2:nth-child(" + lastsavestep + ")" ).addClass('show');


    if( lastsavestatus == 2){
        lastsavestep = 6;
    }
    for (i = 1; i <= lastsavestep; i++) {
        $("#progressbar .step0:nth-child(" + i + ")" ).addClass('active');
    }
}

$( document ).ajaxComplete(function() {
    progressbarclick();
});


$(document).ready(function () {
    //click and go back of form
    progressbarclick();
    defaultstepjump();
    //end of form click functinality

    $("#address-error-bag").hide();
    $("#info-error-bag").hide();
    $("#photo-error-bag").hide();




    var current_fs, next_fs, previous_fs;

    if ($(".show").hasClass("first-screen")) {
        $(".prev").css({ 'display': 'none' });
    }

    beforeunloadFunctionBoardroomCreation();


    //step - 1
    $("#btn-address").click(function (event) {
        listingjointsave();
        /* Tip Box Pop Up */
        var indexbar = $('div .card2.show').index() ;
        indexbar = indexbar + 2;
        $('.building-info .content-form .tip-box .tips-content').hide();
        $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
        $( ".building-info .content-form .tip-container" ).show();
        /* / */
    });

    //step - 2
    $("#btn-bd-info").click(function (event) {
        listingjointsave();
    });

    //step - 3
    // $("#add_file").on("click", function () {

    // });

    //step - 4
    $("#btn-bd-price").click(function (event) {
        listingjointsave();
        /* Tip Box Pop Up */
        var indexbar = $('div .card2.show').index() ;
        indexbar = indexbar + 1;
        $('.building-info .content-form .tip-box .tips-content').hide();
        $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
        $( ".building-info .content-form .tip-container" ).show();
        /* / */
    });

    $("#btn-bd-hosting-save-submit").click(function (event) {
        console.log('submit review cliecked');
        listingjointsave();
    });
});

function beforeunloadFunctionBoardroomCreation(){
    var UserProfileChanged=false;
    $('.content-form input').change(function() {
        UserProfileChanged = true;
    });
    $('.content-form select').change(function() {
        UserProfileChanged = true;
    });
    $('.content-form textarea').change(function() {
        UserProfileChanged = true;
    });

    $(window).bind('beforeunload', function(e){
        if(UserProfileChanged)
            return e.originalEvent.returnValue = "Your message here";
        else
            e=null; // i.e; if form state change show warning box, else don't show it.
    });
}

function addBoardroomInfo() {
    $(".listing-alert-2").html('');
    var otherAmenities = $(".multi-field:visible").length;
    var user_amen = [];
        user_amen = $("textarea[id='user_amen']")
        .map(function () { return $(this).val(); }).get();

    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
    }
    var building = [];

    $.each($("input[name='building-check']:checked"), function () {
        building.push($(this).val());
    });
    $.each($("input[name='boardroom-check']:checked"), function () {
        building.push($(this).val());
    });
    $.each($("input[name='tech-check']:checked"), function () {
        building.push($(this).val());
    });

    $.ajax({
        url: '/api/listing/add/boardroom-info',
        type: 'POST',
        headers: headers,
        data: {
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
        success: function (data) {
            $('.listing-alert-2').append('<li> Boardroom Info: Save Sucessfully </li>').show().delay(2000).hide(500);
            $('.listing-alert-2').addClass('alert-success').removeClass('alert-danger');


            current_fs = $("#btn-bd-info").parent().parent().parent().parent();
            next_fs = current_fs.next();
            $(".prev").css({ 'display': 'block' });

            $('.card2').removeClass('show');
            $('.photoslisting').addClass("show");

            var active = jQuery('.building-info #progressbar .active').length ;
            if(active > 2){
                $("#add_file").click();  // 3
            }

            $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");
            timoutsubmit();
            /* Tip Box Pop Up */
                var indexbar = $('div .card2.show').index() ;
                indexbar = indexbar + 1;
                $('.building-info .content-form .tip-box .tips-content').hide();
                $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
                $( ".building-info .content-form .tip-container" ).show();
            /* / */
            $('html, body').animate({scrollTop: '0px'}, 0);
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            if(!errors.error.length > 0) {
                $.each(errors.error, function (key, value) {
                    $('.listing-alert-2').append('<li> Boardroom Info: ' + value + '</li>');
                });
            } else {
                $('.listing-alert-2').append('<li> Boardroom Info: ' + errors.error + '</li>');
            }
            $('.listing-alert-2').show().addClass('alert-danger').removeClass('alert-success');
            $('html, body').animate({scrollTop: '0px'}, 0);
        }
    });
}

function addBoardroomPic() {
    $(document).ready(function () {

        current_fs = $("#btn-bd-pic").parent().parent().parent();
        next_fs = current_fs.next();
        $(".prev").css({ 'display': 'block' });

        $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

    });
}

function addbuildinginfo(){
    $(".listing-alert-1").html('');
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
    }
    var current_fs, next_fs, previous_fs;
    event.preventDefault();

    var address = $('#list-address').val();
    if (address == "") {
        $(".listing-alert-1").append('<li>Building Info: Please Enter a Valid Address</li>');
        $('.listing-alert-1').show().addClass('alert-danger');
        return false;
    }

    if(($('#map').height() == 0)){
        $(".listing-alert-1").append('<li>Building Info: Make sure the pin in the map is in the correct location.</li>');
        $('.listing-alert-1').show().addClass('alert-danger');
        return false;
    }

    $.ajax({
        url: '/api/listing/add/address',
        type: 'POST',
        headers: headers,
        data: {
            formatted_address: $("#frmlistingaddress input[name=listA]").val(),
            postal_code: $("#postalcode").val(),
            lat: $("#lat").val(),
            lng: $("#lng").val(),
            list_id: $("#list_id").val(),
            building_name: $("#building-name").val(),
            intersection_a: $("#intersection-a").val(),
            intersection_b: $("#intersection-b").val(),
            country:$("#country").val(),
            province:$("#province").val()
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            $('.listing-alert-1').append('<li> Building Info: Save Sucessfully </li>').show().delay(2000).hide(500);
            $('.listing-alert-1').addClass('alert-success').removeClass('alert-danger');
            current_fs = $("#btn-address").parent().parent().parent().parent().parent();
            next_fs = current_fs.next();
            $(".prev").css({ 'display': 'block' });
            $('.card2').removeClass('show');
            $('.boardroominfo').addClass('show');
			var active = jQuery('.building-info #progressbar .active').length ;
            if(active > 1){
                addBoardroomInfo(); // 2
            }
            $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

            document.getElementById('list_id').value = data.id;
            document.getElementById('listing_id').value = data.id;
            timoutsubmit();
            /* Tip Box Pop Up */
            var indexbar = $('div .card2.show').index() ;
            indexbar = indexbar + 1;
            $('.building-info .content-form .tip-box .tips-content').hide();
            $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
            $( ".building-info .content-form .tip-container" ).show();
            $('html, body').animate({scrollTop: '0px'}, 0);
            /* / */
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            console.log(errors.error);
            $.each(errors.error, function (key, value) {
                console.log(value);
                $('.listing-alert-1').append('<li> Building Info: ' + value + '</li>');
            });
            $('.listing-alert-1').show().addClass('alert-danger').removeClass('alert-success');
            $('html, body').animate({scrollTop: '0px'}, 0);

        }
    });
}






