
<?php
session_start();
$ambildata =  $mysqli->query("SELECT * FROM data_barang WHERE id_databarang='$_GET[id]'");
$pecahdata= $ambildata->fetch_assoc();
$id_produk = $_GET['id'];
// echo "<pre>";
// print_r($id_produk);
// echo "</pre>";
 ?>
<form class="form-horizontal" action="index.php?halaman=editbarang" method="post">
<h2 align="center"><span class="glyphicon glyphicon-briefcase"></span>Edit barang</h2>
<div class="form-group">
  <label class="col-sm-2 control-label">id barang</label>
  <div class="col-sm-10">
    <input class="form-control" name="id" id="focusedInput" value="<?php echo $pecahdata['id_databarang']?>" type="text" >
  </div>
</div>
  <div class="form-group">
    <label class="col-sm-2 control-label">nama barang</label>
    <div class="col-sm-10">
      <input class="form-control" name="namabarang" id="focusedInput" value="<?php echo $pecahdata['nama_barang']?>" type="text" >
    </div>
  </div>
  <div class="form-group">
    <label for="disabledInput" class="col-sm-2 control-label">merek</label>
    <div class="col-sm-10">
      <input class="form-control" name="merek" value="<?php echo $pecahdata['merk']?>" type="text">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">kategori</label>
    <div class="col-sm-10">
      <select class="custom-select" name="kategori" id="inputGroupSelect01">
       <?php
       $ambildata = $mysqli->query("SELECT * FROM kategori");
       while ($data = $ambildata->fetch_assoc()) {
         echo '<option value= "'.$data['id_kategori'].'" >'.$data['nama_kategori'].'</option>';
       }
       ?>
     </select>
    </div>
  </div>

  <div class="form-group">
    <label for="disabledInput" class="col-sm-2 control-label">Satuan</label>
    <div class="col-sm-10">
      <input class="form-control" name="satuan" value="<?php echo $pecahdata['satuan']?>"  type="text">
    </div>
  </div>
  <div class="modal-footer">
    <a href="index.php?halaman=barang" style="text-decoration:none">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">kembali</button></a>
    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
  </div>
</form>

<?php
  if (isset($_POST['edit'])) {
    // code...
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $namabarang = $_POST['namabarang'];
    $merek = $_POST['merek'];
    $satuan= $_POST['satuan'];
    $result = mysqli_query($mysqli, "UPDATE data_barang SET nama_barang ='$namabarang',merk ='$merek',id_kategori='$kategori',satuan='$satuan' WHERE id_databarang= '$id' ") or die( mysqli_error($mysqli));
    echo "<script>location='index.php?halaman=barang'</script>";
  }
?>
