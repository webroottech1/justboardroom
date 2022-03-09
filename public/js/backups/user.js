$(document).ready(function () {
    $("#error-bag").hide();
    $("#success-bag").hide();

    /**
     * This is to activate or disable account login
     */
    $(".account-login").on('click',(function(e){
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }        
        e.preventDefault();

        var isDisabled = $(this).attr('is-disabled'); 
        var userId = $(this).attr('user-id'); 

        $.ajax({
            url: '/api/users/accountLogin/'+userId,
            type: 'POST',
            headers: headers,
            data: {
                id: userId,
                isDisabled:isDisabled
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $("#error-bag").hide();
                $('#notif-success').append('<li>' + data.success + '</li>');
                $("#success-bag").show();
                window.location.reload();
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                if (errors.error){
                    $.each(errors.error, function (key, value) {
                        $('#notif-errors').append('<li>' + value + '</li>');
                    });
                }
                $('#notif-errors').show().addClass('alert-danger').removeClass('alert-success');

                $("#error-bag").show();    
                $('html, body').animate({scrollTop: '0px'}, 0);        
            }
        });
    }));

});