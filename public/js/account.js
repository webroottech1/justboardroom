function settingPage(tabname){
    if(tabname == 'setting'){
        jQuery('.edit-settings-link').hide();
        jQuery('.edit-account-info-link').show();
        jQuery('.setting-tab').show();
        jQuery('.profile-payment-tab').hide();
        jQuery('.setting-text-header').show();
        jQuery('.account-text-header').hide();
        window.location.hash = tabname;
    }


}


function openProfilePayment(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    var profilepage = $('#' + cityName).length;
    
    if(profilepage){
        document.getElementById(cityName).style.display = "block";
    }

    window.location.hash = cityName;
    window.scrollTo(0, 0); 
    $('.' + cityName + '-tab').addClass('active');
    $('html, body').animate({scrollTop: '0px'}, 0);
  }
  $(document).ready(function () {

    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
    }    
        $.ajax({
        url: "/json/states",
            headers: headers,
        }).done(function(response) {
            var $parseJSON = JSON.parse(response.data);
            var text = "";
            var value = "";
            $('#province').empty(); 
            $.each($parseJSON, function(key, val){
                $.each(val, function(key1, val1){
                    if(val1.abbreviation == $("#country").val() ){
                        $.each(val1.states, function(k, statesData){
                            var isSelected = false;
                            if(statesData.abbreviation == $("#selected-province").val() ) {
                                isSelected = true;
                            }
                            $('#province').append($('<option>', {value:statesData.abbreviation, text:statesData.name, selected: isSelected}));
                        });                  
                    }
                });
            });
            
            $('#payment_province').empty(); 
            $.each($parseJSON, function(key, val){
                $.each(val, function(key1, val1){
                    if(val1.abbreviation == $("#payment_country").val() ){
                        $.each(val1.states, function(k, statesData){
                            var isSelected = false;
                            if(statesData.abbreviation == $("#payment-selected-province").val() ) {
                                isSelected = true;
                            }
                            $('#payment_province').append($('<option>', {value:statesData.abbreviation, text:statesData.name, selected: isSelected}));
                        });                  
                    }
                });
            });
        });
      
        $("#change-error-bag").hide();
        $('#change-password-bag').hide();
        $("#profile-error-bag").hide();
        $("#payment-error-bag").hide();
        $("#profile-success-bag").hide();
        $("#payment-success-bag").hide();
        jQuery('.setting-tab').hide();
        jQuery('#paymentmethod').hide();


        jQuery('.edit-settings-link').click(function() {
                settingPage('setting');
         });

         jQuery('.header-account-link').click(function() {
            setInterval(function(){  window.location.reload(); }, 1000);
        });


    $('#country').change(function() {
        
        $('#province').empty(); 

        $.ajax({
        url: "/json/states",
            headers: headers,
        }).done(function(response) {
            var $parseJSON = JSON.parse(response.data);
            var text = "";
            var value = "";
            $.each($parseJSON, function(key, val){
                $.each(val, function(key1, val1){
                    if(val1.abbreviation == $("#country").val() ){
                        $.each(val1.states, function(k, statesData){
                            var isSelected = false;
                            if(statesData.abbreviation == $("#selected-province").val() ) {
                                isSelected = true;
                            }
                            $('#province').append($('<option>', {value:statesData.abbreviation, text:statesData.name, selected: isSelected}));
                        });                    
                    }
                });
            });
        });
    });

    $('#payment_country').change(function() {
        
        $('#payment_province').empty(); 

        $.ajax({
        url: "/json/states",
            headers: headers,
        }).done(function(response) {
            var $parseJSON = JSON.parse(response.data);
            var text = "";
            var value = "";
            $.each($parseJSON, function(key, val){
                $.each(val, function(key1, val1){
                    if(val1.abbreviation == $("#payment_country").val() ){
                        $.each(val1.states, function(k, statesData){
                            var isSelected = false;
                            if(statesData.abbreviation == $("#payment-selected-province").val() ) {
                                isSelected = true;
                            }
                            $('#payment_province').append($('<option>', {value:statesData.abbreviation, text:statesData.name, selected: isSelected}));
                        });                    
                    }
                });
            });
        });
    });

    jQuery('.edit-account-info-link').click(function() {
        jQuery('.edit-settings-link').show();
        jQuery('.edit-account-info-link').hide();
        jQuery('.setting-tab').hide();
        jQuery('.profile-payment-tab').show();   
        jQuery('.setting-text-header').hide();
        jQuery('.account-text-header').show();    
    });

    settingPage(window.location.hash.replace("#", ""));
    openProfilePayment('event', window.location.hash.replace("#", ""));
    UserProfilePaymentUpdate();

    $("#btn-profile-payment-save").click(function (event) {
        profilesave();
        profilepaymentsave();
        setInterval(function(){ 
            var profile = jQuery('#profile-success-bag').is(":visible");
            var payment =  jQuery('#payment-success-bag').is(":visible"); 

            if(profile && payment){
                $(window).unbind('beforeunload');
                window.location.reload();
            }
        }, 1000);
    });
    
    //update photo func
    $(".up-add-photo").click(function (event) {
        $("#image-selecter").click();
    });

    //update photo func
    $(".up-update-photo").click(function (event) {
        $("#image-selecter").click();
    });

    // profile photo auto uplaod
    $("#image-selecter").change(function () {
        $( "#uploadForm" ).submit();
    });

    $(".email-change-link").click(function (event) {
        
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        var emailText = $('#email').val()
        $.ajax({
            url: "/api/changeEmail",
            type: "POST",
            headers: headers,
            data:{
                email:emailText,
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function(data){
                window.location.reload();
            },
            error: function(data){
                var errors = $.parseJSON(data.responseText);
                
                $('#change-info-errors').html('');

                if (errors.error){
                    $.each(errors.error, function (key, value) {
                        
                        $('#change-info-errors').append('<li>' + value + '</li>');
                    });
                }
                $("#change-error-bag").show();
                $('html, body').animate({scrollTop: '0px'}, 0);
            } 	        
            });
    });

    $(".password-change-link").click(function (event) {
        
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        var pass = $('#pwd').val()
        $.ajax({
            url: "/api/changePassword",
            type: "POST",
            headers: headers,
            data:{
                password:pass,
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function(data){
                $("#change-error-bag").hide();
                $('#change-password-success').html('');
                $('#change-password-success').append('<li>' + data.message + '</li>');
                $("#change-password-bag").show();
            },
            error: function(data){
                var errors = $.parseJSON(data.responseText);
                
                $('#change-info-errors').html('');

                if (errors.error){
                    $.each(errors.error, function (key, value) {
                        $('#change-info-errors').append('<li>' + value + '</li>');
                    });
                }
                $("#change-error-bag").show();
            } 	        
            });
    });

    $("#uploadForm").on('submit',(function(e){
        e.preventDefault();
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        var imageSelecter = document.getElementById("image-selecter"),
		file = imageSelecter.files[0];
        var formData = new FormData();
	    formData.append("image", file);
        $.ajax({
        url: "/api/listing/upload/picture",
        type: "POST",
        headers: headers,
        data:formData,
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        processData: false,
        contentType: false,
        success: function(data){
            window.location.reload();
        },
        error: function(data){
            var errors = $.parseJSON(data.responseText);
                
                $('#change-info-errors').html('');

                if (errors.error){
                    $.each(errors.error, function (key, value) {
                        
                        $('#change-info-errors').append('<li>' + value + '</li>');
                    });
                }
                $("#change-error-bag").show();
        } 	        
        });
    }));
    

    paymentadresupadte();
    $('#profile-adrs').change(function() {
        var isChecked = $(this).is(':checked');
        
        if(isChecked) {
            var $country = $('#country').val();
            var $province = $('#province').val();
            $('#payment_address').val($("#address").val()).prop("readonly",true);
            $('#payment_city').val($("#city").val()).prop("readonly",true);
            $('#payment_country').val($("#country").val()).prop("readonly",true);
            $("#payment_country option[value="+$country+"]").attr('selected', 'selected');
            $("#payment_province option:selected").text($("#province option:selected").text());
            $("#payment_province option[value="+$province+"]").attr('selected', 'selected');
            $('#payment_postal_code').val($("#postal_code").val()).prop("readonly",true);
        }else {
            $('#payment_address').val("").prop("readonly",false);
            $('#payment_city').val("").prop("readonly",false);
            $('#payment_country').val("").val().prop("readonly",true);
            $('#payment_province').val("").prop("readonly",false);
            $('#payment_postal_code').val("").prop("readonly",false);
        }
    });
  });



  function paymentadresupadte(){
    var checked = $('#profile-adrs').prop('checked');
    if(checked){

        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        
        event.preventDefault();
        $.ajax({
            url: '/api/listing/get/userInfo',
            type: 'get',
            headers: headers,
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $('#payment_address').val(data.data.address).prop("readonly",true);
                $('#payment_city').val(data.data.city).prop("readonly",true);
                $('#payment_country').val(data.data.country).prop("readonly",true);
                $('#payment_province').val(data.data.province).prop("readonly",true);
                $('#payment_postal_code').val(data.data.postal_code).prop("readonly",true);
            },
            error: function (data) {
                $('#payment_address').prop("readonly",false);
                $('#payment_city').prop("readonly",false);
                $('#payment_country').prop("readonly",false);
                $('#payment_province').prop("readonly",false);
                $('#payment_postal_code').prop("readonly",false);
            }
        });
       
    }
    else{
        $('#payment_address').prop("readonly",false);
        $('#payment_city').prop("readonly",false);
        $('#payment_country').prop("readonly",false);
        $('#payment_province').prop("readonly",false);
        $('#payment_postal_code').prop("readonly",false);
    }
  }
  function profilesave() {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
    }
    var current_fs, next_fs, previous_fs;
    $.ajax({
        url: '/api/listing/add/userInfo',
        type: 'POST',
        headers: headers,
        data: {
            first_name: $("#first-name").val(),
            last_name: $("#last-name").val(),
            company: $("#company").val(),
            tax_id: $("#tax_id").val(),
            title: $("#title").val(),
            phone: $("#phone").val(),
            address: $("#address").val(),
            city: $("#city").val(),
            country: $("#country").val(),
            province: $("#province").val(),
            postal_code: $("#postal_code").val(),
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            $("#profile-error-bag").hide();
            
            $('#profile-success').html('');
            $('#profile-success').append('<li>' + data.success + '</li>');
            $("#profile-success-bag").show();
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            
            $('#profile-info-errors').html('');

            if (errors.error){
                $.each(errors.error, function (key, value) {
                    
                    $('#profile-info-errors').append('<li>Profile Tab: ' + value + '</li>');
                });
            }
            $("#profile-error-bag").show();
            $("#profile-success-bag").hide();
        }
    });
  }

   // save payment info ajax
   function profilepaymentsave() {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
    }
    var current_fs, next_fs, previous_fs;
    event.preventDefault();
    $.ajax({
        url: '/api/listing/add/user/payment',
        type: 'POST',
        headers: headers,
        data: {
            payee: $("#payee").val(),
            profile_address:$('#profile-adrs').is(':checked'),
            payment_address: $("#payment_address").val(),
            payment_city: $("#payment_city").val(),
            payment_country: $("#payment_country").val(),
            payment_province: $("#payment_province").val(),
            payment_postal_code: $("#payment_postal_code").val(),
        },  
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            $("#payment-error-bag").hide();
            $('#payment-success').html('');
            $('#payment-success').append('<li>' + data.success + '</li>');
            $("#payment-success-bag").show();
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            
            $('#payment-info-errors').html('');

            if (errors.error){
                $.each(errors.error, function (key, value) {
                    $('#payment-info-errors').append('<li>Payment tab: ' + value + '</li>');
                });
            }
            $("#payment-error-bag").show();
        }
    });
}
function UserProfilePaymentUpdate(){
var UserProfileChanged=false;
$('.profile-payment-tab input').change(function() { 
    UserProfileChanged = true; 
}); 
$(window).bind('beforeunload', function(e){
    if(UserProfileChanged)
        return e.originalEvent.returnValue = "Your message here";
    else 
        e=null; // i.e; if form state change show warning box, else don't show it.
});


}