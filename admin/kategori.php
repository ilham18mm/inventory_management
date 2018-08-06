<h2><span class="glyphicon glyphicon-briefcase"></span>  Kategori Barang</h2>
<button style="margin-bottom:20px" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info col-md-2">
  <span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<!-- dialog -->
<form class="" action="index.php?halaman=kategori" method="post">
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Input Kategori Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
             <label for="inputkodeproduk" class="col-sm-5 col-form-label">Kode Kategori</label>
             <div class="col-sm-7">
              <input type="text" class="form-control" name="kode_produk" id="inputkodeproduk" placeholder="kode produk">
            </div>
            <br>
            <br>

            <label for="inputkodeproduk" class="col-sm-5 col-form-label">Nama Kategori</label>
            <div class="col-sm-7">
             <input type="text" class="form-control" name="kategori" id="inputkodeproduk" placeholder="Nama Kategori">
           </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" name="add" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
    </div>
  </div>
</form>
<!-- akhir dialog -->

<!-- logic input data -->
<?php
if (isset($_POST['add'])) {
  $kode_produk = $_POST['kode_produk'];
  $kategori = $_POST['kategori'];
  $result = mysqli_query($mysqli, "INSERT INTO kategori(kode_produk, nama_kategori) VALUES('$kode_produk','$kategori')") or die( mysqli_error($mysqli));
}
 ?>
<br/>
<br/>

<div class="col-md-12">
  <table class="table table-hover" id="DataTables">
  <thead>
    <tr>
      <th class="col-md-1">No</th>
      <th class="col-md-3">kode</th>
      <th class="col-md-3">nama kategori</th>
      <th class="col-md-3">Opsi/evant</th>
    </tr>
  </thead>
<tbody>
  <?php $nomor = 1; ?>
  <?php $ambildata = $mysqli->query("SELECT * FROM kategori");?>
  <?php while ($pecahdata = $ambildata->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $pecahdata['kode_produk']; ?></td>
    <td><?php echo $pecahdata['nama_kategori'] ?></td>
    <td>
      <a href="#" class="btn btn-info">Detail</a>
      <a href="#" class="btn btn-warning">Edit</a>
      <a href="#" class="btn btn-danger">hapus</a>
    </td>
  </tr>
  <?php $nomor++ ?>
<?php } ?>
</tbody>
</table>


</div>
