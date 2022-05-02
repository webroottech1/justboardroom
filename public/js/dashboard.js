$(document).ready(function () {
    $("#btn-decline-hosting-submit").click(function (event) {
        $('#agree-to-terms-modal').modal('hide');
    });
    $(".statusdots").click(function() {
        var myClass = $(this).attr("id");
        var id = myClass.replace("statusdots-", "");
        console.log(id);

        if($('.statusdots-option-'+ id).is(":visible")){
            $('.statusdots-option-'+ id).hide();
        } else{
            $('.statusdots-option-'+ id).show();
        }
        
     });
     
     $(".db-remove").click(function(){
        url = '/api/remove/listing/' + $(this).attr("id");
        $( "#dialog-remove-confirm" ).dialog({
            resizable: false,
            height: "auto",
            modal: true,
            buttons: {
              "Yes": function() {
                  window.location =  url
              },
              "No": function() {
                $( this ).dialog( "close" );  
              }
            }
        });
    });

    $("#btn-aggree-to-terms").click(function (event) {
        $('#agree-to-terms-modal').modal('show');
    });

    $("#btn-accept-terms-dashboard").click(function (event) {
        agreeToTerms();
    });    

    $( "#listing-status" ).change(function() {
        var val = $(this).val();
         var params = { 'status':val  };
         window.location.href  =  window.location.origin + window.location.pathname + '?' + jQuery.param(params);
    });

    $(".btnPost").on('click',(function(e){
        e.preventDefault();

        var conversationId = $(this).attr('conversation-id'); 
        var receiverId = $(this).attr('receiver-id'); 
        var listId = $(this).attr('list-id'); 
        var msg = $(this).parent().find('.your-comment').val();
        ajaxCallSaveRemark(conversationId, receiverId, msg, listId);
    }));

    function ajaxCallSaveRemark(conversationId, receiverId, msg, listId){
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        $.ajax({
            url: "/api/saveMessage",
            type: "POST",
            headers: headers,
            data:{
                coversationId:conversationId,
                receiverId:receiverId,
                message: msg,
                listId:listId,
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function(data){
                window.location.reload();
            },
            error: function(data){
            } 	        
            });
    }


    function agreeToTerms(){
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }
        $.ajax({
            url: '/api/users/agreeToTerms',
            type: 'POST',
            headers: headers,
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
                console.log(data);
            }
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
            $("#add-error-bag-register").hide();
            $('#login').modal('hide');
            $('#register').modal('show');
        });
    }
    function loginForm() {
        $(document).ready(function () {
            $('#register').modal('hide');
            $('#login').modal('show');
        });
    }
    function addTermsForm() {
        $("#register").modal("hide");
        $('#terms').modal('show');
    }



   

});

