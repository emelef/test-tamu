<?php
// Inisialisasi variabel yang akan digunakan untuk penentuan kelas aktif
$masteraktif = $kerjaaktif = $pegawaiaktif = $tamuaktif = $d_tamuaktif = $tamu_pegaktif = "";

// Mendapatkan data profil dari database
$sql2 = $koneksi->query("SELECT * FROM tb_profile");
$data1 = $sql2->fetch_assoc();
?>

<div class="user-panel" style="text-align: center;">
    <div>
        <img src="images/<?php echo $data1['foto']; ?>" width="160" height="100">
        <h5 style="color:white; font-size: 16px; text-align: center;"><?php echo $data1['nama_perusahaan']; ?></h5>
    </div>
    <div class="pull-left info"></div>
</div>

<!-- search form -->
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
    <li><a href="?page=profile"><i class="fa fa-gear"></i> Setting</a></li>

    <?php
    // Menentukan halaman yang aktif
    $page = isset($_GET['page']) ? $_GET['page'] : '';

    if ($page == "u_kerja") {
        $masteraktif = "active";
        $kerjaaktif = "active";
    }

    if ($page == "pegawai") {
        $masteraktif = "active";
        $pegawaiaktif = "active";
    }

    if ($page == "d_tamu") {
        $tamuaktif = "active";
        $d_tamuaktif = "active";
    }

    if ($page == "tamu_peg") {
        $tamuaktif = "active";
        $tamu_pegaktif = "active";
    }
    ?>

    <li class="treeview <?php echo $masteraktif; ?>">
        <a href="#">
            <i class="fa fa-table"></i> <span>Data Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo $kerjaaktif; ?>"><a href="?page=u_kerja"><i class="fa fa-bars"></i> Unit Kerja</a></li>
            <li class="<?php echo $pegawaiaktif; ?>"><a href="?page=pegawai"><i class="fa fa-users"></i> Pegawai</a></li>
        </ul>
    </li>

    <li class="<?php echo $d_tamuaktif; ?>"><a href="?page=d_tamu"><i class="fa fa-viacoin"></i> Data Tamu</a></li>
    <li><a href="?page=spk"><i class="fa fa-smile-o"></i> Data Kepuasan Pelanggan</a></li>
    <li><a href="?page=tanya"><i class="fa fa-tasks"></i> Data Pertanyaan</a></li>
    <li><a href="?page=text"><i class="fa fa-table"></i> Data Keperluan</a></li>

    <?php if (isset($_SESSION['admin'])) { ?>
        <li><a href="?page=pengguna"><i class="fa fa-user"></i> <span>Data Pengguna</span></a></li>
    <?php } ?>
</ul>
