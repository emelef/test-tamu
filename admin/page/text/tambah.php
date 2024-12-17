<div class="row">
    <div class="col-md-6">
        <!-- Form Elements -->
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                Tambah Keperluan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST" enctype="multipart/form-data">


                            <div class="form-group">
                                <label>Keperluan :</label>
                                <textarea class="form-control" rows="3" name="judul" id="judul"></textarea>
                            </div>


                            <input type="submit" style="margin-left: 10px;" name="simpan" value="Simpan"
                                   class="btn btn-success">
                            <input type=button value=Kembali onclick=self.history.back() class="btn btn-info"/>

                        </form>

<?php

if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];


    $simpan = $koneksi->query("insert into tb_perlu(judul)values('$judul')");


    if ($simpan) {
        echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Disimpan!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=text';
					        });
					    }, 300);
					</script>

			";


    }

}

?>