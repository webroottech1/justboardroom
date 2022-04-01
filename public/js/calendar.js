$(document).ajaxComplete(function() {
  cancelbooking();
});

$(document).ready(function () {

    $(".request-decline").click(function(){
        console.log('request decline');
        //url = '/api/request/decline';
        $("#dialog-remove-request-confirm").dialog({
            resizable: false,
            height: "auto",
            modal: true,
            dialogClass: 'dialog-request-decline',
            buttons: {
              "Yes": function() {
                declineRequest();
                // setTimeout(function(){
                //     $( this ).dialog( "close" );
                // }, 1000);
              },
              "No": function() {
                $( this ).dialog( "close" );
              }
            }
        });
    });

$('.close').click(function() {
    var txt = $('.res-detail-msg').text();
    if(txt) {
        window.location.reload();
    }
});

  $(this).scrollTop(0);
  $('html, body').animate({scrollTop: '0px'}, 0);
  $( window ).load(function() {
    if($('#sessLI').val() != ''){
      $sessListId = $('#sessLI').val();
      $( "#"+$sessListId+".list-item" ).click();
    } else {
      $('.btn-view-all').click();
    }
  });


if($('#calsyncno').is(':checked')) {
	$('#syncOption').hide();
}


$('.switch-input').on('change',function(){

if($('#calsyncno').is(':checked')) {
	$('#syncOption').hide();
}else{
	$('#syncOption').show();
}




})


  $("#start_date").datepicker({
    onSelect: function(dateText) {
      if(dateText != $("#end_date").val()) {
        $(".repeat-weekly-wrapper").hide()
        $("#repeat_weekly").prop("checked", false);
      } else {
        $(".repeat-weekly-wrapper").show()
      }
    }
  });

  $("#end_date").datepicker({
    onSelect: function(dateText) {
      if(dateText != $("#start_date").val()) {
        $(".repeat-weekly-wrapper").hide()
        $("#repeat_weekly").prop("checked", false);
      } else {
        $(".repeat-weekly-wrapper").show()
      }
    }
  });

  $('.switch-input').on('click',function() {
	//alert('test');
      if($('#calsyncno').is(':checked')) {
        $.ajax({
            method: 'GET',
            url: '/api/disableGoogleSync',
            data: {},
            success: function( response ){
                //alert('asd');

                //location.reload();
		//alert('ss');
                //$('#calsyncyes').attr("disabled","disabled");
                $('#syncOption').hide();
            },
            error: function( e ) {
                console.log(e);
            }
        });
      }
  });

  $("#start_date").datepicker({
    minDate: 0
  });

  $("#end_date").datepicker({
    minDate: 0
  });
  $("#repeat_untill_date").datepicker({
    minDate: 0
  });
  $("#calendar-error-bag").hide();

   var firstChild = $('.boardroom-name-tab').find('.list-item:first-child').attr('id');;
   var hsh = window.location.hash.replace("#", "");

   if(hsh){
    var listId = hsh;
   }
   else{
    var listId = firstChild;
   }

    jQuery('.calender-listing-'+listId).addClass('active');

      // bookingCalender(listId);

      $( ".list-item" ).on( "click", function() {

        if($('#sessLI').val() != ''){
          $sessListId = $('#sessLI').val();
        } else {
          $sessListId = $( this ).attr('id');
        }

        var resync = jQuery('#btn-re-sync-google').length;
        var resyncOutlook = jQuery('#btn-re-sync-outlook').length;

        bookingCalender($sessListId);
        $( ".list-item" ).removeClass('active');
        window.location.hash = $( this ).attr('id');
        window.scrollTo(0, 0);
        $( ".btn-view-all.active" ).removeClass('active');
        $(".boardroom-cal-detail-wrapper").show();

        $('#sessLI').val("");


        if(resync == 1){
            console.log('resync here');
           // $('#resync-modal-inprogress').modal('show');
            gogResync($sessListId);
        }

        if(resyncOutlook == 1){
          console.log('resync outlook here');
         // $('#resync-modal-inprogress').modal('show');
          outlookResync($sessListId);
      }


    });



    $(".btn-view-all").on("click", function() {
      viewAllCalendar();
      $( ".list-item" ).removeClass('active');
      $(".boardroom-cal-detail-wrapper").hide();
      window.location.hash = $( this ).attr('id');
      window.scrollTo(0, 0);
    });


    $("#btn-re-sync-google").click(function(){
        listId = $('.boardroom-name-tab').find('.active').attr('id');
        gogResync(listId);
    });

    $("#btn-re-sync-outlook").click(function(){
      listId = $('.boardroom-name-tab').find('.active').attr('id');
      outlookResync(listId);
  });

    //
    $( "#start_date" ).datepicker();
    $( "#end_date" ).datepicker();
    $( "#repeat_untill_date" ).datepicker();


    $('.repeat-weekly-week-wrapper').hide();
    $('.repeat-untill').hide();

    $("#btn-reserve-br").click(function (event) {
      event.preventDefault();

      listId = $('.boardroom-name-tab').find('.active').attr('id');
      reserveBoardroom(listId);

  });

  cancelbooking();

  $("#btn-cancel-got-it").click(function (event) {
    $('#cancel-booking-modal').modal('hide');
  });

  $("#btn-resync-got-it").click(function (event) {
    $('#resync-modal-inprogress').modal('hide');
    $('#resync-modal-complete').modal('hide');
  });

  $("#btn-resync-complete-got-it").click(function (event) {
    $('#resync-modal-complete').modal('hide');
  });


  $(".message-guest").on('click',function() {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }

    var listId = $('.listing-id').val();
    var guestId = $('.guest-id').val();

    $.ajax({
        url: '/initiateMsgToGuest',
        type: 'POST',
        headers: headers,
        dataType: 'json',
        data: {
          listId:listId,
          guestId:guestId
        },
        crossDomain: true,
        timeout: 86400,
        success: function (response,data) {
            console.log(response.receiver_id, response.listing_id);
            //window.location.href = `/api/inbox`;
            //return;
            window.location.href = `/inbox?receiver_id=` + response.receiver_id + '&listing_id='+ response.listing_id;
        },
        error: function (data) {
          var errors = $.parseJSON(data.responseText);
          if (errors.error){
            $.each(errors.error, function (key, value) {
            });
          } else {
          }
        }
    });
  });

  $(".request-approve").click(function() {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
    }

    var paymentId = $('.payment-id').val();
    var bookingId = $('.booking-id').val();

    $.ajax({
        url: '/api/request/approve',
        type: 'POST',
        headers: headers,
        dataType: 'json',
        data: {
            paymentId:paymentId,
            bookingId:bookingId
        },
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            if (data.msg){
              $('.res-detail-msg').html(data.msg).addClass('alert-success').removeClass('alert-danger');
            } else {
            }
        },
        error: function (data) {
            var errors = $.parseJSON(data.responseText);
            console.log(errors);
            if (errors.error){
                $('.res-detail-msg').html(errors.error ).addClass('alert-danger').removeClass('alert-success');

               // $('.reservation-details').after('<div class="alert-danger justify-content-center">' + errors.error +'</div>').remove(500);
            }
        }
    });
  });


});

