$(document).ready(function () {

    $("#hours-select", "#hourly-price-input").on("input", function() {
        if (/^0/.test(this.value)) {
          this.value = this.value.replace(/^0/, "")
        }
    });

    /* Tip Box Collapsible */
    $('#tip-box-building').on('hidden.bs.collapse', function() {
        $(".tip-col-building").css("display","none");
        $(".tip-exp-building").css("display","block");
    });
    $('#tip-box-building').on('show.bs.collapse', function() {
        $(".tip-col-building").css("display","block");
        $(".tip-exp-building").css("display","none");
    });

    $('#tip-box-about').on('hidden.bs.collapse', function() {
        $(".tip-col-about").css("display","none");
        $(".tip-exp-about").css("display","block");
    });
    $('#tip-box-about').on('show.bs.collapse', function() {
        $(".tip-col-about").css("display","block");
        $(".tip-exp-about").css("display","none");
    });

    $('#tip-box-photos').on('hidden.bs.collapse', function() {
        $(".tip-col-photos").css("display","none");
        $(".tip-exp-photos").css("display","block");
    });
    $('#tip-box-photos').on('show.bs.collapse', function() {
        $(".tip-col-photos").css("display","block");
        $(".tip-exp-photos").css("display","none");
    });

    $('#tip-box-price').on('hidden.bs.collapse', function() {
        $(".tip-col-price").css("display","none");
        $(".tip-exp-price").css("display","block");
    });
    $('#tip-box-price').on('show.bs.collapse', function() {
        $(".tip-col-price").css("display","block");
        $(".tip-exp-price").css("display","none");
    });

    $('#tip-box-hosting').on('hidden.bs.collapse', function() {
        $(".tip-col-hosting").css("display","none");
        $(".tip-exp-hosting").css("display","block");
    });
    $('#tip-box-hosting').on('show.bs.collapse', function() {
        $(".tip-col-hosting").css("display","block");
        $(".tip-exp-hosting").css("display","none");
    });

    $('#tip-box-request').on('hidden.bs.collapse', function() {
        $(".tip-col-request").css("display","none");
        $(".tip-exp-request").css("display","block");
    });
    $('#tip-box-request').on('show.bs.collapse', function() {
        $(".tip-col-request").css("display","block");
        $(".tip-exp-request").css("display","none");
    });
    /* Tip Box Pop Up */
    var indexbar = $('div .card2.show').index() ;
    indexbar = indexbar + 1;
    $('.building-info .content-form .tip-box .tips-content').hide();
    $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
    $( ".building-info .content-form .tip-container" ).show();
    /* / */

    $("#hosting-error-bag").hide();
    $('.hosting-multi-field-wrapper').each(function () {
        var $wrapper = $('.hosting-multi-fields', this);

        $(".hosting-add-field", $(this)).click(function (e) {
            if($('.hosting-multi-field').is(":visible") == false ) {
                $('.hosting-multi-field').show();
            } else {
                $('.hosting-multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('textarea').val('').focus();
                $('.house-rules-input-wrapper').find('.hosting-multi-fields').find('.hosting-multi-field:last-child').find('#hosting_rules_len').text('0 / 500 CHARACTERS MAX');
            }
        });
        $('.hosting-multi-field .hosting-remove-field', $wrapper).click(function () {
            if ($('.hosting-multi-field', $wrapper).length > 1)
            {
                $(this).parent('.hosting-multi-field').remove();
            } else {
                $(this).parent('.hosting-multi-field').find('textarea').text('');
                $(this).parent('.hosting-multi-field').hide();
            }
        });
        var max = 500;
        var house_instruction_len = $('#house-instruction-input').val().length;
        $('#house_instruction_len').text(house_instruction_len + ' / ' + max +' CHARACTERS MAX');
    });

    $('#hosting_rules').keyup(function () {
        var max = 500;
        var len = $(this).val().length;
        var remLen =  max - len ;
        $(this).parent().find('#hosting_rules_len').text(len + ' / ' + max +' CHARACTERS MAX');
    });

    var maxLength = 4;
    $("#hours-select").keyup(function(e) {
        var char = $(this).val();
        if (char.length > maxLength){
            $(this).val(char.substring(0, maxLength));
        }
    });
    $("#hourly-price-input").keyup(function(e) {
        var char = $(this).val();
        if (char.length > maxLength){
            $(this).val(char.substring(0, maxLength));
        }
    });

    $("#sales-tax").keyup(function(e) {
        var char = $(this).val();
        if (char.length > 5){
            $(this).val(char.substring(0, 5));
        }
    });

    $('#house-instruction-input').keyup(function () {
        var max = 500;
        var len = $(this).val().length;
        $(this).parent().find('#house_instruction_len').text(len + ' / ' + max +' CHARACTERS MAX');
    });

    /* $("#btn-accept").on('click',function (event) {
        event.preventDefault();
        //var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers =  {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        };
        $.ajax({
            url: '/listing/submitForReview',
            type: 'POST',
            headers: headers,
            data: {
                list_id:$("#listing_id").val(),
                terms:1
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                window.location.href = `/api/dashboard`;
            },
            error: function (data) {

            }
        });

    }); */



    $("#btn-accept-hosting-terms").click(function (event) {
        $('#terms').val(1);
        $('#hosting-submit').modal('show');
    });
    $("#btn-decline-hosting-terms").click(function (event) {
        $('#hosting-terms').modal('hide');
    });

    // $("#listing-cancellation-policy").click(function (event) {
    //     $('#listing-cancellation').modal('show');
    // });
    // $("#btn-cancellation-got-it").click(function (event) {
    //     $('#listing-cancellation').modal('hide');
    // });
    $("#btn-error-acct-ver-got-it").click(function (event) {
        $('#error-account-verification').modal('hide');
    });
    $("#btn-thank-you-okay").click(function (event) {
        window.location.href = `/listing/dashboard`;
    });

    // $("#btn-decline-terms").click(function (event) {
    //     $('#terms').modal('hide');
    // });


    $("#btn-accept-hosting-submit").click(function (event) {
        //submitpost();
        submitListingForReview();
    });


    $("#btn-decline-hosting-submit").click(function (event) {
        $('#hosting-submit').modal('hide');
    });

    // $('.modal.listing-cancellation').on('shown.bs.modal', function() {
    //     $(this).find('iframe').attr('src','https://api.justboardrooms.com/api-PROD/terms_host.php#hosting-cancellations')
    // })

    // $('.modal.hosting-submit').on('shown.bs.modal', function() {
    //     $(this).find('iframe').attr('src','https://api.justboardrooms.com/api-PROD/terms_host.php')
    // })

});

async function submitForReview() {

        console.log('async function called');
        $(".listing-alert-6").html('').removeClass('alert-danger').removeClass('alert-success');
        var msg = '';
        var error = 0;
        var advNotice = parseInt(jQuery('#hours-select').val());
        var guestInst = jQuery('#house-instruction-input').val();
        if(advNotice == null){
            msg = '<li>Hosting Preference: Please select how much advance notice you require</li>';
            error = 1;
        }
        else if(isNaN(advNotice)){
            msg = '<li>Hosting Preference: Please select how much advance notice you require</li>';
            error = 1;
        }
        else if(guestInst == null){
            msg = msg + '<li>Hosting Preference: Please provide access instructions to your guests</li>';
            error = 1;
        }
        else if(guestInst == ''){
            msg = msg + '<li>Hosting Preference: Please provide access instructions to your guests</li>';
            error = 1;
        }
        else{
            error = 0;
        }
        if(error == 1){
            $(".listing-alert-6").html('');
            $('.listing-alert-6').append(msg);
            $('.listing-alert-6').show().addClass('alert-danger').removeClass('alert-success');
            return false;
        }

        var alertdanger = jQuery( ".alert-danger:visible" ).length;
        if(alertdanger){
            return false;
        }
        else{
            setInterval(function(){
                $(window).unbind('beforeunload');
            }, 1000);
        }

        var terms = $('#terms').val();

        if(terms == 1){
            submitpost();
        }else{
           //$('#hosting-submit').modal('show');
           submitpost();
        }

}

$(".modal").on("hidden.bs.modal", function () {
    window.location = "your-url";
});

function submitpost(){
    //var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers =  {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
    var advance = $('#hours-duration').find(':selected').val();
    //alert(advance);
    var hosting_rule = $("textarea[name='rules[]']").map(function () { return $(this).val(); }).get();

    /* console.log(hosting_rule);
    return; */
    var instruction = $('#house-instruction-input').val();
    $.ajax({
        url: '/listing/submitForReview',
        type: 'POST',
        headers: headers,
        data: {
           list_id:$("#list_id").val(),
           advance_notice: advance,
           hosting_instructions:instruction,
           hosting_rule:hosting_rule,
           terms: $('#terms').val(),
           type:'review'
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            /* console.log(data);
            return; */
            // $(window).unbind('beforeunload');

            // $('#hosting-submit').modal('hide');
            // $('#thank-you-listing').modal('show');
            $('.listing-alert-6').append('<li> Hosting Preference: Save Sucessfully </li>').show().delay(2000).hide(500);
            $('.listing-alert-6').addClass('alert-success').removeClass('alert-danger');

            current_fs = $("#btn-bd-hosting-save-submit").parent().parent().parent();
            next_fs = current_fs.next();
            $(".prev").css({ 'display': 'block' });

            $('.card2').hide();
            $('#listing-step-6').show();


            var active = jQuery('.building-info #progressbar .active').length ;
            if(active > 5){
             console.log('submit post');
             //submitForReview(); //5
            }
            $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");

            //timoutsubmit();
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
            $('#hosting-info-errors').html('');
            $('.listing-alert-6').append('<li> Hosting Preference: ' +  errors.message + '</li>');
            $('.listing-alert-6').show().addClass('alert-danger').removeClass('alert-success');
            $('html, body').animate({scrollTop: '0px'}, 0);
        }
    });
}





