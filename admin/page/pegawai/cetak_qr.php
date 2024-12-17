<?php
include "../../koneksi/koneksi.php";
$nip = $_GET['nip'];

$sql = $koneksi->query("select * from tb_pegawai2 where nip='$nip'");
$data = $sql->fetch_assoc();
$qr_code = $data['qr_code'];


?>


<style>

    @media print {
        input.noPrint {
            display: none;
        }
    }

    .tabel {
        border-collapse: collapse;
    }

    .tabel th {
        padding: 8px 5px;
        background-color: #cccccc;
    }

    .tabel td {
        padding: 8px 5px;
    }


</style>

<script>


    window.print();
    window.onfocus = function () {
        window.close();
    }


</script>

<body onload="window.print()">

<div style="text-align:  center; font-size: 30px; font-weight: bold; margin-top: 100px;">

    <img src="../../../temp/<?php echo $data['qr_code']; ?>" width="300" height="300" alt=""><br>


</div>

</body>