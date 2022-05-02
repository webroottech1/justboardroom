$(document).ready(function () {

    $("#index-error-bag").hide();
    var defaultValue= "all_msg";
    $("#inbox-filter").val(defaultValue);
    $('.chatReadStatus-1').hide();
    $('.chatReadStatus-0').show();
    $( ".inbox-left-wrapper" ).find('.active').removeClass('active');
    var emptychat = '<div class="bd-site-name-dummy">just Boardrooms</div><div class="empty-chatbox"><span>No Messages</span> </div>';
    $('.chat-json-wrapper-top').html(emptychat);
    $('.inbox-send-chat-wrapper').hide();
    $('.msg-contact-unique').show();
    //$('.userType-3').hide();
    $('.chatArchived-1').hide();

    $( "#inbox-filter" ).change(function() {

        var val = $(this).val();
       // $('.userType-3').hide();
        if(val == 'all_msg'){
            $('.msg-contact-unique').show();
            $('.chatArchived-1').hide();
        }
        else if(val == 'unread'){
            $('.userType-3').hide();
            $('.chatReadStatus-1').hide();
            $('.chatReadStatus-0').show();
        }

        else if(val == 'archived'){
            $('.userType-3').hide();
            $('.chatArchived-0').hide();
            $('.chatArchived-1').show();
        }
        else if(val == 'support'){
            $('.msg-contact-unique').hide();
            $('.userType-3').show();
        }
        else{
            $('.msg-contact-unique').hide();
            $('.chat-br-'+val).show();
            //$('.userType-3').hide();
        }

        $( ".inbox-left-wrapper" ).find('.active').removeClass('active');

        var emptychat = '<div class="bd-site-name-dummy">just Boardrooms</div><div class="empty-chatbox"><span>No Messages</span> </div>';
        $('.chat-json-wrapper-top').html(emptychat);
        $('.inbox-send-chat-wrapper').hide();
    });

     $("#sendComment").on('submit',(function(e){
        e.preventDefault();
        ajaxCallSaveChat();
        console.log("SUBMIT");
        var scrollHieght = $('.chat-wrapper').prop("scrollHeight");
        scrollHieght = scrollHieght * 2;

        setTimeout(function(){
            $('.chat-wrapper').scrollTop(scrollHieght);
        }, 1000);



    }));

    setInterval(function(){
        //code goes here that will be run every 5 seconds.
        var chatId = $( ".inbox-left-wrapper" ).find('.active').find('.chatId').html();
        var lastmsgId = $( ".inbox-left-wrapper" ).find('.active').find('.lastmsgId').html();

        if(chatId){
            ajaxloadchatpartial(chatId, lastmsgId );
        }
    }, 3000);

    var chatId = $('.left-msg').find('.active').find('.chatid').html();
    if(chatId){
        loadChatConversation(chatId);
    }


    $('.msg-contact-unique').click(function(e) {
        var chatId = $(this).find('.chatId').html();
        loadChatConversation(chatId);

        var chatId =  $(this).attr("class").split(' ')[3].split('-')[1]; // ChatId ID
        var myId = $(this).attr("class").split(' ')[1].split('-')[1]; // owner ID

        //msg read/unread
        $(this).removeClass('chatReadStatus-0');
        $(this).addClass('chatReadStatus-1');

        msgreadstatus(chatId, myId);
    });

});

function msgreadstatus(chatId,myId){
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
    $.ajax({
        url: '/readMessage',
        type: 'POST',
        headers: headers,
        data: {
            chat_id:chatId,
            myId:myId
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {

        },
        error: function (data) {

        }
    });
}


function loadChatConversation(chatId = null){
        $( ".msg-contact-unique" ).removeClass('active');
        $('.chatId-'+chatId).addClass('active');

        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
        $.ajax({
            url: '/getMessage',
            type: 'POST',
            headers: headers,
            data: {
                chat_id:chatId,
            },
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                    if(data.data == ''){
                        $('.chat-json-wrapper-top').find('.chat-wrapper').html('');

                        $('.inbox-send-chat-wrapper').show();
                    }
                    else{
                        if(data.firstConversation == true)
                        {
                            //$('#note-payment').modal('show');
                        }

                        $('.chat-json-wrapper-top').html(data.data);
                        $('.inbox-send-chat-wrapper').show();
                    }

            },
            error: function (data) {

            }
        });
}


function ajaxCallSaveChat(){
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
    var chatId = $( ".inbox-left-wrapper" ).find('.active').find('.chatId').html();
    var receiverId = $( ".inbox-left-wrapper" ).find('.active').find('.receiverId').html();

    $.ajax({
        url: "/saveMessage",
        type: "POST",
        headers: headers,
        data:{
            coversationId:chatId,
            receiverId:receiverId,
            message:$('#chat-message').val()
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function(data){
             var lastmsgIdold =  $( ".inbox-left-wrapper" ).find('.active').find('.lastmsgId').text();
             $( ".inbox-left-wrapper" ).find('.active').find('.lastmsgId').text(data.lastMsgId);

            // need to update last msg ID into the active tab of chat (left side)
            $('#chat-message').val('');
            ajaxloadchatpartial(chatId, lastmsgIdold);
            $("#index-error-bag").hide();
        },
        error: function(data){
            var errors = $.parseJSON(data.responseText);
            console.log(errors.error);
            $('#index-msg-errors').html('');
                $.each(errors.error, function (key, value) {
                    console.log(value);
                    $('#index-msg-errors').append('<li>' + value + '</li>');
                });
                $("#index-error-bag").show();

            }
        });
}
function archive(){
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    
    }
    var chatId = $( ".inbox-left-wrapper" ).find('.active').find('.chatId').html();
    var receiverId = $( ".inbox-left-wrapper" ).find('.active').find('.receiverId').html();

    $.ajax({
        url: "/archivedMessage",
        type: "POST",
        headers: headers,
        data:{
            coversationId:chatId,
            receiverId:receiverId
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function(data){
            if(data.archived == 1){
                window.location.href = "/inbox"; // then reload the page.(3)
            }else if(data.archived == 0){
                window.location.href = "/inbox";
            }
        },
        error: function(data){
            var errors = $.parseJSON(data.responseText);
            console.log(errors.error);
            $('#index-msg-errors').html('');
            $.each(errors.error, function (key, value) {
                console.log(value);
                $('#index-msg-errors').append('<li>' + value + '</li>');
            });
            $("#index-error-bag").show();
        }
        });
}

function ajaxloadchatpartial(chatId, lastmsgIdold){
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }

    $.ajax({
        url: '/getMessagepartial',
        type: 'POST',
        headers: headers,
        data: {
            chatId:chatId,
            lastmsgIdold:lastmsgIdold,
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {

                if(data.data == ''){

                }
                else{
                    jQuery('.inbox-right-wrapper').find('.chat-wrapper').append(data.data);
                    $( ".inbox-left-wrapper" ).find('.active').find('.lastmsgId').html(data.lastmsgId);
                }

        },
        error: function (data) {

        }
    });
}


function ajaxCallLoadChat(chatId){

    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }

    $.ajax({
        url: '/getMessage',
        type: 'POST',
        headers: headers,
        data: {
            chat_id:chatId,
        },
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {

                if(data.data == ''){
                    var emptychat = '<div class="bd-site-name-dummy">just Boardrooms</div><div class="empty-chatbox"><span>No Messages</span> </div>';
                    $('.chat-json-wrapper-top').html(emptychat);
                }
                else{
                    $('.chat-json-wrapper-top').html(data.data);
                }

        },
        error: function (data) {

        }
    });
}
