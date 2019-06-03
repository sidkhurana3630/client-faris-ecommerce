$(document).ready(function () {

    $('#regform').submit(function (e) {
        e.preventDefault();
        var string = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: string,
            success: function (response) {
                if (response.error) {
                    var notice = PNotify.notice({
                        title: 'Catatan!',
                        text: response.message
                    });

                    notice.on('click', function () {
                        notice.close();
                    });
                } else {
                    swal.fire(response.message, "Silahkan cek email untuk aktivasi akun", "success");
                    document.getElementById("regform").reset();
                }                
            }
        });
    });

    $body = $("body");

    $(document).on({
        ajaxStart: function () { $body.addClass("loading"); },
        ajaxStop: function () { $body.removeClass("loading"); }
    });

});