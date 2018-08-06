<?php
session_start();
// foreach ($_SESSION["bayar"] as $idrekan => $jumlah):
// $datajualrek = $mysqli->query("SELECT * FROM jualrek WHERE id_rekan='$idrekan'");
// $dates3 = $mysqli->query("SELECT * FROM jualrek JOIN data_barang ON jualrek.id_databarang = data_barang.id_databarang ");
//
// while ($pecah1=$datajualrek->fetch_array()) {
//
//   $dates3 =  $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$pecah1[2]' ");
//
//   while ($dates4=$dates3->fetch_array()) {
//   // data_barang array ke 2
//     echo "<pre>";
//     print_r($dates4[2]);
//     echo "</pre>";
//     echo "<pre>";
//     print_r($dates4[5]);
//     echo "</pre>";
//   }
//   echo "<pre>";
//   // datanya jualrek Jumlah pembelian
//   print_r($pecah1[3]);
//   echo "</pre>";
//   echo "<pre>";
//   // datanya jualrek total harga beli produk  + jumlah
//   print_r($pecah1[4]);
//   echo "</pre>";
//
// }
// endforeach;
//
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
 ?>
 <div class="">
   <h4>pembelian</h4>
   <table class="table table-striped" id="DataTables">
     <thead>
       <tr>
         <th class="col-md-1">produk</th>
         <th class="col-md-1">harga satuan</th>
         <th class="col-md-1">jumlah</th>
         <th class="col-md-1">sub harga</th>
       </tr>
     </thead>
     <tbody>
      <?php foreach ($_SESSION["bayar"] as $idrekan => $jumlah): ?>
      <?php $datajualrek = $mysqli->query("SELECT * FROM jualrek WHERE id_rekan='$idrekan'");
            $dates3 = $mysqli->query("SELECT * FROM jualrek JOIN data_barang ON jualrek.id_databarang = data_barang.id_databarang ");
      ?>
      <?php
      while ($pecah1=$datajualrek->fetch_array()) {
        $dates3 =  $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$pecah1[2]' ");
        while ($dates4=$dates3->fetch_array()) {
       ?>
       <tr>
         <td><?php echo $dates4[2] ?></td>
         <td><?php echo $dates4[5] ?></td>
       <?php } ?>
         <td><?php echo $pecah1[3] ?></td>
         <td><?php echo $pecah1[4] ?></td>
       </tr>
     <?php } ?>
     <?php endforeach; ?>
     </tbody>
   </table>
 </div>

 <a href="index.php?halaman=pembelianrekanan" class="btn btn-primary">Tambah data rekan</a>
 <a href="belipinjam/hpskeranjangrekan.php"  class="btn btn-danger">Reset Pembayaran</a>

 <div class="">
   <table class="table table-striped" id="DataTables">
     <thead>
       <tr>
         <th class="">No</th>
         <th class="">nama rekan</th>
         <th class="">Sub harga</th>
         <th class="">tanggal</th>
       </tr>
     </thead>
   <tbody>
     <?php $nomor = 1?>
     <?php foreach ($_SESSION["bayar"] as $idrekan => $jumlah): ?>
       <!-- tampilkan produk yang telah masuk kekeranjang  -->
       <?php
       $ambildata = $mysqli->query("SELECT * FROM pembelian_rekan WHERE id_rekan='$idrekan'");
       $pecah = $ambildata->fetch_assoc();
        ?>
     <tr>
       <td><?php echo $nomor ?></td>
       <td><?php echo $pecah['nama_rekan']; ?></td>
       <td>Rp.<?php echo number_format($pecah['total_belipinjam']); ?></td>
       <td><?php echo date('d F Y', strtotime($pecah['tgl_rek'])); ?></td>
     </tr>
     <?php $nomor++; ?>
     <?php $totalbelanja+=$pecah['total_belipinjam']; ?>
     <?php endforeach ?>
   </tbody>
   <tfoot>
     <tr>
       <th colspan="1"></th>
       <th >Total utang rekan</th>
       <th>Rp. <?php echo number_format($totalbelanja); ?></th>
     </tr>
   </tfoot>
   </table>
 </div>
<form class="" action="" method="post">
  <button style="" class="btn btn-primary" name="bayarrek">bayar</button>
</form>

<?php
if (isset($_POST["bayarrek"])) {

  foreach ($_SESSION["bayar"] as $idrekan => $jumlah) {
    $datajualrek = $mysqli->query("SELECT * FROM jualrek WHERE id_rekan='$idrekan'");
    $dates3 = $mysqli->query("SELECT * FROM jualrek JOIN data_barang ON jualrek.id_databarang = data_barang.id_databarang ");
    while ($pecah1=$datajualrek->fetch_array()) {
      $dates3 =  $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$pecah1[2]' ");
        while ($dates4=$dates3->fetch_array()) {
        // $namarekanan = $pecah['nama_rekan'];
        // $sub_harga = $pecah['total_belipinjam'];
        // $tgl_transaksi = $pecah['tgl_rek'];
        $brg = $dates4[0];
        $jml = $pecah1[3];
        $ambildata = $mysqli->query("SELECT * FROM pembelian_rekan WHERE id_rekan='$idrekan'");
        while ( $dates5= $ambildata->fetch_array()) {
          $namarekanan = $dates5[1];
          $sub_harga = $dates5[2];
          $tgl_transaksi = $dates5[3];
          $mysqli->query("INSERT INTO simpan_data (id_rek_jual,id_databarang,jmljl,tgl_trnsaksi,nama_rekan) VALUES ('$idrekan','$brg','$jml', now(), '$namarekanan' )") or die( mysqli_error($mysqli));
        }
        // data_barang array ke 2
      }
    }
    $ambildata = $mysqli->query("SELECT * FROM pembelian_rekan WHERE id_rekan='$idrekan'");
    while ( $dates5= $ambildata->fetch_array()) {
      $namarekanan = $dates5[1];
      $sub_harga = $dates5[2];
      $tgl_transaksi = $dates5[3];
      $mysqli->query("INSERT INTO pelunasan (nm_rekan,total_lunas,tgl_transaksi,tgl_lunas) VALUES ('$namarekanan','$sub_harga','$tgl_transaksi', now() )") or die( mysqli_error($mysqli));
    }
    $ambildata =  $mysqli->query("DELETE FROM pembelian_rekan WHERE id_rekan =$idrekan ");
  }


  // keranjang kosong
  unset($_SESSION["bayar"]);

  echo "<script>alert('pembayaran sukses');</script>";
  echo "<script>location='index.php?halaman=pembelianrekanan';</script>";

}
 ?>
