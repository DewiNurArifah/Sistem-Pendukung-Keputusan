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
                    <h1 style="margin-left: 260px;padding-top: 10px; padding-bottom: 10px; color: #044750;">
                        Dashboard
                    </h1>
                    <nav aria-label="breadcrumb" style="margin-left: 250px;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="dashboard.php">Dashboard</a></li>
                        </ol>
                    </nav>
                    <header style="margin-left: 260px;padding-top: 40px; padding-bottom: 10px; color: #044750;">
                        <center style="padding:40px 5px; margin: 0px 40px; border-style: outset; border-radius: 8px">
                            <h2>Halaman Utama Administrator <br></h2>

                            <h3>Aplikasi Pemilihan Kos Terbaik dengan Metode TOPSIS</h3>

                        </center>
                    </header>

                </div>
            </div>


        </div>

    </div>

    <!--plugin-->
    <script src="tampilan/js/bootstrap.min.js"></script>

</body>

</html>