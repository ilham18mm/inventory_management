
<!-- tes -->
<?php session_start();

?>

<div class="modal-footer">
  <a href="index.php?halaman=barang" >
  <button type="button" class="btn btn-secondary" data-dismiss="modal">kembali</button></a>
</div>

<h1>pembelian produk</h1>
<table class="table table-striped">
 <thead>
   <tr>
     <th class="col-md-1">Nama Barang</th>
     <th class="col-md-1">Harga beli</th>
     <th class="col-md-1">Satuan</th>
     <th class="col-md-1">Merek</th>
   </tr>
 </thead>
 <tbody>
   <?php
   $id_produk = $_GET['id'];
   // $ambildata = $mysqli->query("SELECT * FROM pembelian_rekan WHERE id_rekan='$idrekan'");
   $ambildata = $mysqli->query("SELECT * FROM data_barang WHERE id_databarang ='$id_produk' ");
   ?>
    <?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>

      <tr>
        <td><?php echo $pecahdata['nama_barang'] ?></td>
        <td><?php echo $pecahdata['harga_beli'] ?></td>
        <td><?php echo $pecahdata['satuan'] ?></td>
        <td><?php echo $pecahdata['merk'] ?></td>

      </tr>
      <?php $idbarang = $pecahdata['id_databarang']; ?>
    <?php } ?>
    <?php echo $idbarang; ?>

 </tbody>
</table>
<form class="" action="index.php?halaman=transaksipembelianproduk" method="post">

  <tr>
    <label for="">id barang</label>
    <td><input class="form-control" name="databarang" id="disabledInput" value="<?php echo $id_produk?>" type="number"></td>

     <h4>tambah stok</h4>
     <td><input type="number" name="jumlah" ></td>
  </tr>



 <a href="index.php?halaman=barang" >
 <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">kembali</button></a>
 <button class="btn btn-primary" name="add">Pembelian</button>
</form>


<?php

 if (isset($_POST["add"])) {
   $id = $_POST['databarang'];
   $jumlah = $_POST['jumlah'];
   $mysqli->query("INSERT INTO databeli(id_barangbeli,jumlah) VALUES ('$id','$jumlah')") or die (mysqli_error($mysqli));
   echo "<script>alert('pembelian berhasil');</script>";
   $id_databeli =  $mysqli->insert_id;
   echo "<script>location='index.php?halaman=pembelian&id=$id_databeli';</script>";
 }

?>
