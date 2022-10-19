<?php
//koneksi
session_start();
include("koneksi.php");

$alternatif = $_POST['alter'];
$kriteria   = $_POST['krit'];
$poin       = $_POST['nilai'];

//$krit = $koneksi->query('SELECT id_alternatif,id_kriteria FROM tab_topsis');

$tambah = $koneksi->query('SELECT * FROM tab_topsis');
//echo 'data input alternatif:' . $alternatif  . ':   data input kriteria:' . $kriteria . ':   data input poin:' . $poin . '<br>';
if ($row = $tambah->fetch_row()) {

  // while ($datakrit = $krit->fetch_array()) {

  //   echo 'data alternatif:' . $datakrit['id_alternatif']  . ':   data kriteria:' . $datakrit['id_kriteria'] . '<br>';
  //   // echo "<option value=\"$datakrit[id_kriteria]\">$datakrit[id_alternatif]</option>\n";
  //   if (($datakrit['id_alternatif'] != $alternatif) && ($datakrit['id_kriteria'] != $kriteria)) {
  //     echo 'data beda';
  //     // }
  //   } else {
  //     echo 'data beda';
  //     // return $alternatif;
  //     // $masuk = "INSERT INTO tab_topsis VALUES ('" . $alternatif . "','" . $kriteria . "','" . $poin . "')";
  //     // $buat  = $koneksi->query($masuk);
  //   }
  // }
  $masuk = "INSERT INTO tab_topsis VALUES ('" . $alternatif . "','" . $kriteria . "','" . $poin . "')";
  $result1 = mysqli_query($koneksi, $masuk);
  if (!$result1) {
    echo 'haii';
  }

  echo "<script>alert('Input Data Berhasil') </script>";
  echo "<script>window.location.href = \"nilmat.php\" </script>";
}