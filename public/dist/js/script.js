$(function () {

    // JS SCHEDULE
    $('.addDataSchedule').on('click', function () {
        $('#lebelModalLabel').html('Add Schedule Matkul');
        $('#buttonActionModal').html('Save');
        $('#kd_dosen').val('');
        $('#kd_matkul').val('');
        $('#ruang').val('');
        $('input[type=datetime-local]').val('');
    });

    $('.viewModalEdit').on('click', function () {
        $('#lebelModalLabel').html('Update Schedule Matkul');
        $('#buttonActionModal').html('Update');

        $('.modal-body form').attr('action', 'http://localhost/pra_ujikom_fikrimutaqin/public/schedule/updateData');

        const id = $(this).data('id');
        const url = 'http://localhost/pra_ujikom_fikrimutaqin/public/schedule/getSingelData';

        $.ajax({
            url: url,
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#kd_dosen').val(data.kd_dosen).change();
                $('#kd_matkul').val(data.kd_matkul).change();
                $('#ruang').val(data.ruang);
                $('input[type=datetime-local]').val(new Date(data.waktu).toJSON().slice(0, 19));
                $('#id').val(data.id);
            }
        });

    });

    //JS DOSEN

    $('.addDataDosen').on('click', function () {
        $('#lebelModalLabel').html('Add Data Dosen');
        $('#buttonActionModal').html('Save');
        $('#kd_dosen').val('');
        $('#namadosen').val('');
        $('#alamatdosen').val('');
    });

    $('.viewModalEditDosen').on('click', function () {
        $('#lebelModalLabel').html('Update Data Dosen');
        $('#buttonActionModal').html('Update');

        $('.dosen form').attr('action', 'http://localhost/pra_ujikom_fikrimutaqin/public/dosen/updateData');
        const kd_dosen = $(this).data('id');
        const url = 'http://localhost/pra_ujikom_fikrimutaqin/public/dosen/getSingelData';

        $.ajax({
            url: url,
            data: { kd_dosen: kd_dosen },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#namadosen').val(data.nama);
                $('#alamatdosen').val(data.alamat);
                $('#id').val(data.kd_dosen);
            }
        });

    });

    //JS DOSEN

    $('.addDataMatkul').on('click', function () {
        $('#lebelModalLabel').html('Add Data Matakuliah');
        $('#buttonActionModal').html('Save');
        $('#kd_matkul').val('');
        $('#sksmatkul').val('');
        $('#namamatkul').val('');
    });

    $('.viewModalEditMatkul').on('click', function () {
        $('#lebelModalLabel').html('Update Data Matakuliah');
        $('#buttonActionModal').html('Update');

        $('.matkul form').attr('action', 'http://localhost/pra_ujikom_fikrimutaqin/public/matakuliah/updateData');
        const kd_matkul = $(this).data('id');
        const url = 'http://localhost/pra_ujikom_fikrimutaqin/public/matakuliah/getSingelData';

        $.ajax({
            url: url,
            data: { kd_matkul: kd_matkul },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#namamatkul').val(data.nama);
                $('#sksmatkul').val(data.sks);
                $('#id').val(data.kd_matkul);
            }
        });

    });


});