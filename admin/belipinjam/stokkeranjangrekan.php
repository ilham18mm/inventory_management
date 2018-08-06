<?php
session_start();
$stokinput = $_POST['stoke'];
$id_produk = $_SESSION['idproduk'];
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// echo $stokinput;
if (isset($_SESSION['ulai'][$id_produk])) {

  $_SESSION['keranjangrekan'][$id_produk]+=$stokinput;
  $_SESSION['subsementara'][$id_produk]=$sub_harga;
}
else {
  $_SESSION['keranjangrekan'][$id_produk]=$stokinput;
  $_SESSION['subsementara'][$id_produk]=$sub_harga;
}
echo "<script>location='../index.php?halaman=keranjangrekan'</script>"

 ?>
