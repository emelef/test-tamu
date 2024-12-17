<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "../../koneksi/koneksi.php";

if ($_SESSION['admin']) {
    $user_l = $_SESSION['admin'];

} elseif ($_SESSION['user']) {
    $user_l = $_SESSION['user'];
}

$sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
$data_u = $sql_u->fetch_assoc();

$user = $data_u['nama'];

$result = array();
$imagedata = base64_decode($_POST['img_data']);
$filename = md5(date("dmYhisA"));

$filename2 = md5(date("dmYhisA")) . '.png';
//Location to where you want to created sign image
$file_name = './doc_signs/' . $filename . '.png';
file_put_contents($file_name, $imagedata);
$result['status'] = 1;
$result['file_name'] = $file_name;


$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$temu = $_POST['temu'];
$tgl = $_POST['tgl'];
$jam = $_POST['jam'];
$perlu = $_POST['perlu'];

$nama_file = time() . '.jpg';
$direktori = 'upload/';
$target = $direktori . $nama_file;

move_uploaded_file($_FILES['webcam']['tmp_name'], $target);

if (empty($nama)) {

    echo "
        <script>
            alert('Petugas Tidak Bole kosong');
        </script>


        ";


} else {


    $sql = $koneksi->query("insert into tb_tamu (nama, alamat, telp, jk, keperluan, tanggal, jam, ketemu, foto, petugas, ttd)values('$nama', '$alamat', '$telp', '$jk', '$perlu', '$tgl', '$jam', '$temu', '$nama_file', '$user', '$filename2')");


    ?>
    <script>
        setTimeout(function () {
            swal({
                title: "Selamat!",
                text: "Data Berhasil Disimpan!",
                type: "success"
            }, function () {
                window.location = "?page=d_tamu";
            });
        }, 300);
    </script>
    <?php

}

?>