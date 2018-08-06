<h2>Laporan Pembelian</h2>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>
      <tr>
        <th>No</th>
        <th>nama barang</th>
        <th>merek</th>
        <th>satuan</th>
        <th scope="col">harga beli</th>
        <th>Jumlah</th>
        <th>total pembelian</th>
        <!-- <th>Opsi</th> -->
      </tr>
    </thead>
  </div>

<tbody>
  <?php $nomor = 1; ?>
  <?php $ambildata = $mysqli->query("SELECT * FROM pembelian JOIN databeli ON pembelian.id_pembelian = databeli.id_pembelian
    JOIN data_barang ON pembelian.id_databarang = data_barang.id_databarang"); ?>
  <?php while ($pecahdata =$ambildata->fetch_assoc()) { ?>
  <tr>
    <td scope="row"><?php echo $nomor; ?></td>
    <td><?php echo $pecahdata['nama_barang']; ?></td>
    <td><?php echo $pecahdata['merk']; ?></td>
    <td><?php echo $pecahdata['satuan']; ?></td>
    <td><?php echo number_format($pecahdata['harga_beli']); ?></td>
    <td><?php echo $pecahdata['jumlah']; ?></td>
    <td><?php echo number_format($pecahdata['total_pembelian']); ?></td>
  </tr>
  <?php $nomor++ ?>
  <?php $totalbelanja+=$pecahdata['total_pembelian']; ?>
<?php } ?>
</tbody>
<tfoot>
  <tr>
    <th colspan="3">Total Pengeluaran</th>
    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
  </tr>
</tfoot>
</table>
<a href="laporan/cetak_pembelian.php" target="_blank" class="btn btn-info">Cetak laporan</a>
