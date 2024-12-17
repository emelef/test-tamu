<?php


$koneksi->query("delete from tb_perlu where id='$_GET[id]'");


?>


<script>
    setTimeout(function () {
        sweetAlert({
            title: 'OKE!',
            text: 'Data Berhasil Dihapus!',
            type: 'error'
        }, function () {
            window.location = '?page=text';
        });
    }, 300);
</script>
