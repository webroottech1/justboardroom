$(document).ready(function () {

    $('input#approval-yes').on('change', function() {
        var requestApprovalYes = jQuery('#approval-yes').is(':checked');
        if(requestApprovalYes) {
            $('input#approval-no').not(this).prop('checked', false);
        }
        else{
            $('input#approval-no').not(this).prop('checked', true);
        }
    });


    $('input#approval-no').on('change', function() {
        var requestApprovalno = jQuery('#approval-no').is(':checked');
        if(requestApprovalno) {
            $('input#approval-yes').not(this).prop('checked', false);
        }
        else{
            $('input#approval-yes').not(this).prop('checked', true);
        }
    });

    $("#request-error-bag").hide();
    $("#btn-bd-request").on("click",function (event) {
        console.log('request button click');
        event.preventDefault();
        //var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        var requestApprovalYes = jQuery('#approval-yes').is(':checked');
        var requestApprovalNo  = jQuery('#approval-no').is(':checked');

        var msg = '';
        var error = 0;

        if(requestApprovalYes == false && requestApprovalNo == false ){
            msg = '<li>Please Choose Request Booking Option</li>';
            error = 1;
        }
        else{
            error = 0;
        }

        if(error == 1){
            $(".listing-alert-7").html('');
            $('.listing-alert-7').append(msg);
            $('.listing-alert-7').show().addClass('alert-danger').removeClass('alert-success');
            return false;
        }

        // var alertdanger = jQuery( ".alert-danger:visible" ).length;
        // if(alertdanger){
        //     console.log('hetre');
        //     return false;
        // }
        // else{
        //     setInterval(function(){
        //         $(window).unbind('beforeunload');
        //     }, 1000);
        // }
        //var terms = $('#terms').val();
        submitListingForReview();
        //console.log(terms);
        /* if(terms == 1){

        }else{
            $('#hosting-submit').modal('show');
        } */
    });


    $("#listing-cancellation-policy").click(function () {
        $('#listing-cancellation').modal('show');
    });
    $("#btn-cancellation-got-it").click(function (event) {
        $('#listing-cancellation').modal('hide');
    });
    $('.modal.listing-cancellation').on('shown.bs.modal', function() {
        $(this).find('iframe').attr('src','https://api.justboardrooms.com/api-PROD/terms_host.php#hosting-cancellations')
    })

    $('.modal.hosting-submit').on('shown.bs.modal', function() {
        $(this).find('iframe').attr('src','https://api.justboardrooms.com/api-PROD/terms_host.php')
    })

});

function submitListingForReview(){
    //var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
    var requestApprovalYes = jQuery('#approval-yes').is(':checked');
    var requestApprovalNo  = jQuery('#approval-no').is(':checked');
    $.ajax({
        url: '/listing/add/request',
        type: 'POST',
        headers: headers,
        data: {
            list_id:$("#list_id").val(),
            requestApprovalYes,
            requestApprovalNo,
            terms: $('#terms').val(),
            type:'review'
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {

            /* console.log(data);
            return; */
            $(window).unbind('beforeunload');
            $('#hosting-submit').modal('hide');
            $('#thank-you-listing').modal('show');

            //timoutsubmit();
            /* Tip Box Pop Up */
            var indexbar = $('+v .card2.show').index() ;
            indexbar = indexbar + 1;
            $('.building-info .content-form .tip-box .tips-content').hide();
            $( ".building-info .content-form .tip-box .tips-content:nth-child(" + indexbar + ")" ).show();
            $( ".building-info .content-form .tip-container" ).show();
                //window.location.href = `/api/dashboard`;
        },
        error: function (data) {

            var errors = $.parseJSON(data.responseText);

        $('#request-info-errors').html('');

        if (errors.error){

            $.each(errors.error, function (key, value) {
                console.log(value)
                if(value != 'Your account is not validated.'){
                    $('.listing-alert-7').append('<li> Request Booking: ' + value + '</li>');
                } else {
                    $('.listing-alert-7').append('<li> Request Booking: ' + value + '</li>');
                    $('#error-account-verification').modal('show');
                }
            });

            $('#hosting-submit').modal('hide');
        }
        $('.listing-alert-7').show().addClass('alert-danger').removeClass('alert-success');

        }
    });

}

