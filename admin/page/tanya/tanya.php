<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                Data Pertanyaan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example1">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>

                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $no = 1;

                        $sql = $koneksi->query("select * from pertanyaan ");

                        while ($data = $sql->fetch_assoc()) {


                            ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['pertanyaan']; ?></td>


                                <td>
                                    <a href="?page=tanya&aksi=ubah&id=<?php echo $data['id']; ?>"
                                       class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>


                                </td>
                            </tr>


                        <?php } ?>
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
