$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#formlModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    })

    $('.tampilModalUbah').on('click', function () {
        $('#formlModalLabel').html('Ubah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/php/wpu-php-mvc/public/mahasiswa/ubah');
    });

    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/php/wpu-php-mvc/public/mahasiswa/getubah',
        data: { id: id },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            $('#nama').val(data.nama);
            $('#npm').val(data.npm);
            $('#email').val(data.email);
            $('#jurusan').val(data.jurusan);
        }
    });

});