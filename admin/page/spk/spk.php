<?php

$sql_sp = $koneksi->query("select * from tb_spk where jawaban='Sangat Puas'");
$data_sp = $sql_sp->num_rows;

$sql_p = $koneksi->query("select * from tb_spk where jawaban='Puas'");
$data_p = $sql_p->num_rows;

$sql_cp = $koneksi->query("select * from tb_spk where jawaban='Cukup Puas'");
$data_cp = $sql_cp->num_rows;

$sql_tp = $koneksi->query("select * from tb_spk where jawaban='Tidak Puas'");
$data_tp = $sql_tp->num_rows;

?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                Data Kepuasan Pelanggan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">

                        <?php if ($_SESSION['admin']) { ?>


                            <a href="page/spk/cetak_excel.php" class="btn btn-default" target="blank"
                               style="margin-bottom:  12px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak
                                Excel</a>

                        <?php } else { ?>

                            <a href="page/spk/cetak_excel2.php?unit_kerja=<?php echo $unit_kerja ?>"
                               class="btn btn-default" target="blank" style="margin-bottom:  12px; margin-left: 5px;"><i
                                        class="fa fa-print"></i> Cetak Excel</a>


                        <?php } ?>

                        <thead>
                        <tr>
                            <th>No</th>

                            <th>Nama</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>

                        </tr>
                        </thead>

                        <tbody>

                        <?php
                        if ($_SESSION['admin']) {
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_spk order by id desc");
                        } else {
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_spk where id_unit_kerja='$unit_kerja' order by id desc");
                        }
                        while ($data = $sql->fetch_assoc()) {


                            ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['pertanyaan'] ?></td>
                                <td><?php echo $data['jawaban'] ?></td>

                            </tr>

                        <?php } ?>


                        </tbody>


                        <tr>
                            <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Sangat
                                Puas
                            </td>
                            <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_sp; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Puas
                            </td>
                            <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_p; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Cukup
                                Puas
                            </td>
                            <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_cp; ?></td>
                        </tr>

                        <tr>
                            <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Tidak
                                Puas
                            </td>
                            <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_tp; ?></td>
                        </tr>


                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
