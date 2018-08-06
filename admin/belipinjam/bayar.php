<?php
session_start();
$id_produk = $_GET['id'];

if (isset($_SESSION['bayar'][$id_produk])) {

  $_SESSION['bayar'][$id_produk]=$id_produk;
}
else {
  $_SESSION['bayar'][$id_produk]=$id_produk;
}
// echo "<pre>";
// print_r($_SESSION['bayar']);
// 
// echo "</pre>";

// echo "<script>alert('sukses ditambahkan ke keranjang');</script>";
echo "<script>location='index.php?halaman=keranjangbayar'</script>"
 ?>
