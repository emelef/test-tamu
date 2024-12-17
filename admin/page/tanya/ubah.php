<?php

$id = $_GET['id'];
$sql = $koneksi->query("select * from pertanyaan where id='$id'");
$data = $sql->fetch_assoc();

?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                Ubah Data Pertanyaan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="pertanyaan"
                                       value="<?php echo $data['pertanyaan']; ?>"/>

                            </div>


                            <div>

                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php

    $pertanyaan = $_POST ['pertanyaan'];


    $simpan = $_POST ['simpan'];


    if ($simpan) {


        $sql = $koneksi->query("update  pertanyaan set pertanyaan='$pertanyaan'   where id='$id'");


        if ($sql) {
            echo "

              <script>
                  setTimeout(function() {
                      swal({
                          title: 'Selamat!',
                          text: 'Data Berhasil Diubah!',
                          type: 'success'
                      }, function() {
                          window.location = '?page=tanya';
                      });
                  }, 300);
              </script>

          ";
        }


    }

    ?>
