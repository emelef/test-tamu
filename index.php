<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "koneksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

?>
<?php


$sql = $koneksi->query("select * from tb_profile ");

$data = $sql->fetch_assoc();


?>


<?php

$satu_hari = mktime(0, 0, 0, date("n"), date("j"), date("Y"));

function tglIndonesia($str)
{
    $tr = trim($str);
    $str = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
    return $str;
}

?>

<!DOCTYPE html>
<!-- saved from url=(0036)https://s.bootsnipp.com/iframe/dlZAN -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="noindex, nofollow">

    <title>Buku Tamu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src=""></script>
    <script src=""></script>
    <script type="text/javascript">
        window.alert = function () {
        };
        var defaultCSS = document.getElementById('bootstrap-css');

        function changeCSS(css) {
            if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }

        $(document).ready(function () {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage(iframe_height, 'https://bootsnipp.com/');
        });
    </script>

    <link rel="stylesheet" type="text/css" href="sw/dist/sweetalert.css">
    <script type="text/javascript" src="sw/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="admin/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/custom.css">
    <style>
        #webcam {
            background: rgba(0, 0, 0, 0.4);
            border-radius: 5px;
        }

        .ambilfoto {
            color: #fff;
            padding: 0 30px 0 5px;
            line-height: 1;
            height: 30px;
            margin: 0 5px;
            background: transparent url(assets/camera.png) no-repeat center right;
            background-size: auto 22px;
        }

        @media (max-width: 992px) {
            #webcam {
                margin: 0 auto;
                text-align: center;
            }
        }
    </style>
    <link rel="stylesheet" href="assets/responsive.css">
</head>
<body class="color-body">

<div class="latar-bottom "><img src="assets/login-backg.png"></div>
<div class="header-home">
    <div class="container-custom flexleft">
        <div class="header-home-left">
            <a href="index.php">
                <div class="flexleft">
                    <div class="header-home-logo">
                        <img src="admin/images/<?php echo $data['foto'] ?>">
                    </div>
                    <div class="header-home-title">
                        <h1><?php echo $data['nama_perusahaan'] ?></h1>

                    </div>
                </div>
            </a>
        </div>

        <div class="header-home-right">
            <div class="tanggal">

                <p><?php echo "<b>" . tglIndonesia(date('D, d F Y', $satu_hari)) . "</b> ";
                    ?></p>
                <p id='clock'></p></div>
            <div class="flexright">

                <?php
                $page = $_GET['page'];

                if ($page == "") { ?>
                    <a href="?page=spk">
                        <div class="link-top hijau1 flexright">IKM</div>
                    </a>

                    <?php
                } else {


                    ?>

                    <a href="index.php">
                        <div class="link-top hijau1 flexright">Register Tamu</div>
                    </a>

                <?php } ?>


            </div>
        </div>
    </div>

</div>

<div class="container-custom">

    <div class="row">

        <div class="left-register">
            <div class="left-register-margin">
                <div class="left-register-inner">
                    <div class="judul">

                        <h2>Selamat datang</h2>
                        <h1>Buku Tamu</h1>
                        <h3><b><?php echo $data['nama_perusahaan'] ?></b><br/>
                            <br/>
                        </h3>
                    </div>
                    <div class="left-register-image"><img src="admin/images/<?php echo $data['foto2'] ?>"></div>
                </div>
            </div>
        </div>
        <div class="right-register">
            <div class="tab-content" id="myTabContent">
                <form role="form" method="POST" enctype="multipart/form-data" action="upload.php">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-register">
                            <?php
                            $page = $_GET['page'];

                            if ($page == "") { ?>
                                <div class="reg">
                                    <div class="heading-register"><h2>Register Tamu</h2></div>
                                </div>

                                <?php
                            } else {


                                ?>

                                <div class="heading-register"><h2>Indek Kepuasan</h2></div>

                            <?php } ?>


                            <div class="form-register-inner">
                                <?php
                                include "isi.php";
                                ?>
                            </div>


                            <script type="text/javascript">
                                var detik = <?php echo date('s'); ?>;
                                var menit = <?php echo date('i'); ?>;
                                var jam = <?php echo date('H'); ?>;

                                function clock() {
                                    if (detik != 0 && detik % 60 == 0) {
                                        menit++;
                                        detik = 0;
                                    }
                                    second = detik;

                                    if (menit != 0 && menit % 60 == 0) {
                                        jam++;
                                        menit = 0;
                                    }
                                    minute = menit;

                                    if (jam != 0 && jam % 24 == 0) {
                                        jam = 0;
                                    }
                                    hour = jam;

                                    if (detik < 10) {
                                        second = '0' + detik;
                                    }
                                    if (menit < 10) {
                                        minute = '0' + menit;
                                    }

                                    if (jam < 10) {
                                        hour = '0' + jam;
                                    }
                                    waktu = hour + ':' + minute + ':' + second;

                                    document.getElementById("clock").innerHTML = waktu;
                                    detik++;
                                }

                                setInterval(clock, 1000);
                            </script>


                            <script src="jquery-1.10.2.min.js"></script>
                            <script src="jquery.chained.min.js"></script>


                            <script>
                                $("#pegawai").chained("#unit_kerja");

                            </script>


                            <script src="admin/bower_components/select2/dist/js/select2.full.min.js"></script>

                            <script>
                                $(function () {
                                    //Initialize Select2 Elements
                                    $('.select2').select2()

                                    //Datemask dd/mm/yyyy
                                    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                                    //Datemask2 mm/dd/yyyy
                                    $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
                                    //Money Euro
                                    $('[data-mask]').inputmask()

                                    //Date range picker
                                    $('#reservation').daterangepicker()
                                    //Date range picker with time picker
                                    $('#reservationtime').daterangepicker({
                                        timePicker: true,
                                        timePickerIncrement: 30,
                                        locale: {format: 'MM/DD/YYYY hh:mm A'}
                                    })
                                    //Date range as a button
                                    $('#daterange-btn').daterangepicker(
                                        {
                                            ranges: {
                                                'Today': [moment(), moment()],
                                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                            },
                                            startDate: moment().subtract(29, 'days'),
                                            endDate: moment()
                                        },
                                        function (start, end) {
                                            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                                        }
                                    )

                                    //Date picker
                                    $('#datepicker').datepicker({
                                        autoclose: true
                                    })

                                    //iCheck for checkbox and radio inputs
                                    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                                        checkboxClass: 'icheckbox_minimal-blue',
                                        radioClass: 'iradio_minimal-blue'
                                    })
                                    //Red color scheme for iCheck
                                    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                                        checkboxClass: 'icheckbox_minimal-red',
                                        radioClass: 'iradio_minimal-red'
                                    })
                                    //Flat red color scheme for iCheck
                                    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                                        checkboxClass: 'icheckbox_flat-green',
                                        radioClass: 'iradio_flat-green'
                                    })

                                    //Colorpicker
                                    $('.my-colorpicker1').colorpicker()
                                    //color picker with addon
                                    $('.my-colorpicker2').colorpicker()

                                    //Timepicker
                                    $('.timepicker').timepicker({
                                        showInputs: false
                                    })
                                })
                            </script>

</body></html>