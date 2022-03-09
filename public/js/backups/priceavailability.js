$(document).ready(function () {

    $(document).on('click','#removeTime',function (e) {
        $(this).parents('.available-from-to').remove();
    });

    $('.addTaxId').on('click', function () {
        $('.error-resp').hide();
        $('.success-resp').hide();
        $('#update-tax-id-modal').modal('show');
        event.preventDefault();
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        $.ajax({
            url: '/api/listing/getTaxId',
            type: 'GET',
            headers: headers,
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (response) {

                $('#tax_id').val(response.data);
            },
            error: function (data) {
            }
        });
    });

    $("#save-tax-id").click(function (event) {
        event.preventDefault();
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        $.ajax({
            url: '/api/listing/saveTaxId',
            type: 'POST',
            headers: headers,
            data: {
                tax_id:$("#tax_id").val()
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                if(data.status == 'success'){
                    $('.success-resp').show();
                    $('.success-resp').text(data.msg_resp);
                    $('.error-resp').hide();
                } else {
                    $('.error-resp').show();
                    if (data.error){
                        $.each(data.error, function (key, value) {
                            $('.error-resp').text(value);
                        });
                    } else {
                        $('.error-resp').text(data.msg_resp);
                    }
                    $('.success-resp').hide();
                }
                // $('#update-tax-id-modal').modal('hide');
            },
            error: function (data) {
                $('.msg-resp').text(data.success);
            }
        });

    });

    $('#discount-price-input').on('input', function () {

        var value = $(this).val();

        if ((value !== '') && (value.indexOf('.') === -1)) {

            $(this).val(Math.max(Math.min(value, 99), 0));
        }
    });

    $('#price-input-daily').on('input', function () {

        var value = $(this).val();

        if ((value !== '') && (value.indexOf('.') === -1)) {

            $(this).val(Math.max(Math.min(value, 99), 0));
        }
    });

    $('#price-input-daily').on('input', function () {

        var value = $(this).val();

        if ((value !== '') && (value.indexOf('.') === -1)) {

            $(this).val(Math.max(Math.min(value, 99), 0));
        }
    });

    $(document).on('click','#addTime',function (e) {
        var day = $(this).attr("class");
        var test = '<div class="available-from-to showboardroomday"> '+
                    '   <div class="ml-2" style="width:35%;"><select id="'+day+'-from" class="day-from" value="09:00">'+
                    '       <option value="00:00">12.00 AM</option>'+
                    '       <option value="01:00">01.00 AM</option>'+
                    '       <option value="02:00">02.00 AM</option>'+
                    '       <option value="03:00">03.00 AM</option>'+
                    '       <option value="04:00">04.00 AM</option>'+
                    '       <option value="05:00">05.00 AM</option>'+
                    '       <option value="06:00">06.00 AM</option>'+
                    '       <option value="07:00">07.00 AM</option>'+
                    '       <option value="08:00">08.00 AM</option>'+
                    '       <option value="09:00">09.00 AM</option>'+
                    '       <option value="10:00">10.00 AM</option>'+
                    '       <option value="11:00">11.00 AM</option>'+
                    '       <option value="12:00">12.00 PM</option>'+
                    '       <option value="13:00">01.00 PM</option>'+
                    '       <option value="14:00">02.00 PM</option>'+
                    '       <option value="15:00">03.00 PM</option>'+
                    '       <option value="16:00">04.00 PM</option>'+
                    '       <option value="17:00">05.00 PM</option>'+
                    '       <option value="18:00">06.00 PM</option>'+
                    '       <option value="19:00">07.00 PM</option>'+
                    '       <option value="20:00">08.00 PM</option>'+
                    '       <option value="21:00">09.00 PM</option>'+
                    '       <option value="22:00">10.00 PM</option>'+
                    '       <option value="23:00">11.00 PM</option>'+
                    '   </select></div>'+
                    '   <div class="mx-2" style="width:10%;"> <span>to</span> </div> '+
                    '   <div class="" ><select id='+day+'-to class="day-to" value="17:00">'+
                    '       <option value="00:00">12.00 AM</option>'+
                    '       <option value="01:00">01.00 AM</option>'+
                    '       <option value="02:00">02.00 AM</option>'+
                    '       <option value="03:00">03.00 AM</option>'+
                    '       <option value="04:00">04.00 AM</option>'+
                    '       <option value="05:00">05.00 AM</option>'+
                    '       <option value="06:00">06.00 AM</option>'+
                    '       <option value="07:00">07.00 AM</option>'+
                    '       <option value="08:00">08.00 AM</option>'+
                    '       <option value="09:00">09.00 AM</option>'+
                    '       <option value="10:00">10.00 AM</option>'+
                    '       <option value="11:00">11.00 AM</option>'+
                    '       <option value="12:00">12.00 PM</option>'+
                    '       <option value="13:00">01.00 PM</option>'+
                    '       <option value="14:00">02.00 PM</option>'+
                    '       <option value="15:00">03.00 PM</option>'+
                    '       <option value="16:00">04.00 PM</option>'+
                    '       <option value="17:00">05.00 PM</option>'+
                    '       <option value="18:00">06.00 PM</option>'+
                    '       <option value="19:00">07.00 PM</option>'+
                    '       <option value="20:00">08.00 PM</option>'+
                    '       <option value="21:00">09.00 PM</option>'+
                    '       <option value="22:00">10.00 PM</option>'+
                    '       <option value="23:00">11.00 PM</option>'+
                    '   </select> </div>'+
                    '<div><svg id="removeTime" name="removeTime" width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
                    '<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>' +
                    '<path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>' +
                    '</svg></div>' +
                    '</div>';
                    $(".timeContainer-"+day).append(test);
        $('#'+day+'-from option[value="09:00"]').attr('selected', 'selected');
        $('#'+day+'-to option[value="17:00"]').attr('selected', 'selected');

        event.preventDefault();
    });

    $("#price-error-bag").hide();

    var dailybookingval  = jQuery("input[name='dailybookingdiscount']:checked").val();
    if(dailybookingval == 'dailybookingdiscountyes'){
        jQuery('.daily-discount-input').show();
    }
    else{
        jQuery('.daily-discount-input').hide();
    }

    var hourbookingval  = jQuery("input[name='hourhalfdiscount']:checked").val();
    if(hourbookingval == 'hourhalfdiscountyes'){
        jQuery('.discount-input').show();
    }
    else{
        jQuery('.discount-input').hide();
    }

    var urlToCheck = window.location.href.split('/')[4];

    $(document).ready(function(){
        if(urlToCheck == 'listing'){
            jQuery('.availcheckbox').not(":eq(-2)").not(":eq(-1)").prop('checked',true);


            var $AddTime= $('.availcheckbox').parent().siblings().children().find('#addtime').not(":eq(-2)").not(":eq(-1)");
            $('.availcheckbox').parent().siblings().children().find('#addtime').eq(-2).hide();
            $('.availcheckbox').parent().siblings().children().find('#addtime').eq(-1).hide();

            $('.availcheckbox').parent().siblings().find('.unavailable-from-to.hideboardroomday').eq(-2).show();
            $('.availcheckbox').parent().siblings().find('.unavailable-from-to.hideboardroomday').eq(-1).show();

            $AddTime.each(function(){
                $(this).prop("checked",true)
            })
            $AddTime.click();

        }
    })


    var availexist = jQuery('.availcheckbox').length;
    if(availexist){
        var $daysavail = jQuery('.availcheckbox');
        $daysavail.on('change',function() {
            var status =  $(this).is(':checked');
            //alert(status);
            var url = window.location.href.split('/')[4];
            //alert(url);
            if(status == true){

                if(url == 'listing'){
                    $(this).parent().siblings().children().find('#addtime').click();
                    $(this).parent().siblings().find('.unavailable-from-to').hide();
                }


                $(this).parent().siblings().find('.available-from-to').addClass('showboardroomday');

                $(this).parent().siblings().find('.available-from-to').removeClass('hideboardroomday');

                $(this).parent().parent().find('#addTime').show();

                $(this).parent().parent().find('.unavailable-from-to').addClass('hideboardroomday');
                $(this).parent().parent().find('.unavailable-from-to').removeClass('showboardroomday');

            }
            else{

                if(url == 'listing'){
                    $(this).parent().siblings().children().find('#removeTime').click();
                    $(this).parent().siblings().find('.unavailable-from-to').show();
                }

                $(this).parent().parent().find('.available-from-to').addClass('hideboardroomday');
                $(this).parent().parent().find('.available-from-to').removeClass('showboardroomday');
                $(this).parent().parent().find('#addTime').hide();

                $(this).parent().parent().find('.unavailable-from-to').addClass('showboardroomday');
                $(this).parent().parent().find('.unavailable-from-to').removeClass('hideboardroomday');

            }
        });
    }

    $hourbooking = jQuery("input[name='hourhalfdiscount']");
    $hourbooking.change(function() {
        var hourbookingval  = jQuery("input[name='hourhalfdiscount']:checked").val();
        if(hourbookingval == 'hourhalfdiscountyes'){
            jQuery('.discount-input').show();
        }
        else{
            jQuery('.discount-input').hide();
        }
    });

    $dailybooking = jQuery("input[name='dailybookingdiscount']");
    $dailybooking.change(function() {
        var dailybookingval  = jQuery("input[name='dailybookingdiscount']:checked").val();
        if(dailybookingval == 'dailybookingdiscountyes'){
            jQuery('.daily-discount-input').show();
        }
        else{
            jQuery('.daily-discount-input').hide();
        }
    });

    $hstCheck = jQuery("input[name='hst']");
    $hstCheck.change(function() {
        var hstval  = jQuery("input[name='hst']:checked").val();
        if(hstval == 'hstyes'){
            $('#hst-check').modal('show');
            jQuery('.sales-tax-input').show();
        } else {
            jQuery('.sales-tax-input').hide();
            jQuery('.sales-tax-input').val(0);
            $('#hst-check').modal('show');
        }
    });

    $("#hst-yes").click(function (event) {
        $('#hst-check').modal('hide');
    });


});

