<h1>Laporan rekapitulasi</h1>


<!-- tabel barang laku -->
<h2>Laporan Penjualan</h2>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>

    </thead>
  </div>

<tbody>
  <?php $nomor = 1; ?>
  <?php $total = 0; ?>
  <?php $ambildata = $mysqli->query("SELECT * FROM simpan_data JOIN data_barang ON simpan_data.id_databarang = data_barang.id_databarang"); ?>
  <?php while ($pecahdata =$ambildata->fetch_assoc()) { ?>
  <?php $sub_harga = $pecahdata['harga_jual'] * $pecahdata['jmljl'] ?>

  <?php $nomor++ ?>

  <?php $total+=$sub_harga; ?>
<?php } ?>
</tbody>
<tfoot>
  <tr>
    <th>Total Pemasukan</th>
    <th>Rp. <?php echo number_format($total); ?></th>
  </tr>
</tfoot>
</table>



<!-- tabel barang beli -->

<h2>Laporan Pembelian</h2>
<table class="table table-striped" id="DataTables">
  <div class="table-responsive-sm col-md-12">
    <thead>
      <tr>
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
  </tr>
  <?php $nomor++ ?>

  <?php $totalbelanja+=$pecahdata['total_pembelian']; ?>
<?php } ?>
</tbody>
<tfoot>
  <tr>
    <th colspan="2">Total Pengeluaran</th>
    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
  </tr>
  <tr>
    <?php
    $keuntungan = $total - $totalbelanja;
     ?>
    <th colspan="2">total keuntungan</th>
    <th> Rp.  <?php echo  number_format($keuntungan) ?></th>
  </tr>
</tfoot>
</table>

<h4></h4>
