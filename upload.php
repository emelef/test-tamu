<link rel="stylesheet" type="text/css" href="sw/dist/sweetalert.css">
<script type="text/javascript" src="sw/dist/sweetalert.min.js"></script>


<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi/koneksi.php";


$result = array();
$imagedata = base64_decode($_POST['img_data']);
$filename = md5(date("dmYhisA"));

$filename2 = md5(date("dmYhisA")) . '.png';
//Location to where you want to created sign image
$file_name = './doc_signs/' . $filename . '.png';
file_put_contents($file_name, $imagedata);
$result['status'] = 1;
$result['file_name'] = $file_name;

date_default_timezone_set('Asia/Jakarta');

$img = $_POST['image'];
$folderPath = "upload/";

$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);
$fileName = uniqid() . '.png';

$file = $folderPath . $fileName;
file_put_contents($file, $image_base64);

$tgl = date('Y-m-d');
$jam = date("H:i:s");

$pegawai = $_POST['pegawai'];


$nip_pegawai = $koneksi->query("select * from tb_pegawai2 where nip = '$pegawai'");
$data_peg = $nip_pegawai->fetch_assoc();


$nama = htmlspecialchars(strip_tags($_POST['nama']));
$alamat = htmlspecialchars(strip_tags($_POST['alamat']));
$jumlah_tamu = htmlspecialchars(strip_tags($_POST['jumlah_tamu']));
$telp = htmlspecialchars(strip_tags($_POST['telp']));
$jk = $_POST['jk'];
$temu = $data_peg['nama_peg'];
$instansi = htmlspecialchars(strip_tags($_POST['instansi']));
$perlu = $_POST['perlu'];
$no_hp = $data_peg['telpon'];
$unit_kerja = $data_peg['id_u_kerja'];


if (empty($nama)) {

    echo "
        <script>
            alert('Petugas Tidak Bole kosong');
        </script>


        ";


} else {


    $sql = $koneksi->query("insert into tb_tamu (nama, alamat, jumlah_tamu, telp, jk, keperluan, tanggal, jam, ketemu, foto,  instansi,  no_hp, id_unit_kerja)values('$nama', '$alamat', '$jumlah_tamu', '$telp', '$jk', '$perlu', '$tgl', '$jam', '$temu', '$fileName',  '$instansi',  '$no_hp', '$unit_kerja')");


    if ($sql) {

        $koneksi->query("update tb_register set qr_code='$namafile' where id_tamu='$data'");

        echo "

                    <script>
                        setTimeout(function() {
                            swal({
                                title: 'Register Tamu Berhasil!',
                                text: 'Berhasil Disimpan!',
                                type: 'success'
                            }, function() {
                                window.location ='index.php';
                            });
                        }, 300);
                    </script>

            ";


    }


}

?>