function maxLengthCheck(object) {

    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)

}

  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

function addPriceInfo() {
    $(document).ready(function () {
    $(".listing-alert-4").html('');
    var hourly_rate = $("input[id='hourly-price-input']").val();
        var min_duration = $("#booking-duration").val();
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        var halfdaydiscount = [];
        var fulldaydiscount = [];
        var sales_tax = 0;
        var mon = [];
        var tue = [];
        var wed  = [];
        var thr  = [];
        var fri  = [];
        var sat  = [];
        var sun  = [];
        var dailybookingval=jQuery("input[name='dailybookingdiscount']:checked").val();
        var hourbookingval  = jQuery("input[name='hourhalfdiscount']:checked").val();
        var hstval  = jQuery("input[name='hst']:checked").val();

        var rate_currency = jQuery('#rate-currency').val();
        if(hourbookingval == 'hourhalfdiscountyes'){
           var hourlydiscount = jQuery('#discount-price-input').val();
           halfdaydiscount.push(hourlydiscount);
           halfdaydiscount.push(hourbookingval);
        }
        else{
            halfdaydiscount.push(0);
            halfdaydiscount.push(hourbookingval);
        }


        if(dailybookingval == 'dailybookingdiscountyes'){
            var fulldaydis = jQuery('#price-input-daily').val();
            fulldaydiscount.push(fulldaydis);
            fulldaydiscount.push(dailybookingval);
        }
        else{
            fulldaydiscount.push(0);
            fulldaydiscount.push(dailybookingval);
        }

        if(hstval == 'hstyes'){
            var salesTaxVal = jQuery('#sales-tax').val();
            sales_tax = salesTaxVal;
        }
        else{
            jQuery('#sales-tax').val(0);
            sales_tax = 0;
        }

        // Monday array
        var monavail = jQuery("input[name='monavail']:checked").val();
        if(monavail == "monavailable"){
            var monFrom = [];
            var monTo = [];
            $.each($('[id=Monday-from]'), function( index, value ) {
                monFrom.push(value.value);
            });
            $.each($('[id=Monday-to]'), function( index, value ) {
                monTo.push(value.value);
            });
            mon.push({
                from: monFrom,
                to: monTo,

            });
        }
        else{
            mon.push({
                from: 0,
                to: 0
            });
        }
        // Tuesday array
        var tueavail = jQuery("input[name='tueavail']:checked").val();
        if(tueavail == "tueavailable"){
            var tueFrom = [];
            var tueTo = [];
            $.each($('[id=Tuesday-from]'), function( index, value ) {
                tueFrom.push(value.value);
            });
            $.each($('[id=Tuesday-to]'), function( index, value ) {
                tueTo.push(value.value);
            });
            tue.push({
                from: tueFrom,
                to: tueTo,

            });
        }
        else{
            tue.push({
                from: 0,
                to: 0
            });
        }

        // wed array

        var wedavail = jQuery("input[name='wedavail']:checked").val();
        if(wedavail == "wedavailable"){
            var wedFrom = [];
            var wedTo = [];
            $.each($('[id=Wednesday-from]'), function( index, value ) {
                wedFrom.push(value.value);
            });
            $.each($('[id=Wednesday-to]'), function( index, value ) {
                wedTo.push(value.value);
            });
            wed.push({
                from:wedFrom,
                to:wedTo,

            });
        }
        else{
            wed.push({
                from:0,
                to:0
            });
        }
        // thrusday array

        var thuavail = jQuery("input[name='thuavail']:checked").val();
        if(thuavail == "thuavailable"){
            var thuFrom = [];
            var thuTo = [];
            $.each($('[id=Thursday-from]'), function( index, value ) {
                thuFrom.push(value.value);
            });
            $.each($('[id=Thursday-to]'), function( index, value ) {
                thuTo.push(value.value);
            });
            thr.push({
                from: thuFrom,
                to: thuTo,

            });
        }
        else{
            thr.push({
                from: 0,
                to: 0
            });
        }

        // Friday Array

        var friavail = jQuery("input[name='friavail']:checked").val();
        if(friavail == "friavailable"){
            var friFrom = [];
            var friTo = [];
            $.each($('[id=Friday-from]'), function( index, value ) {
                friFrom.push(value.value);
            });
            $.each($('[id=Friday-to]'), function( index, value ) {
                friTo.push(value.value);
            });
            fri.push({
                from: friFrom,
                to: friTo,

            });
        }
        else{
            fri.push({
                from: 0,
                to: 0
            });
        }
        // Saturday array

        var satavail = jQuery("input[name='satavail']:checked").val();
        if(satavail == "satavailable"){
            var satFrom = [];
            var satTo = [];
            $.each($('[id=Saturday-from]'), function( index, value ) {
                satFrom.push(value.value);
            });
            $.each($('[id=Saturday-to]'), function( index, value ) {
                satTo.push(value.value);
            });
            sat.push({
                from: satFrom,
                to: satTo,

            });
        }
        else{
            sat.push({
                from: 0,
                to: 0
            });
        }

        // sunday array

         // Saturday array

         var sunavail = jQuery("input[name='sunavail']:checked").val();
         if(sunavail == "sunavailable"){
             var sunFrom = [];
             var sunTo = [];
             $.each($('[id=Sunday-from]'), function( index, value ) {
                sunFrom.push(value.value);
             });
             $.each($('[id=Sunday-to]'), function( index, value ) {
                sunTo.push(value.value);
             });
             sun.push({
                 from: sunFrom,
                 to: sunTo,

             });
         }
         else{
            sun.push({
                 from: 0,
                 to: 0
             });
         }

        $.ajax({
            url: '/api/listing/add/price',
            type: 'POST',
            headers: headers,
            data: {
                per_hour_rate:hourly_rate,
                min_hour:min_duration,
                half_day_discount:halfdaydiscount,
                full_day_discount:fulldaydiscount,
                sales_tax:sales_tax,
                rate_currency:rate_currency,
                monVal:mon,
                tueVal:tue,
                wedVal:wed,
                thrVal:thr,
                friVal:fri,
                satVal:sat,
                sunVal:sun,
                list_id:$("#listing_id").val(),
                hst_check:jQuery("input[name='hst']:checked").val()
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $('.listing-alert-4').append('<li> Price & Availability: Save Sucessfully </li>').show().delay(2000).hide(500);
                $('.listing-alert-4').addClass('alert-success').removeClass('alert-danger');

                current_fs = $("#btn-bd-price").parent().parent().parent();
                next_fs = current_fs.next();
                $(".prev").css({ 'display': 'block' });

                $('.card2').removeClass("show");
                $('.hosting-arrangements').addClass('show');


                var active = jQuery('.building-info #progressbar .active').length ;
                if(active > 4){
                    submitForReview(); //5
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

            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                if (errors.error){
                    $.each(errors.error, function (key, value) {
                        $('.listing-alert-4').append('<li> Price & Availability: ' + value + '</li>');
                    });
                }
                else{
                    $('.listing-alert-4').append('<li> Price & Availability: ' +  errors.minError + '</li>');
                }
                $('.listing-alert-4').show().addClass('alert-danger').removeClass('alert-success');
                $('html, body').animate({scrollTop: '0px'}, 0);
            }
        });


    });
}
