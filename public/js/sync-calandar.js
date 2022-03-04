$(document).ready(function () {
    $synCal = jQuery("input[name='synccalendar']");
    $synCal.change(function() {
        var synccalval  = jQuery("input[name='synccalendar']:checked").val();
        if(synccalval == 'synccalendaryes'){
            console.log('cal sync');
            $('#calendar-sync').modal('show');

        }
        else{
            $('#calendar-sync').modal('hide');

        }
    });

    $("#calendar-yes").click(function (event) {
        $('#calendar-sync').modal('hide');
    });

});

function syncCalender(){

    $(document).ready(function () {
        current_fs = $("#btn-bd-calendar").parent().parent().parent();
        next_fs = current_fs.next();
        $(".prev").css({ 'display': 'block' });
        $('.card2').removeClass("show");
        $('.hosting-arrangements').addClass('show');
        timoutsubmit();
        var active = jQuery('.building-info #progressbar .active').length ;
        if(active > 5){
            submitForReview(); //6
        }
        $("#progressbar li").eq($(".card2").index(next_fs)).addClass("active");
    });}