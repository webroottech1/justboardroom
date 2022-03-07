$(document).ready(function () {
    $('#rug-sel').change(function() {
        reportQueryString();
    });


    $('#mbs-sel').change(function() {
         reportQueryString();
     });
    
});

function reportQueryString(){
    var month =  $("#mbs-sel option:selected").val();
    var bd_id = $("#rug-sel option:selected").val();

    var params = { 'bd_id':bd_id , 'month':month, };
    window.location.href  =  window.location.origin + window.location.pathname + '?' + jQuery.param(params);
}