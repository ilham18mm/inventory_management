<?php
// $dates =  $mysqli->query("SELECT * FROM jualrek WHERE id_rekan='$_GET[id]' ");
// $dates3 = $mysqli->query("SELECT * FROM jualrek JOIN data_barang ON jualrek.id_databarang = data_barang.id_databarang ");
// while ($dates2=$dates->fetch_array()) {
// $dates3 =  $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$dates2[2]' ");
// while ($dates4=$dates3->fetch_array()) {
//   echo "<pre>";
  // data_barang array ke 2
  // print_r($dates4[2]);
  // echo "</pre>";
// }
// echo "<pre>";
// datanya jualrek Jumlah pembelian
// print_r($dates2[3]);
// echo "</pre>";

// echo "<pre>";
// datanya jualrek total harga beli produk  + jumlah
// print_r($dates2[4]);
// echo "</pre>";

  // echo "<pre>";
  // datanya jualrek
  // print_r($dates2);
  // echo "</pre>";
// };
 ?>
 <a href="index.php?halaman=pelunasan" class="btn btn-danger">kembali</a>


<h1>Detail Pelunasan</h1>
<?php $ambildata = $mysqli->query("SELECT * FROM pelunasan WHERE id_lunas ='$_GET[id]'");?>
<?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>
  <h4> Atas nama: <?php echo $pecahdata['nm_rekan']; ?></h4>
  <h4> Tanggal transaksi: <?php echo date('d F Y', strtotime($pecahdata['tgl_transaksi'])); ?></h4>
  <h4> Tanggal pelunasan: <?php echo date('d F Y', strtotime($pecahdata['tgl_lunas'])); ?></h4>
  <h2> Total: Rp.<?php echo number_format($pecahdata['total_lunas']); ?></h2>
<?php } ?>
