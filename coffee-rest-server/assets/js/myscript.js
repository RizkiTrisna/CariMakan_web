const flashData = $('.flash-data').data('flashdata');
const flashDataError = $('.flash-data').data('flashdatae');
const flashDataCafe = $('.flash-data').data('flashdatacafe');
const flashDataCafeError = $('.flash-data').data('flashdatacafeerror');

if (flashData) {
    Swal({
        title: 'Data User',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
} else if (flashDataError)  {
    Swal({
        title: 'Data User',
        text: 'Tidak ada yang ' + flashDataError,
        type: 'error'
    });
} else if (flashDataCafe)  {
    Swal({
        title: 'Data Cafe',
        text: 'Berhasil ' + flashDataCafe,
        type: 'success'
    });

} else if (flashDataCafeError)  {
    Swal({
        title: 'Data Cafe',
        text: 'Tidak ada yang ' + flashDataCafeError,
        type: 'error'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "data mahasiswa akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});