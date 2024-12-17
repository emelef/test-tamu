<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi/koneksi.php";

         $result = array();
$imagedata = base64_decode($_POST['img_data']);
$filename = md5(date("dmYhisA"));

$filename2 = md5(date("dmYhisA")).'.png';
//Location to where you want to created sign image
$file_name = './doc_signs/'.$filename.'.png';
file_put_contents($file_name,$imagedata);
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

date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$jam=date("H:i:s");

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];
$temu = $_POST['temu'];
$instansi = $_POST['instansi'];
$perlu = $_POST['perlu'];
$no_hp = $_POST['no_hp'];
$unit_kerja = $_POST['unit_kerja'];

$nama_file = time().'.jpg';
$direktori = '../../upload/';
$target = $direktori.$nama_file;

move_uploaded_file($_FILES['webcam']['tmp_name'], $target);

if(empty($nama)){
    
echo "
        <script>
            alert('Petugas Tidak Bole kosong');
        </script>


        ";

    
}else{




$sql =$koneksi->query("insert into tb_tamu (nama, alamat, telp, jk, keperluan, tanggal, jam, ketemu, foto,  instansi,  no_hp, id_unit_kerja)values('$nama', '$alamat', '$telp', '$jk', '$perlu', '$tgl', '$jam', '$temu', '$fileName',  '$instansi',  '$no_hp', '$unit_kerja')");




if ($sql) {
            ?>
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Disimpan");
                    window.location.href="index2.php?page=d_tamu";

                </script>
            <?php
        }

}

?>