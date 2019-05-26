$('#upd-akun').click(function () {
    document.getElementById('form-akun').style.display = "block";
});

// $('#form-upd').submit(function(e){
//     e.preventDefault();     
//     var string = $(this).serialize();
    
//     $.ajax({
//         type: 'POST',
//         url: $(this).attr('action') + "/update_user",
//         data: string,
//         cache: false,
//         success: function(data) {
//             swal("Updated", "Informasi akun berhasil diupdate", "success");
//             // location.reload();
//         },
//         error: function() {
//             swal("Failed", "Informasi akun gagal diupdate", "error");
//         }
//     });
//     $.ajax({
//         url: $(this).attr('action') + "/upload_foto",
//         type: 'POST',
//         data: new FormData(this),
//         processData: false,
//         contentType: false,
//         cache: false,
//         async: false,
//         success: function(data) {
//             // alert("Upload Image Berhasil.");
//         }
//     });
//     return false;
// });