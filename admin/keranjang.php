<?php
session_start();
$stokinput = $_GET['stok'];
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
  // code...
  echo "<script>alert('Keranjang kosong silakan pilih barang yang akan di masukan');</script>";
  echo "<script>location='index.php?halaman=transaksipenjualan';</script>";
}
 ?>


<a href="index.php?halaman=transaksipenjualan" class="btn btn-primary">Lanjut Belanja</a>
 <table class="table table-hover">

   <thead>
     <tr>
       <th class="col-md-1">No</th>
       <th class="col-md-3">nama barang</th>
       <th class="col-md-1">harga</th>
       <th class="col-md-1">Jumlah</th>
       <th class="col-md-3">sub harga</th>
       <th class="col-md-3">aksi</th>
     </tr>
   </thead>
 <tbody>
   <?php $nomor = 1?>
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

     <form class="" action="stokkeranjang.php" method="post">
       <td>
         <input class="form-control" name="stok" value=<?php echo $jumlah; ?> type="text" >
         <input type="submit" class="btn btn-danger" value="Edit jumlah" >
       </td>
     </form>
     <?php
      // $stok = $_GET['stok'];
      $_SESSION['idproduk'] = $id_produk;
     ?>
     <td>Rp.<?php echo number_format($sub_harga); ?></td>
     <td>
       <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a> <br><br>
     </td>
   </tr>
   <?php $nomor++; ?>
   <?php endforeach ?>
 </tbody>
 </table>
<a href="hapusdatakeranjang.php"  class="btn btn-danger">Reset pembelian</a>
<?php
if ($jumlah > $pecah['stok']) {
  echo "<script>alert('stok tidak mencukupi');</script>";
  echo 'ubah jumlah, barang yang tersisa hanya ', $pecah['stok'];
}else {
  true;
  echo '<a href="index.php?halaman=checkout" class="btn btn-info">Pembayaran</a>';
}
 ?>
