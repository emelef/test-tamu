<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

session_start();

include "../koneksi/koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['user']) {
    header("location:index.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<?php
$sql = $koneksi->query("SELECT * FROM tb_profile");
$data = $sql->fetch_assoc();
?>

<div class="login-box">
    <div class="login-logo"></div>
    <div class="login-box-body">
        <h3 style=" text-align: center; "><img src="images/<?php echo $data['foto'] ?>" width="160" height="100" alt=""></h3>
        <h3 style="color: black; font-size: 17px; text-align: center;"><b>Aplikasi</b> E-TAMU</h3>
        <p style="color: black; font-size: 18px;" class="login-box-msg">Halaman Login</p>

        <form method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Your Username " name="nama">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Your Password" name="pass">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <input type="submit" class="btn btn-info" name="login" value="Login"/>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $nama = addslashes(trim($_POST['nama']));
    $pass = addslashes(trim($_POST['pass']));

    $ambil = $koneksi->query("SELECT * FROM tb_user WHERE username='$nama' AND pass='$pass'");
    $data = $ambil->fetch_assoc();
    $ketemu = $ambil->num_rows;

    if ($ketemu >= 1) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['pass'] = $data['pass'];
        $_SESSION['level'] = $data['level'];

        if ($data['level'] == "admin") {
            $_SESSION['admin'] = $data['id'];
            header("location:index.php");
        } elseif ($data['level'] == "user") {
            $_SESSION['user'] = $data['id'];
            header("location:index.php");
        } elseif ($data['level'] == "direktur") {
            $_SESSION['direktur'] = $data['id'];
            header("location:index.php");
        }
    } else {
        echo '<script type="text/javascript">alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");</script>';
    }
}
?>
<?php
}
?>
