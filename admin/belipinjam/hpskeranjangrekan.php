 <?php
 session_start();
 $id_produk = $_GET['id'];
 unset($_SESSION["keranjangrekan"][$id_produk]);
 // session_destroy();

 echo "<script>location='../index.php?halaman=keranjangrekan'</script>";
  ?>
