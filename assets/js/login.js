$(document).ready(function () {

    $('#logform').submit(function (e) {
        e.preventDefault();
        var string = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: string,
            success: function (response) {
                if (response.success) {
                    var notice = PNotify.success({
                        title: 'Login Berhasil',
                        text: response.message
                    });
                    window.location = response.login;
                } else if (response.error) {
                    var notice = PNotify.notice({
                        title: 'Catatan!',
                        text: response.message
                    });
                } else {
                    var notice = PNotify.notice({
                        title: 'Catatan!',
                        text: response.message
                    });
                }                

                notice.on('click', function () {
                    notice.close();
                });
            }
        });
    });

});