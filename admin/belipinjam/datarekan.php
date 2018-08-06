<?php
session_start();
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
 ?>

<a href="index.php?halaman=keranjangrekan" class="btn btn-danger">kembali</a>
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
  <?php foreach ($_SESSION["keranjangrekan"] as $id_produk => $jumlah): ?>
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
<!-- <form class="" action="belipinjam/datarekan.php" method="get">
  <label>nama rekan</label>

  <button type="submit" name="button">submit</button>
</form> -->
<form class="" action="index.php?halaman=datarekan" method="post">
  <div class="col-sm-8">
    <input class="form-control" name="namarekan" id="focusedInput" placeholder="NAMA REKAN" type="text" >
  </div>
    <button class="btn btn-primary" name="btnrekan">Pembelian</button>

</form>


<?php
if (isset($_POST["btnrekan"])) {
  // $databarang = $pecah['id_databarang'];
  $namarekan  = $_POST['namarekan'];
  $totalharga = $totalbelanja;
  $mysqli->query("INSERT INTO pembelian_rekan (nama_rekan, total_belipinjam,tgl_rek) VALUES ('$namarekan','$totalharga',now() )") or die( mysqli_error($mysqli));

  // mendapatkan id data_penjualan data_jual
  $id_rekanan =  $mysqli->insert_id;
  foreach ($_SESSION["keranjangrekan"] as $id_produk => $jumlah) {
    $hrgta = $_SESSION["subsementara"][$id_produk];
      $mysqli->query("INSERT INTO jualrek (id_rekan,id_databarang,jumlahbeli,id_hargarek) VALUES ('$id_rekanan','$id_produk','$jumlah','$hrgta')") or die( mysqli_error($mysqli));
    }
  // keranjang kosong
  unset($_SESSION["keranjangrekan"]);
  unset($_SESSION["subsementara"]);

  echo "<script>alert('pembelian pinjam sukses');</script>";
  echo "<script>location='index.php?halaman=pembelianrekanan';</script>";

}
 ?>
