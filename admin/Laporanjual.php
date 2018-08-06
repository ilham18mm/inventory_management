<h2>Laporan Penjualan Produk</h2>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>
      <tr>
        <th>No</th>
        <th>rekan</th>
        <th>nama barang</th>
        <th>merek</th>
        <th>satuan</th>
        <th scope="col">harga jual</th>
        <th>Jumlah</th>
        <th>sub harga</th>
        <th>tanggal beli </th>
        <!-- <th>Opsi</th> -->
      </tr>
    </thead>
  </div>

<tbody>
  <?php $nomor = 1; ?>
  <?php $totalbelanja = 0; ?>
  <?php $ambildata = $mysqli->query("SELECT * FROM simpan_data JOIN data_barang ON simpan_data.id_databarang = data_barang.id_databarang"); ?>
  <?php while ($pecahdata =$ambildata->fetch_assoc()) { ?>
  <?php $sub_harga = $pecahdata['harga_jual'] * $pecahdata['jmljl'] ?>
  <tr>
    <td scope="row"><?php echo $nomor; ?></td>
    <td><?php echo $pecahdata['nama_rekan']; ?></td>
    <td><?php echo $pecahdata['nama_barang']; ?></td>
    <td><?php echo $pecahdata['merk']; ?></td>
    <td><?php echo $pecahdata['satuan']; ?></td>
    <td><?php echo number_format($pecahdata['harga_jual']); ?></td>
    <td><?php echo $pecahdata['jmljl']; ?></td>
    <td>Rp .<?php echo number_format($sub_harga) ?></td>
    <td><?php echo date('d F Y', strtotime($pecahdata['tgl_trnsaksi'])) ; ?></td>
  </tr>
  <?php $nomor++ ?>

  <?php $totalbelanja+=$sub_harga; ?>
<?php } ?>
</tbody>
<tfoot>
  <tr>
    <th colspan="3">Total Pemasukan penjualan produk</th>
    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
  </tr>
</tfoot>
</table>

<div class="col-md-2">
<a href="laporan/cetak.php" target="_blank" class="btn btn-info">Cetak laporan</a>
</div>
<button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info">Cetak priode</button>
<!-- dialog  input barang -->
  <form class="" action="laporan/cetak.php" method="get" target="_blank">
    <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input tanggal laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body col-centered">
            <div class="form-group row">
              <label class="input-group-text col-md-3 col-form-label" for="inputGroupSelect01">tanggal awal</label>
              <div class="col-sm-5">
               <input type="date" name="tanggalawal" class="form-control">
             </div>
             <br>
            </div>
          </div>

          <div class="modal-body col-centered">
            <div class="form-group row">
              <label class="input-group-text col-md-3 col-form-label" for="inputGroupSelect01">tanggal akhir</label>
              <div class="col-sm-5">
               <input type="date" name="tanggalakhir" class="form-control">
             </div>
             <br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <td>
              <input type="submit" name="cetak_priode" class="btn btn-primary" value="Cetak Laporan">
            </td>
          </div>
        </div>
      </div>
      </div>
    </div>
  </form>
