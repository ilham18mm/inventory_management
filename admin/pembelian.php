<h2 align="center"><span class="glyphicon glyphicon-briefcase"></span>    Update Laporan</h2>

<table class="table table-hover">
<thead>
  <tr>
    <th class="">id pembelian</th>
    <th class="">id barang beli</th>
    <th class="">nama barang</th>
    <th class="">harga beli</th>
    <th class="" >jumlah</th>
    <th class="">harga total</th>
  </tr>
</thead>
<tbody>

     <form class="" action="index.php?halaman=pembelian" method="post">
       <?php
       $id_produk = $_GET['id'];
       $ambildata = $mysqli->query("SELECT * FROM  databeli JOIN data_barang ON databeli.id_barangbeli=data_barang.id_databarang WHERE id_pembelian='$id_produk'  " );
       ?>
        <?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>

       <tr>
         <td><input class="form-control" name="id_beli" id="disabledInput" value="<?php echo $pecahdata['id_pembelian']; ?>" type="number"></td>
         <td><input class="form-control" name="id_barang" id="disabledInput" value="<?php echo $pecahdata['id_barangbeli']; ?>" type="number"></td>
         <td><input class="form-control" name="" id="disabledInput" value="<?php echo $pecahdata['nama_barang']; ?>" type="text"></td>
         <td><input class="form-control" name="" id="disabledInput" value="<?php echo $pecahdata['harga_beli']; ?>" type="number"></td>
         <td><input class="form-control" name="" id="disabledInput" value="<?php echo $pecahdata['jumlah'],' ',$pecahdata['satuan']; ?>" type="text"></td>
         <td><input class="form-control" name="totalbeli" id="disabledInput" value="<?php  echo $pecahdata['jumlah'] * $pecahdata['harga_beli'] ; ?>" type="number"></td>
       </tr>
       <?php } ?>
       <tr>
         <td>
           <button class="btn btn-primary" name="update">Update laporan</button>
         </td>
       </tr>
     </form>
</tbody>
</table>

<?php

 if (isset($_POST["update"])) {
   $id = $_POST['id_beli'];
   $id_barang = $_POST['id_barang'];
   $harga_total = $_POST['totalbeli'];
   $mysqli->query("INSERT INTO pembelian(id_pembelian, id_databarang, total_pembelian) VALUES ('$id','$id_barang','$harga_total')") or die (mysqli_error($mysqli));
   echo "<script>alert('Update Laporan');</script>";
   echo "<script>location='index.php?halaman=barang'</script>";
 }

?>
