$(document).ready(function () {

    $("#add-error-bag").hide();

    $("#btn-login").click(function (event) {
        event.preventDefault();
        var headers = {
            "Access-Control-Allow-Origin": "*",
        }
        $.ajax({
            url: '/api/login',
            type: 'POST',
            headers: headers,
            data: {
                email: $("#ltnw-login input[name=emaillist]").val(),
                password: $("#ltnw-login input[name=pwd]").val(),
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $('#ltnw-login').trigger("reset");
                $("#ltnw-login .close").click();
                document.cookie = 'access_token=' + data.success.token;
                window.location.href = `/api/dashboard`;
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $('.alert-login-forms').html('');
                $('.alert-register-forms').html('');
                $('.alert-login-forms').html('<div class="alert alert-warning alert-dismissible fade show pb-0"><button type="button" class="close" data-dismiss="alert">&times;</button>');
                $('.alert-login-forms').append('</div>');
                $('.alert.alert-warning').append('<ul class="login-forms"></ul>');
                $.each(errors.error, function (key, value) {
                    $('.alert.alert-warning ul').append('<li>'+value+'</li>');
                });
                $(".alert-login-forms").show();
                $('html, body').animate({scrollTop: '0px'}, 0);
            }
        });

    });
    $("#btn-register").click(function (event) {
        event.preventDefault();
        var headers = {
            "Access-Control-Allow-Origin": "*",
        }
        $.ajax({
            url: '/api/register',
            type: 'POST',
            headers: headers,
            data: {
                first_name: $("#ltnw-register input[name=first_name]").val(),
                last_name: $("#ltnw-register input[name=last_name]").val(),
                email: $("#ltnw-register input[name=email_register]").val(),
                password: $("#ltnw-register input[name=pwd_register]").val(),
                c_password: $("#ltnw-register input[name=c_password]").val(),
                type: "Register",
                recaptcha: $("#ltnw-register #recaptcha").val()
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $('#ltnw-register').trigger("reset");
                $("#ltnw-register .close").click();
                document.cookie = 'access_token=' + data.success.token;
                window.location.href = `/api/dashboard`;
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                $('.alert-login-forms').html('');
                $('.alert-register-forms').html('');
                $('.alert-register-forms').html('<div class="alert alert-warning alert-dismissible fade show pb-0"><button type="button" class="close" data-dismiss="alert">&times;</button>');
                $('.alert-register-forms').append('</div>');
                $('.alert.alert-warning').append('<ul class="register-forms"></ul>');
                $.each(errors.error, function (key, value) {
                    $('.alert.alert-warning ul').append('<li>'+value+'</li>');
                });
                $(".alert-register-forms").show();
            }
        });
    });

    $("#btn-accept-hosting").click(function (event) {
        event.preventDefault();
        var headers = {
            "Access-Control-Allow-Origin": "*",
        }
        $.ajax({
            url: '/api/register',
            type: 'POST',
            headers: headers,
            data: {
                first_name: $("#ltnw-register input[name=first_name]").val(),
                last_name: $("#ltnw-register input[name=last_name]").val(),
                email: $("#ltnw-register input[name=email_register]").val(),
                password: $("#ltnw-register input[name=pwd_register]").val(),
                c_password: $("#ltnw-register input[name=c_password]").val(),
                type: "check-terms"
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $('#ltnw-register').trigger("reset");
                $("#ltnw-register .close").click();
                document.cookie = 'access_token=' + data.success.token;
                window.location.href = `api/listing/address`;
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors.error);
                $('#list-register-errors').html('');
                $.each(errors.error, function (key, value) {
                    console.log(value);
                    $('#list-register-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag-register").show();
            }
        });

    });

    $("#btn-decline").click(function (event) {
        $('#terms').modal('hide');
        $("#register").modal("show");
        $("#add-error-bag-register").hide();
    });

    $('.multi-field-wrapper').each(function () {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function (e) {
            if($('.multi-field').is(":visible") == false ) {
                $('.multi-field').find('textarea').text('');
                $('.multi-field').show();   
            } else { 
                $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('textarea').val('').focus();
                $('.multi-field-wrapper').find('.multi-fields').find('.multi-field:last-child').find('#user_amen_len').text('0 / 500 CHARACTERS MAX');    
            }
        });
        $('.multi-field .remove-field', $wrapper).click(function () {
            if ($('.multi-field', $wrapper).length > 1){
                $(this).parent('.multi-field').remove();
            } else {
                $(this).parent('.multi-field').find('textarea').text('');
                $(this).parent('.multi-field').hide();
            }
        });
        var max = 500;
        var bd_desc_len = $('#bd-desc').val().length;
        $('#bd_desc_len').text(bd_desc_len + ' / ' + max +' CHARACTERS MAX');
    });

    $('#user_amen').keyup(function () {
        var max = 500;
        var len = $(this).val().length;
        var remLen =  max - len ;
        $(this).parent().find('#user_amen_len').text(len + ' / ' + max +' CHARACTERS MAX');
    });

    $('#bd-desc').keyup(function () {
        var max = 500;
        var len = $(this).val().length;
        $(this).parent().find('#bd_desc_len').text(len + ' / ' + max +' CHARACTERS MAX');
    });    
      
});




function loginForm() {
    $(document).ready(function () {
        $('#register').modal('hide');
        $('#login').modal('show');
        $('.add-error-bag').hide();
        $('.alert-register-forms').hide();
    });
}

function addLoginForm() {
    $(document).ready(function () {
        $("#add-error-bag").hide();
        $('#login').modal('show');
    });
}

function addRegisterForm() {
    $(document).ready(function () {
        $('.add-error-bag').hide();
        $('.alert-register-forms').hide();
        $('#login').modal('hide');
        $('#register').modal('show');
    });
}
function addTermsForm() {
    $("#register").modal("hide");
    $('#terms').modal('show');
}

function logout() {
    $(document).ready(function () {
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        $.ajax({
            url: '/api/logout',
            type: 'POST',
            headers: headers,
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                window.location.href = `/`;
            },
            error: function (data) {
                var errors = $.parseJSON(data.responseText);
                console.log(errors.error);

            }
        });

    });
}



