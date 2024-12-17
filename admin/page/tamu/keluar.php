<?php

date_default_timezone_set('Asia/Jakarta');

$tgl = date('Y-m-d');
$jam = date("H:i:s");

$koneksi->query("update  tb_tamu set jam_keluar='$jam' where id_tamu='$_GET[id]'");


?>
<script>
    setTimeout(function () {
        swal({
            title: 'Check Out!',
            text: 'Berhasil !',
            type: 'success'
        }, function () {
            window.location = '?page=d_tamu';
        });
    }, 300);
</script>


<?php

?>
