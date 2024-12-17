<?php
error_reporting(0);
include "../../koneksi/koneksi.php";

header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=spk" . date('dmY') . ".xls");


$sql_sp = $koneksi->query("select * from tb_spk where jawaban='Sangat Puas'");
$data_sp = $sql_sp->num_rows;

$sql_p = $koneksi->query("select * from tb_spk where jawaban='Puas'");
$data_p = $sql_p->num_rows;

$sql_cp = $koneksi->query("select * from tb_spk where jawaban='Cukup Puas'");
$data_cp = $sql_cp->num_rows;

$sql_tp = $koneksi->query("select * from tb_spk where jawaban='Tidak Puas'");
$data_tp = $sql_tp->num_rows;


?>

<h2> Data SPK</h2>

<table border="1px">

    <tr>
        <th>No</th>

        <th>Nama</th>
        <th>Pertanyaan</th>
        <th>Jawaban</th>

    </tr>


    <?php
    $unit_kerja = $_GET['unit_kerja'];
    $no = 1;
    $sql = $koneksi->query("select * from tb_spk where id_unit_kerja = '$unit_kerja'");
    while ($data = $sql->fetch_assoc()) {


        ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['pertanyaan'] ?></td>
            <td><?php echo $data['jawaban'] ?></td>

        </tr>

    <?php } ?>


    <tr>
        <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Sangat Puas</td>
        <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_sp; ?></td>
    </tr>

    <tr>
        <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Puas</td>
        <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_p; ?></td>
    </tr>

    <tr>
        <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Cukup Puas</td>
        <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_cp; ?></td>
    </tr>

    <tr>
        <td colspan="3" style="text-align: right; font-weight:bold; font-size: 20px;">Total Tidak Puas</td>
        <td style="text-align: left; font-weight:bold; font-size: 20px;"><?php echo $data_tp; ?></td>
    </tr>

</table>