<?php
session_start();
 ?>

<h2>Loporan Pelunasan</h2>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>
      <tr>
        <th>No</th>
        <th>nama rekan</th>
        <th>total pelunasan</th>
        <th>tanggal transaksi</th>
        <th>tanggal pelunasan</th>
        <th>aksi</th>
      </tr>
    </thead>
  </div>

  <!-- data jual produk per namarekan -->
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambildata = $mysqli->query("SELECT * FROM pelunasan");?>
    <?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>
    <tr>
      <td scope="row"><?php echo $nomor; ?></td>
      <td><?php echo $pecahdata['nm_rekan']; ?></td>
      <td><?php echo "Rp. ", number_format($pecahdata['total_lunas']); ?></td>
      <td><?php echo date('d F Y', strtotime($pecahdata['tgl_transaksi'])); ?></td>
      <td><?php echo date('d F Y', strtotime($pecahdata['tgl_lunas'])); ?></td>
      <td>
        <a href="index.php?halaman=detailpelunasan&id=<?php echo $pecahdata['id_lunas']; ?>" class="btn btn-info">detail</a>
      </td>

    </tr>
    <?php $nomor++ ?>
    <?php $totalbelanja+=$pecahdata['total_lunas']; ?>
  <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="2">Total masuk</th>
      <th>Rp. <?php echo number_format($totalbelanja); ?></th>
    </tr>
  </tfoot>
<!-- data jual per produk -->
</table>