function gogResync(sessListId){
    var headers = {
        "Access-Control-Allow-Origin": "*",
    }
    $.ajax({
        url: '/api/calendarSyncing',
        type: 'GET',
        headers: headers,
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            bookingCalender($sessListId);
        },
        error: function (data) {
        }
    });
}

function outlookResync(sessListId){
  var headers = {
      "Access-Control-Allow-Origin": "*",
  }
  $.ajax({
      url: '/api/outlookSync',
      type: 'GET',
      headers: headers,
      dataType: 'json',
      crossDomain: true,
      timeout: 86400,
      success: function (data) {

          bookingCalender($sessListId);
      },
      error: function (data) {
      }
  });
}

function declineRequest(){
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");

        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
        }

        var paymentId = $('.payment-id').val();
        var bookingId = $('.booking-id').val();

        $.ajax({
            url: '/api/request/decline',
            type: 'POST',
            headers: headers,
            dataType: 'json',
            data: {
                paymentId:paymentId,
                bookingId:bookingId
            },
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                if (data.msg){
                    $('.res-detail-msg').html(data.msg).addClass('alert-success').removeClass('alert-danger');
                }
                $( '.ui-dialog-titlebar-close' ).click();
            },
            error: function (data) {
              var errors = $.parseJSON(data.responseText);
              if (errors.error){
                $('.res-detail-msg').html(errors.error ).addClass('alert-danger').removeClass('alert-success');
                //$('.reservation-details').after('<div class="alert-danger justify-content-center">' + errors.error +'</div>').remove(500);
              }
              $( '.ui-dialog-titlebar-close' ).click();

            }
        });

    }

