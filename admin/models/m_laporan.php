<?php
include_once("../models/config.php");
public function tampiltgl($tgl1,$tgl2) {
  $ambildata = $mysqli->query("SELECT * FROM jual  WHERE tanggal_beli BETWEEN '$tgl1' AND '$tgl2'") or die( mysqli_error($mysqli);
  return $ambildata;
}



 ?>
