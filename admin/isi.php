<?php

$page = $_GET['page'];
$aksi = $_GET['aksi'];

if ($page == "tamu") {
    if ($aksi == "") {
        include "tamu_umum.php";
    }
}

if ($page == "") {
    include "../home2.php";
}


?>