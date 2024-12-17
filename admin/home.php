<!-- Content Wrapper. Contains page content -->
<marquee>Selamat Datang di Buku Tamu Pemeriksa Keuangan Provinsi Gorontalo</marquee>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<?php

if (@$_SESSION['admin']) {

    $sql_t = $koneksi->query("select * from tb_tamu");
    $data = $sql_t->num_rows;
} else {
    $sql_t = $koneksi->query("select * from tb_tamu where id_unit_kerja='$unit_kerja'");
    $data = $sql_t->num_rows;
}


if (@$_SESSION['admin']) {

    $tgl = date("Y-m-d");
    $sql_tm = $koneksi->query("select * from tb_tamu where tanggal='$tgl'");
    $data_h = $sql_tm->num_rows;
} else {

    $tgl = date("Y-m-d");
    $sql_tm = $koneksi->query("select * from tb_tamu where tanggal='$tgl' and id_unit_kerja='$unit_kerja'");
    $data_h = $sql_tm->num_rows;
}

if (@$_SESSION['admin']) {

    $sql_p = $koneksi->query("select * from tb_pegawai2");
    $data_p = $sql_p->num_rows;
} else {
    $sql_p = $koneksi->query("select * from tb_pegawai2 where id_u_kerja='$unit_kerja'");
    $data_p = $sql_p->num_rows;
}

$sql_u = $koneksi->query("select * from t_u_kerja");
$data_u = $sql_u->num_rows;


?>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $data; ?></h3>

                    <p>Total Tamu</p>
                </div>
                <div class="icon">
                    <i class="ion-social-vimeo"></i>
                </div>
                <a href="?page=d_tamu" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $data_h; ?></h3>

                    <p>Tamu Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="?page=d_tamu" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $data_p; ?></h3>

                    <p>Pegawai</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-people"></i>
                </div>
                <a href="?page=pegawai" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <?php if (@$_SESSION['admin']) { ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $data_u; ?></h3>

                    <p>Unit Kerja</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="?page=u_kerja" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <?php } ?>




    <?php

    if (@$_SESSION['admin']) {

        $sql5 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Sangat Puas' ");
        $sangat_puas = $sql5->num_rows;

        $sql = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Puas' ");
        $puas = $sql->num_rows;

        $sql2 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Cukup Puas' ");
        $cukup_puas = $sql2->num_rows;

        $sql3 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Tidak Puas' ");
        $tidak_puas = $sql3->num_rows;
    } else {
        $sql5 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Sangat Puas' and id_unit_kerja='$unit_kerja' ");
        $sangat_puas = $sql5->num_rows;

        $sql = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Puas' and id_unit_kerja='$unit_kerja' ");
        $puas = $sql->num_rows;

        $sql2 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Cukup Puas' and id_unit_kerja='$unit_kerja' ");
        $cukup_puas = $sql2->num_rows;

        $sql3 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan Pelayanan Kantor Kami ?' and jawaban='Tidak Puas' and id_unit_kerja='$unit_kerja' ");
        $tidak_puas = $sql3->num_rows;
    }


    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Sangat Puas', <?php echo $sangat_puas ?>],
                ['Puas', <?php echo $puas ?>],
                ['Cukup Puas', <?php echo $cukup_puas ?>],
                ['Tidak Puas', <?php echo $tidak_puas ?>]

            ]);

            var options = {
                title: 'Apakah anda puas dengan Pelayanan Kantor Kami ?'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>


    <?php

    if (@$_SESSION['admin']) {

        $sql_2 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Sangat Puas' ");
        $sangat_puas2 = $sql_2->num_rows;

        $sql_21 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Puas' ");
        $puas2 = $sql_21->num_rows;

        $sql_22 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Cukup Puas' ");
        $cukup_puas2 = $sql_22->num_rows;

        $sql_23 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Tidak Puas' ");
        $tidak_puas2 = $sql_23->num_rows;
    } else {

        $sql_2 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Sangat Puas' and id_unit_kerja='$unit_kerja' ");
        $sangat_puas2 = $sql_2->num_rows;

        $sql_21 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Puas' and id_unit_kerja='$unit_kerja' ");
        $puas2 = $sql_21->num_rows;

        $sql_22 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Cukup Puas' and id_unit_kerja='$unit_kerja' ");
        $cukup_puas2 = $sql_22->num_rows;

        $sql_23 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas dengan kebersihan Kantor kami ?' and jawaban='Tidak Puas' and id_unit_kerja='$unit_kerja' ");
        $tidak_puas2 = $sql_23->num_rows;
    }


    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Sangat Puas', <?php echo $sangat_puas2 ?>],
                ['Puas', <?php echo $puas2 ?>],
                ['Cukup Puas', <?php echo $cukup_puas2 ?>],
                ['Tidak Puas', <?php echo $tidak_puas2 ?>]

            ]);

            var options = {
                title: 'Apakah anda puas dengan kebersihan Kantor kami ?'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>


    <?php

    if (@$_SESSION['admin']) {

        $sql_3 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Sangat Puas' ");
        $sangat_puas3 = $sql_3->num_rows;

        $sql_31 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Puas' ");
        $puas3 = $sql_31->num_rows;

        $sql_32 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Cukup Puas' ");
        $cukup_puas3 = $sql_32->num_rows;

        $sql_33 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Tidak Puas' ");
        $tidak_puas3 = $sql_33->num_rows;
    } else {


        $sql_3 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Sangat Puas' and id_unit_kerja='$unit_kerja' ");
        $sangat_puas3 = $sql_3->num_rows;

        $sql_31 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Puas' and id_unit_kerja='$unit_kerja' ");
        $puas3 = $sql_31->num_rows;

        $sql_32 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Cukup Puas' and id_unit_kerja='$unit_kerja' ");
        $cukup_puas3 = $sql_32->num_rows;

        $sql_33 = $koneksi->query("select * from tb_spk where pertanyaan='Apakah anda puas fasilitas Kantor kami ?' and jawaban='Tidak Puas' and id_unit_kerja='$unit_kerja' ");
        $tidak_puas3 = $sql_33->num_rows;
    }


    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Sangat Puas', <?php echo $sangat_puas3 ?>],
                ['Puas', <?php echo $puas3 ?>],
                ['Cukup Puas', <?php echo $cukup_puas3 ?>],
                ['Tidak Puas', <?php echo $tidak_puas3 ?>]

            ]);

            var options = {
                title: 'Apakah anda puas fasilitas Kantor kami ?'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

            chart.draw(data, options);
        }
    </script>


    <div class="col-md-4">

        <span id="piechart" style="width: 400px; height: 400px;"></span>

    </div>

    <div class="col-md-4">


        <span id="piechart2" style="width: 400px; height: 400px;"></span>


    </div>


    <div class="col-md-4">

        <span id="piechart3" style="width: 400px; height: 400px;"></span>

    </div>


</section>