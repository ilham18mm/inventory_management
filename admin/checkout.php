<?php
session_start();
// echo $_GET['stok'];
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
 ?>
<a href="index.php?halaman=keranjang" class="btn btn-danger">kembali</a>
 <table class="table table-hover">
   <thead>
     <tr>
       <th class="col-md-1">No</th>
       <th class="col-md-2">nama barang</th>
       <th class="col-md-2">harga</th>
       <th class="col-md-2">Jumlah</th>
       <th class="col-md-3">sub harga</th>
     </tr>
   </thead>
 <tbody>
   <?php $nomor = 1?>
   <?php $totalbelanja = 0; ?>
   <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
     <!-- tampilkan produk yang telah masuk kekeranjang  -->
     <?php
     $ambildata = $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$id_produk'");
     $pecah = $ambildata->fetch_assoc();
     $sub_harga = $pecah['harga_jual']*$jumlah;
      ?>

   <tr>
     <td><?php echo $nomor ?></td>
     <td><?php echo $pecah['nama_barang']; ?></td>
     <td>Rp.<?php echo number_format($pecah['harga_jual']); ?></td>
     <td><?php echo $jumlah; ?></td>
     <td>Rp.<?php echo number_format($sub_harga); ?></td>
   </tr>
   <?php $nomor++; ?>
   <?php $totalbelanja+=$sub_harga; ?>
   <?php endforeach ?>
 </tbody>
 <tfoot>
   <tr>
     <th></th>
     <th colspan="3">Total Pembelian </th>
     <th>Rp. <?php echo number_format($totalbelanja); ?></th>
   </tr>
 </tfoot>
 </table>
 <form class="" action="index.php?halaman=checkout" method="post">
   <button class="btn btn-primary" name="checkout">checkout</button>
 </form>



<?php
if (isset($_POST["checkout"])) {
  // code...
  $databarang = $pecah['id_databarang'];
  $totalharga = $totalbelanja;
  // $tgl=date('y m d');
  $mysqli->query("INSERT INTO data_jual (id_databarang, total_harga) VALUES ('$databarang','$totalharga')") or die( mysqli_error($mysqli));

  // mendapatkan id data_penjualan data_jual
  $id_penjualan =  $mysqli->insert_id;
  foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
    $namarekan = " ";
    $mysqli->query("INSERT INTO jual (id_datajual,id_databarang,jumlahjl, tanggal_beli, namarekan) VALUES ('$id_penjualan','$id_produk','$jumlah', now(), ' ') ") or die( mysqli_error($mysqli));
    $mysqli->query("INSERT INTO simpan_data (id_rek_jual,id_databarang,jmljl, tgl_trnsaksi, nama_rekan) VALUES ('$id_penjualan','$id_produk','$jumlah', now(), ' ') ") or die( mysqli_error($mysqli));

  }
  // keranjang kosong
  unset($_SESSION["keranjang"]);

  echo "<script>alert('pembelian sukses');</script>";
  echo "<script>location='index.php?halaman=transaksipenjualan';</script>";

}
 ?>
