<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "../koneksi/koneksi.php";
// include "../qrcodemaster/qrlib.php";

if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-TAMU </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sw/dist/sweetalert.css">
    <script type="text/javascript" src="sw/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="index.php" class="logo">
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b style="font-size:16px;">E-TAMU</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu"></li>

                    <?php
                    if (isset($_SESSION['admin'])) {
                        $user_l = $_SESSION['admin'];
                    } elseif (isset($_SESSION['user'])) {
                        $user_l = $_SESSION['user'];
                    }

                    $sql_u = $koneksi->query("SELECT * FROM tb_user WHERE id='$user_l'");
                    $data_u = $sql_u->fetch_assoc();

                    $unit_kerja = $data_u['unit_kerja'];
                    ?>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/<?php echo $data_u['foto']; ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $data_u['nama']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="images/<?php echo $data_u['foto']; ?>" class="img-circle" alt="User Image">
                                <p>Anda login sebagai, <?php echo $data_u['level']; ?></p>
                            </li>
                            <li class="user-body">
                                <div class="row"></div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left"></div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <?php include "include/menu.php"; ?>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header"></section>
        <section class="content">
            <?php include "include/isi.php"; ?>
        </section>
    </div>

    <?php $tgl2 = date('Y'); ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2022-<?php echo $tgl2; ?> <?php echo isset($data1['nama_perusahaan']) ? $data1['nama_perusahaan'] : ''; ?></a>. All rights reserved.
    </footer>

    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree();
        });
    </script>
    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
</div>
</body>
</html>

<?php
} else {
    header("location:login.php");
}
?>