function showCancelModal(){
  $('#cancel-booking-modal').modal('show');
}

function reserveBoardroom(listId){

  var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");

      var headers = {
          "Access-Control-Allow-Origin": "*",
          'Authorization': `Bearer ${cookieValue}`,
      }
      var startDate = $('#start_date').val();
      var end_date   = $('#end_date').val();
      var start_hour = $('#start-time').val();
      var end_hour   = $('#end-time').val();
      var weekly = document.getElementById('repeat_weekly');
      if ( weekly.checked ) {
        var repeat_check = 1;
        var days = [];

        $.each($("input[name='weekly-check']:checked"), function () {
            days.push($(this).val());

        });
        var repeat_until = $('#repeat_untill_date').val();
      } else {

      }

      if($("#repeat_weekly").is(':checked')) {
        if($("#repeat_untill_date").val() == "") {
          $('#calendar-errors').html('');
          $('#calendar-errors').append('<li>Repeat Until field is required</li>');
          $("#calendar-error-bag").show();
          return;
        }
      }

      $.ajax({
          url: '/listing/'+listId+ '/reserve/boardroom',
          type: 'POST',
          headers: headers,
          data: {
              list_id:listId,
              start_date:startDate,
              end_date:end_date,
              start_hour:start_hour,
              end_hour:end_hour,
              repeat_check:repeat_check,
              days:days,
              repeat_until:repeat_until
          },
          dataType: 'json',
          crossDomain: true,
          timeout: 86400,
          success: function (data) {
              window.location.href = `/api/listing/Calendar`;
          },
          error: function (data) {
            var errors = $.parseJSON(data.responseText);

            $('#calendar-errors').html('');

            if (errors.error){
              $.each(errors.error, function (key, value) {

                  $('#calendar-errors').append('<li>' + value + '</li>');
              });
          }
          else{
              $('#calendar-errors').append('<li>' + errors.hourError + '</li>');
          }

            $("#calendar-error-bag").show();
          }
      });


}
function repeatWeekly(){
  var weekly = document.getElementById('repeat_weekly');
    if ( weekly.checked ) {
      $('.repeat-weekly-week-wrapper').slideDown("slow");
      $('.repeat-untill').slideDown("slow");
    } else {
      $('.repeat-weekly-week-wrapper').slideUp("slow");
      $('.repeat-untill').slideUp("slow");
    }
}

function viewAllCalendar(){
  var events = [];
  $.ajax({
      url: '/listing/bookings',
      type: 'GET',

      dataType: 'json',
      crossDomain: true,
      timeout: 86400,
      success: function (data) {
          $('.availability-text').text('');
          $.each(data.data, function(index, val){
              console.log(val);
              events.push({
                  start: new Date(val['y'],val['m'],val['d'],val['start_hour'],val['start_min']),
                  end: new Date(val['y'],val['m'],val['d'],val['end_hour'], val['end_min']),
                  color:val['color'],
                  allDay: false,
                  title: val['title'],
                  sdate: val['sdate'],
                  edate: val['edate'],
                  shour: val['shour'],
                  ehour: val['ehour'],
                  building_name: val['building_name'],
                  room_name: val['room_name'],
                  meeting_id: val['meeting_id'],
                  guest_name: val['guest_name'],
                  guest_id: val['guest_id'],
                  listing_id: val['listing_id'],
                  booking_type: val['booking_type'],
                  payment_id:val['payment_id'],
                  booking_id:val['booking_id']
              });
          })
          $('.btn-view-all').addClass('active');
          GenerateCalendar(events);

      },
      error: function (data) {

      }
  });

}


