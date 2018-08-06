<?php
$id = $_GET['id'];
$ambildata =  $mysqli->query("DELETE FROM data_barang WHERE id_databarang=$id");
// $result = mysqli_query($mysqli, "DELETE FROM data_barang WHERE id=$id");

// header("Location:index.php?halaman=barang");
echo "<script>location='index.php?halaman=barang'</script>";
 ?>
