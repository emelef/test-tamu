<?php

$page = isset($_GET['page']) ? $_GET['page'] : '';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

switch ($page) {
    case 'pengguna':
        switch ($aksi) {
            case '':
                include "page/pengguna/pengguna.php";
                break;
            case 'tambah':
                include "page/pengguna/tambah.php";
                break;
            case 'ubah':
                include "page/pengguna/ubah.php";
                break;
            case 'hapus':
                include "page/pengguna/hapus.php";
                break;
        }
        break;
    case 'spk':
        if ($aksi == '') {
            include "page/spk/spk.php";
        }
        break;
    case 'register':
        if ($aksi == '') {
            include "page/register/register.php";
        }
        break;
    case 'tamu_peg':
        switch ($aksi) {
            case '':
                include "page/tamu_peg/tamu_peg.php";
                break;
            case 'hapus':
                include "page/tamu_peg/hapus.php";
                break;
            case 'keluar':
                include "page/tamu_peg/keluar.php";
                break;
        }
        break;
    case 'qrtamu':
        if ($aksi == '') {
            include "page/qrcode/index.php";
        }
        break;
    case 'cektamuumum':
        if ($aksi == '') {
            include "page/qrcode/cektamuumum.php";
        }
        break;
    case 'tanya':
        switch ($aksi) {
            case '':
                include "page/tanya/tanya.php";
                break;
            case 'ubah':
                include "page/tanya/ubah.php";
                break;
        }
        break;
    case 'pegawai':
        switch ($aksi) {
            case '':
                include "page/pegawai/pegawai.php";
                break;
            case 'tambah':
                include "page/pegawai/tambah.php";
                break;
            case 'ubah':
                include "page/pegawai/ubah.php";
                break;
            case 'hapus':
                include "page/pegawai/hapus.php";
                break;
        }
        break;
    case 'text':
        switch ($aksi) {
            case '':
                include "page/text/text.php";
                break;
            case 'tambah':
                include "page/text/tambah.php";
                break;
            case 'ubah':
                include "page/text/ubah.php";
                break;
            case 'hapus':
                include "page/text/hapus.php";
                break;
        }
        break;
    case 'u_kerja':
        switch ($aksi) {
            case '':
                include "page/u_kerja/u_kerja.php";
                break;
            case 'tambah':
                include "page/u_kerja/tambah.php";
                break;
            case 'ubah':
                include "page/u_kerja/ubah.php";
                break;
            case 'hapus':
                include "page/u_kerja/hapus.php";
                break;
        }
        break;
    case 'tamu':
        switch ($aksi) {
            case '':
                include "page/tamu/capture.php";
                break;
            case 'tambah':
                include "page/tamu/tambah.php";
                break;
            case 'ubah':
                include "page/tamu/ubah.php";
                break;
            case 'hapus':
                include "page/tamu/hapus.php";
                break;
        }
        break;
    case 'd_tamu':
        switch ($aksi) {
            case '':
                include "page/tamu/d_tamu.php";
                break;
            case 'detail':
                include "page/tamu/detail.php";
                break;
            case 'ubah':
                include "page/tamu/ubah.php";
                break;
            case 'hapus':
                include "page/tamu/hapus.php";
                break;
            case 'keluar':
                include "page/tamu/keluar.php";
                break;
            case 'upload':
                include "upload.php";
                break;
        }
        break;
    case 'profile':
        if ($aksi == '') {
            include "page/profile/profile.php";
        }
        break;
    default:
        include "home.php";
        break;
}
?>
