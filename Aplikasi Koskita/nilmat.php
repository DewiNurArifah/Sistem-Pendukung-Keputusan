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

</head>

<body>

    <div class="container" style=" width: 100%">

        <div class="row">

            <div class="col">
                <div class="">
                    <h1 style="margin-left: 260px; padding-top: 10px; padding-bottom: 10px; color: #044750;">
                        Nilai Matriks
                    </h1>
                    <nav aria-label="breadcrumb" style="margin-left: 250px;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nilai Matriks</li>
                        </ol>
                    </nav>
                    <div class="col-lg-5" style="margin-left: 230px;">
                        <div class=" panel panel-default">
                            <!--tabel-tabel dan form-->
                            <div class="container">
                                <!--container-->
                                <div class="row">
                                    <!--row-->
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading text-center">
                                                Nilai Matriks
                                            </div>

                                            <div class="panel-body">
                                                <!--form pengisian-->
                                                <div class="row">
                                                    <div class="col-lg-6 col-lg-offset-3">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading text-center">
                                                                Alternatif
                                                            </div>

                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <form class="form" action="tambahnilmat.php"
                                                                            method="post">
                                                                            <div class="form-group">
                                                                                <select class="form-control"
                                                                                    name="alter">
                                                                                    <option>Nama Alternatif</option>
                                                                                    <?php
                                                                                    //ambil data dari database
                                                                                    $nama = $koneksi->query('SELECT * FROM tab_alternatif ORDER BY nama_alternatif');
                                                                                    while ($datalter = $nama->fetch_array()) {
                                                                                        echo "<option value=\"$datalter[id_alternatif]\">$datalter[nama_alternatif]</option>\n";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <select class="form-control"
                                                                                    name="krit">
                                                                                    <option>Nama Kriteria</option>
                                                                                    <?php
                                                                                    //ambil data dari database
                                                                                    $krit = $koneksi->query('SELECT * FROM tab_kriteria ORDER BY nama_kriteria');
                                                                                    while ($datakrit = $krit->fetch_array()) {
                                                                                        echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[nama_kriteria]</option>\n";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <select class="form-control"
                                                                                    name="nilai">
                                                                                    <option>Nilai</option>
                                                                                    <?php
                                                                                    //ambil data dari database
                                                                                    $poin = $koneksi->query('SELECT * FROM tab_poin ORDER BY poin');
                                                                                    while ($datapoin = $poin->fetch_array()) {
                                                                                        echo "<option value=\"$datapoin[id_poin]\">$datapoin[poin]</option>\n";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit"
                                                                                    class="btn btn-success">Proses</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--tabel-tabel-->
                                                    <div class="row">
                                                        <!--tabel alternatif-->
                                                        <div class="col-xs-6 col-md-4">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading text-center">
                                                                    Tabel Alternatif
                                                                </div>

                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <?php
                                                                            $sql = $koneksi->query('SELECT * FROM tab_alternatif');
                                                                            ?>
                                                                            <table
                                                                                class="table table-striped table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>ID Alternatif</th>
                                                                                        <th>Nama Alternatif</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    while ($row = $sql->fetch_array()) {
                                                                                        echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                                        echo ("<td align=\"left\">" . $row[1] . "</td>");
                                                                                        echo "</tr>";
                                                                                    }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!--tabel kriteria-->

                                                        <div class="col-xs-6 col-md-4">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading text-center">
                                                                    Tabel Kriteria
                                                                </div>

                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <?php
                                                                            $sql = $koneksi->query('SELECT * FROM tab_kriteria');
                                                                            ?>
                                                                            <table
                                                                                class="table table-striped table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>ID Kriteria</th>
                                                                                        <th>Nama Kriteria</th>
                                                                                        <th>Bobot</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    while ($row = $sql->fetch_array()) {
                                                                                        echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                                        echo ("<td align=\"left\">" . $row[1] . "</td>");
                                                                                        echo ("<td align=\"left\">" . $row[2] . "</td>");
                                                                                        echo "</tr>";
                                                                                    }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!--tabel poin-->
                                                        <div class="col-xs-6 col-md-4">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading text-center">
                                                                    Tabel Poin
                                                                </div>

                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <?php
                                                                            $sql = $koneksi->query('SELECT * FROM tab_poin');
                                                                            ?>
                                                                            <table
                                                                                class="table table-striped table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Id Poin</th>
                                                                                        <th>Poin</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    while ($row = $sql->fetch_array()) {
                                                                                        echo ("<tr><td align=\"center\">" . $row[0] . "</td>");
                                                                                        echo ("<td align=\"center\">" . $row[1] . "</td>");
                                                                                        echo "</tr>";
                                                                                    }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--row-->
                            </div>
                            <!--container-->

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Pemberian Nilai
                                            </div>

                                            <div class="panel-body">
                                                <?php
                                                //pemanggilan data, matra dan pangkat
                                                $sql = $koneksi->query("SELECT * FROM tab_topsis
                                        JOIN tab_alternatif ON tab_topsis.id_alternatif=tab_alternatif.id_alternatif
                                        JOIN tab_kriteria ON tab_topsis.id_kriteria=tab_kriteria.id_kriteria") or die(mysqli_error($koneksi));
                                                ?>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>ALTERNATIF</th>
                                                            <th>KRITERIA</th>
                                                            <th>NILAI</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        //menampilkan data
                                                        while ($row = $sql->fetch_array()) {
                                                            $nmkriteria   = $row['nama_kriteria'];
                                                            echo ("<tr><td align=\"center\">" . $no . "</td>");
                                                            echo ("<td align=\"left\">" . $row[4] . "</td>");
                                                            echo ("<td align=\"left\">" . $nmkriteria . "</td>");
                                                            echo ("<td align=\"left\">" . $row[2] . "</td>");
                                                            echo "</tr>";
                                                            $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--row-->
                            </div>
                            <!--container-->

                            <!--tabel penentuan nilai-->
                            <div class="container">
                                <!--container-->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Kebersihan
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Dari pihak luar</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggung jawab bersama</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jadwal piket</td>
                                                            <td>3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Jarak
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1 km < </td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1 km - 500 m</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>500 m > </td>
                                                            <td>3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Keamanan
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>CCTV </td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tinggal bersama pemilik</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggung jawab bersama </td>
                                                            <td>3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Kenyamanan
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Dekat Kampus</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jauh dari Kampus</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dekat mall</td>
                                                            <td>3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Biaya
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>450. 000 - 500.000</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>550.000 - 750.000</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>800.000 - 1.000.000</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1.500.000 - 2.000.000</td>
                                                            <td>4</td>
                                                        </tr>
                                                        <tr>
                                                            <td> 2.500.000 - 3.000.000</td>
                                                            <td>5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Fasilitas
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>K. Mandi dalam, WIFI</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>K. Mandi luar, WIFI</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>K. Mandi luar, WIFI, Tv</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>K. Mandi luar, WIFI, Ac</td>
                                                            <td>4</td>
                                                        </tr>
                                                        <tr>
                                                            <td>K. Mandi luar, WIFI, Ac</td>
                                                            <td>5</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                </div>
                            </div>
                            <!--container-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: -150px;">
                <?php include('sidebar.php') ?>
            </div>
        </div>

    </div>



    <!--plugin-->
    <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>

<!-- <div class="row">
                                    <div class="col-lg-4 col-lg-offset-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Kenyamanan
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Dekat Kampus</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jauh dari Kampus</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dekat mall</td>
                                                            <td>3</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

<!-- <div class="col-lg-4 col-lg-offset-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Tabel Kondisi Kaki
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">Sub Kriteria</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>O</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>X</td>
                                                            <td>1</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Normal</td>
                                                            <td>2</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> -->