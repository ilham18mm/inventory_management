<nav class="navbar navbar-default">
  <div class="">
    <ul class="nav navbar-nav">
      <li>
        <a href="index.php?halaman=keranjangrekan">keranjang</a>
      </li>
    </ul>
  </div>
</nav>
<h2>Transaksi Beli Pinjam</h2>
<section class="">
  <div class="">
    <h4>Produk:</h4>
    <div class="">
      <!-- tes table -->
      <table class="table table-striped" id="DataTables">
        <div class="table-responsive-sm col-md-12">
          <thead>
            <tr>
              <th>No</th>
              <th class="col-md-2">nama barang</th>
              <th scope="col">Merek</th>
              <th class="col-md-2">Harga</th>
              <th>Stok satuan</th>
              <th>tambahkan</th>
            </tr>
          </thead>
        </div>
      <tbody>
        <?php $nomor = 1; ?>
        <?php $ambildata = $mysqli->query("SELECT * FROM data_barang");?>
        <?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>
        <tr>
          <td scope="row"><?php echo $nomor; ?></td>
          <td><?php echo $pecahdata['nama_barang']; ?></td>
          <td><?php echo $pecahdata['merk'] ?></td>
          <td>Rp.<?php echo $pecahdata['harga_jual'] ?></td>
          <td><?php echo $pecahdata['stok']?> <?php echo $pecahdata['satuan'] ?></td>
          <td>
            <div class="form-disable">
              <?php
              $idpecah = $pecahdata['id_databarang'];
              if ($pecahdata['stok'] == 0) {
                echo '<a class="btn btn-danger">Kosong</a>';
              }
              else {
                echo '<a class="btn btn-primary" href="index.php?halaman=jualrekan&id='.$idpecah.'">tersedia</a>';
              }
               ?>
            </div>
          </td>
        </tr>
        <?php $nomor++ ?>
        <?php } ?>
      </tbody>
      </table>
      <!-- akhir table tes -->
    </div>
  </div>
</section>
