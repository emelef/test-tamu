<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                Data Keperluan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

                        <a href="?page=text&aksi=tambah" class="btn btn-success" style="margin-bottom:  12px;"> <i
                                    class="fa fa-plus"></i> Tambah</a>


                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Keperluan</th>

                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php
                        $no = 1;
                        $sql = $koneksi->query("select * from tb_perlu order by id desc");
                        while ($data = $sql->fetch_assoc()) {


                            ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['judul'] ?></td>

                                <td>


                                    <a href="?page=text&aksi=ubah&id=<?php echo $data['id']; ?>"
                                       class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Ubah</a>
                                    <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini...???')"
                                       href="?page=text&aksi=hapus&id=<?php echo $data['id']; ?>"" class="btn btn-danger
                                    btn-xs"> <i class="fa fa-trash"></i> Hapus</a>

                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
