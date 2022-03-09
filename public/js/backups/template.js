$(document).ready(function () {
    $("#host-email-template").change(function() {
        var val = $(this).val();
        $.ajax({
            url: '/api/template/'+ val + '/getSubjectBody',
            type: 'GET',
            dataType: 'json',
            crossDomain: true,
            timeout: 86400,
            success: function (data) {
                $('#email-subject').val(data.data.subject);
                $('#email-body').val(data.data.body);

            },
            error: function (data) {

            }
        });

    });

});


