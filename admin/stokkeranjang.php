<?php
session_start();
$stokinput = $_POST['stok'];
$id_produk = $_SESSION['idproduk'];

echo $stokinput;
if (isset($_SESSION['ula'][$id_produk])) {

  $_SESSION['keranjang'][$id_produk]+=$stokinput;
}
else {
  $_SESSION['keranjang'][$id_produk]=$stokinput;
}
echo "<script>location='index.php?halaman=keranjang'</script>"

 ?>
