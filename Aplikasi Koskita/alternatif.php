<?php
//koneksi
session_start();
include("koneksi.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK TOPSIS</title>
    <!--bootstrap-->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">

    <!--icon-->
    <link href="tampilan/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container" style="padding-right: -30px; width: 100%">

        <div class="row">
            <div class="col">
                <?php include('sidebar.php') ?>
            </div>
            <div class="col">
                <div class="" style="margin-top: -650px;">
                    <h1 style="margin-left: 260px; padding-top: 10px; padding-bottom: 10px; color: #044750;">
                        Alternatif
                    </h1>
                    <nav aria-label="breadcrumb" style="margin-left: 250px;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
                        </ol>
                    </nav>
                    <div class="col-lg-offset-3 panel panel-default" style="margin-right: 50px;">
                        <div class="panel-heading text-center">
                            Alternatif
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="alternatif.php" data-toggle="tab">Tabel Alternatif</a>
                            </li>
                            <li>
                                <a href="alternatiftambah.php" data-toggle="tab">Tambah Alternatif</a>
                            </li>
                        </ul>

                        <div class="panel-body">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="">
                                    <!--tabel alternatif-->
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Kriteria</th>
                                                <th>Nama Alternatif</th>
                                                <th colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                                            while ($row = $sql->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row[0] ?></td>
                                                <td><?php echo $row[1] ?></td>
                                                <td align="center"><a
                                                        href="editalternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>"><i
                                                            class="fa fa-edit fa-fw"></i> </td>
                                                <td align="center"><a
                                                        href="hapusalternatif.php?id_alternatif=<?php echo $row['id_alternatif'] ?>"><i
                                                            class="fa fa-trash fa-fw"></i> </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!--tabel alternatif-->
                                </div>
                            </div>
                        </div>
                        <!--panel body-->
                    </div>
                </div>
            </div>


        </div>

    </div>

    <!--plugin-->
    <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>