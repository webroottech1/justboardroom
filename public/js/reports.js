// $(document).ready(function () {
//     $('#rug-sel').change(function() {
//         reportQueryString();
//     });


//     // $('#mbs-sel').change(function() {
//     //      reportQueryString();
//     //      alert("Alert");
//     //  });
    
// });

// function reportQueryString(){
//     // var month =  $("#mbs-sel option:selected").val();
//     var bd_id = $("#rug-sel option:selected").val();
        
//     var params = { 'bd_id':bd_id };
//     window.location.href  =  window.location.origin + window.location.pathname + '?' + jQuery.param(params);
// }



$(document).ready(function () {
$('#mbs-sel').change(function () {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    var headers = {
        "Access-Control-Allow-Origin": "*",
        'Authorization': `Bearer ${cookieValue}`,
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }

    var bd_id = $("#rug-sel option:selected").val();
    var text = $(this).find('option:selected').val();

   

    $.ajax({
        url: '/reportMonth',
        type: 'GET',
        contentType: "application/json; charset=utf-8",
        headers: headers,
        dataType: 'json',
        data: {
            text:text,
            bd_id : bd_id,
         
         
        },
        success: function (response) {
            $('.mbs-data-unique').text('');
            $('.mbs-data-uniqueAjax').text('');

            console.log( JSON.stringify(response) );
            // // alert(data);
            jQuery.each(response.data, function(index, val){
            // $.each(data.data, function(index, val){
                console.log (val.totalBooking );
            // $( "li" ).each(function( index ) {
                var tr_str = 
                "<tr>"+
                    "<td >" + val.monthname + "</td>" +
                    "<td >" + val.totalBooking + "</td>" +
                    "<td > $" + val.totalSalesPrice + "</td>" +
                    "<td > $" + val.totalPaidToHost + "</td>";
                    "</tr>";
            $('.mbs-data-uniqueAjax').append(tr_str);
              });


           
            
        },
    
    });
  });
});




$(document).ready(function () {
    $('#rug-sel').change(function () {
        var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)access_token\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    
        var headers = {
            "Access-Control-Allow-Origin": "*",
            'Authorization': `Bearer ${cookieValue}`,
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    
        var bd_id = $("#rug-sel option:selected").val();
        var text = $(this).find('option:selected').val();
        var html='';
        $.ajax({
            url: '/reportMonth',
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            headers: headers,
            dataType: 'json',
            data: {
                text:text,
                bd_id : bd_id,
            },
            success: function (data) {
                $("body .graphbookingaxis").empty()
                $("body .graphmonthaxis").empty()
                $("#listBoardroom").empty()
                
                // $('.graphbookingaxis').text('');
             
                console.log(data.graphmonthaxis);
                var tr_str = 
                graphmonthaxis = data.graphmonthaxis;
                graphbookingaxis = data.graphbookingaxis;
                boardrooms = data.boardrooms;
                ttlview = data.ttlview;
             
              
               
                jQuery.each(data.boardrooms, function(index, list){
                   if(bd_id == 0){
                   
                      boardroom += "<div class='rug-bd bd-"+ list.id+"' id='"+list.id+"'> <span>"+list.name+"</span></div>";
            //    boardroom = list.name;
                  $('#listBoardroom').html(boardroom);       
                   }else {
                    if (bd_id == list.id){
                   boardroom =  "<div class='rug-bd bd-"+list.id+"' id="+list.id+"> <span>"+list.name+"</span></div>";
                    // boardroom = list.name; 
                    $('#listBoardroom').html(boardroom);
                }
                }
 
            });

            $('.mbs-data-unique').text('');
            $('.mbs-data-uniqueAjax').text('');

            console.log( JSON.stringify(data) );
            // // alert(data);
            jQuery.each(data.data, function(index, val){
            // $.each(data.data, function(index, val){
                // console.log (val.totalBooking );
            // $( "li" ).each(function( index ) {
                var tr_str = 
                "<tr>"+
                    "<td >" + val.monthname + "</td>" +
                    "<td >" + val.totalBooking + "</td>" +
                    "<td > $" + val.totalSalesPrice + "</td>" +
                    "<td > $" + val.totalPaidToHost + "</td>";
                    "</tr>";
            $('.mbs-data-uniqueAjax').append(tr_str);
              });
              
               totalView = "Total Views: "+ttlview;
                $('body .sss').html(totalView);
                $('body .graphmonthaxis').html(graphmonthaxis);
                $('body .graphbookingaxis').html(graphbookingaxis);
           
            },
        
        });
      });
    });