<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                Data Pegawai
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

                        <a href="?page=pegawai&aksi=tambah" class="btn btn-success" style="margin-bottom:  12px;"> <i
                                    class="fa fa-plus"></i> Tambah</a>

                        <!--<a href="page/pegawai/laporan_pdf.php" class="btn btn-default" target="blank" style="margin-bottom:  12px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak PDF</a>
                        <a href="page/pegawai/laporan_exel.php" class="btn btn-default" target="blank" style="margin-bottom:  12px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak Excel</a>-->

                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Unit Kerja</th>
                            <th>No HP</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php

                        if ($_SESSION['admin']) {

                            $no = 1;
                            $sql = $koneksi->query("select * from tb_pegawai2, t_u_kerja where tb_pegawai2.id_u_kerja=t_u_kerja.id  order by tb_pegawai2.id_pegawai desc");

                        } else {

                            $no = 1;
                            $sql = $koneksi->query("select * from tb_pegawai2, t_u_kerja where tb_pegawai2.id_u_kerja=t_u_kerja.id and tb_pegawai2.id_u_kerja='$unit_kerja' order by tb_pegawai2.id_pegawai desc");
                        }

                        while ($data = $sql->fetch_assoc()) {


                            ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nip'] ?></td>
                                <td><?php echo $data['nama_peg'] ?></td>
                                <td><?php echo $data['u_kerja'] ?></td>
                                <td><?php echo $data['telpon'] ?></td>
                                <td><?php echo $data['ket'] ?></td>


                                <td>


                                    <a href="?page=pegawai&aksi=ubah&nip=<?php echo $data['nip']; ?>"
                                       class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Ubah</a>
                                    <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini...???')"
                                       href="?page=pegawai&aksi=hapus&nip=<?php echo $data['nip']; ?>"" class="btn
                                    btn-danger btn-xs"> <i class="fa fa-trash"></i> Hapus</a>

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
