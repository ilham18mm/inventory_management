<?php
session_start();
$id_produk = $_GET['id'];

if (isset($_SESSION['keranjangrekan'][$id_produk])) {

  $_SESSION['keranjangrekan'][$id_produk]+=1;
  // $_SESSION['keranjangrekan'][$id_produk]=$sub_harga;

}
else {
  $_SESSION['keranjangrekan'][$id_produk]=1;

}



// echo "<pre>";
// print_r($_SESSION);
//
// echo "</pre>";

// echo "<script>alert('sukses ditambahkan ke keranjang');</script>";
echo "<script>location='index.php?halaman=keranjangrekan'</script>"
 ?>