function bookingCalender(listId){
    var events = [];
    $.ajax({
        url: '/listing/'+listId+'/bookings',
        type: 'GET',
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
            $('.availability-text').text('');
            $.each(data.data, function(index, val){
                events.push({
                    start: new Date(val['y'],val['m'],val['d'],val['start_hour'],val['start_min']),
                    end: new Date(val['y'],val['m'],val['d'],val['end_hour'], val['end_min']),
                    color:val['color'],
                    allDay: false,
                    title: val['title'],
                    sdate: val['sdate'],
                    edate: val['edate'],
                    shour: val['shour'],
                    ehour: val['ehour'],
                    building_name: val['building_name'],
                    room_name: val['room_name'],
                    meeting_id: val['meeting_id'],
                    guest_name: val['guest_name'],
                    guest_id: val['guest_id'],
                    listing_id: val['listing_id'],
                    booking_type: val['booking_type'],
                    payment_id:val['payment_id'],
                    booking_id:val['booking_id']
                });
            })
            $('.list-item-'+listId).addClass('active');
            console.log(data);
            var obj = JSON.parse(data.timeAvailability);
            $.each(obj, function(index, val){
              if(val != '0-0'){
                $('.availability-text').append(index + ':' + val + ' | ');
              }
            });
            GenerateCalendar(events);
            bookingDetails(listId);

        },
        error: function (data) {

        }
    });

        // page is now ready, initialize the calendar...

}


function GenerateCalendar(events){
    $('#calendar').fullCalendar('destroy');
    $('#calendar').fullCalendar({
      timeFormat:'h(:mm)a',
      displayEventEnd: true,
      eventLimit: true,
      eventLimitText: "more",
      nextDayThreshold: '00:00:00', // 9am
      views: {
        month: {
          eventLimit: 5
        },
      },
      header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
      },
      eventColor: '#FF671D',
      eventTextColor: 'white',
      events: events,
      eventClick: function(info) {
        console.log(events);
        $('.details.bname').text(info.building_name);
        $('.details.rname').text(info.room_name);
        $('.details.meeting-id').text(info.meeting_id);
        $('.details.date').text(info.sdate + " - " + info.edate);
        $('.details.time').text(info.shour + " - " + info.ehour);
        $('.details.gname').text(info.guest_name);
        $('.guest-id').val(info.guest_id);
        $('.listing-id').val(info.listing_id);
        $('.payment-id').val(info.payment_id);
        $('.booking-id').val(info.booking_id);
        if(info.booking_type == 1){
            $('.btn-msg-guest').hide();
            $('.btn-req-approve').hide();
            $('.btn-req-decline').hide();
        }else if(info.booking_type == 2){
          $('.btn-msg-guest').show();
          $('.btn-req-approve').show().addClass('width50');
          $('.btn-req-decline').show().addClass('width50');
        }else{
            $('.btn-msg-guest').show().addClass('width100');
            $('.btn-req-approve').hide();
            $('.btn-req-decline').hide();
        }



        $('.res-detail-msg').html('');
        $('#reservation-details').modal('show');
      }
    });

    window.scrollTo(0, 0);
  }

  function bookingDetails(listId){
    $.ajax({
        url: '/listing/'+listId+'/booking/details',
        type: 'GET',
        dataType: 'json',
        crossDomain: true,
        timeout: 86400,
        success: function (data) {
           $('.bd-booking-data-wrapper').html(data.data);
           $('.boardroom-cal-detail-wrapper').find('.bd-name').text(jQuery('.boardroom-name-tab').find('.active').text());
        },
        error: function (data) {

        }
    });

  }


  function cancelbooking(){

   $('.cancelbooking').click(function () {
    $('#calendar-remove-modal').modal('show');
  });

  $("#cancel-yes").click(function (event) {
    $('#calendar-remove-modal').modal('hide');
});
  }
