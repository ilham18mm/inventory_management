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
 <a href="index.php?halaman=pembelianrekanan" class="btn btn-danger">kembali</a>


<h1>Detail Pembelian</h1>
<?php $ambildata = $mysqli->query("SELECT * FROM pembelian_rekan WHERE id_rekan ='$_GET[id]'");?>
<?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>
  <h4> Rekanan atas nama: <?php echo $pecahdata['nama_rekan']; ?></h4>
  <h4> Pembelian Pada tgl: <?php echo date('d F Y', strtotime($pecahdata['tgl_rek'])); ?></h4>
<?php } ?>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>
      <tr>
        <th>nama produk</th>
        <th>jumlah</th>
        <th>total pembelian/produk</th>
        <!-- <th>Opsi</th> -->
      </tr>
    </thead>
  </div>
<tbody>

  <?php $nomor = 1; ?>
  <?php $totalbelanja = 0; ?>
  <?php
    $dates =  $mysqli->query("SELECT * FROM jualrek WHERE id_rekan='$_GET[id]' ");
    ?>
  <?php while ($dates2=$dates->fetch_array()) { ?>
    <?php $dates3 =  $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$dates2[2]' ");?>
    <?php while ($dates4=$dates3->fetch_array()) { ?>
      <tr>
        <td> <?php echo $dates4[2]; ?></td>

      <?php } ?>


    <td><?php echo $dates2[3]; ?></td>
    <td><?php echo 'Rp. ', number_format($dates2[4]) ; ?></td>
  </tr>
<?php $totalbelanja+=$dates2[4]; ?>
<?php } ?>
</tbody>
<tfoot>
  <tr>
    <th></th>
    <th colspan="1">Total Pembelian </th>
    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
  </tr>
</tfoot>

</table>
