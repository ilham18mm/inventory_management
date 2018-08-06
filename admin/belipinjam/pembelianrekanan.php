<?php
session_start();
 ?>
 <a class="btn btn-danger" href="index.php?halaman=keranjangbayar">pembayaran</a>

<h2>Pembelian rekanan Loporan sementara</h2>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>
      <tr>
        <th>No</th>
        <th>nama rekan</th>
        <th>total pembelian</th>
        <th>tanggal transaksi</th>
        <th>aksi</th>
      </tr>
    </thead>
  </div>

  <!-- data jual produk per namarekan -->
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambildata = $mysqli->query("SELECT * FROM pembelian_rekan");?>
    <?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>
    <tr>
      <td scope="row"><?php echo $nomor; ?></td>
      <td><?php echo $pecahdata['nama_rekan']; ?></td>
      <td><?php echo "Rp. ", number_format($pecahdata['total_belipinjam']); ?></td>
      <td><?php echo date('d F Y', strtotime($pecahdata['tgl_rek'])); ?></td>
      <td>
        <a href="index.php?halaman=detailbelipinjam&id=<?php echo $pecahdata['id_rekan']; ?>"
          class="btn btn-info">detail</a>
          <a href="index.php?halaman=bayar&id=<?php echo $pecahdata['id_rekan']; ?>"class="btn btn-danger">
           bayar</a>
      </td>

    </tr>
    <?php $nomor++ ?>
    <?php $totalbelanja+=$pecahdata['total_belipinjam']; ?>
  <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="2">Total utang rekan</th>
      <th>Rp. <?php echo number_format($totalbelanja); ?></th>
    </tr>
  </tfoot>
<!-- data jual per produk -->
</table>
