<h2><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h2>
<button style="margin-bottom:20px" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info col-md-2">
  <span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<!-- dialog  input barang -->
  <form class="" action="index.php?halaman=barang" method="post">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input Data Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body col-centered">
            <div class="form-group row">
              <label class="input-group-text col-sm-5 col-form-label" for="inputGroupSelect01">Kategori</label>
              <!-- <label class="input-group-text col-sm-5 col-form-label" for="inputGroupSelect01">Kategori</label> -->
              <div class="col-sm-7">
                <select class="custom-select" name="kategori" id="inputGroupSelect01">
                 <?php
                 $ambildata = $mysqli->query("SELECT * FROM kategori");
                 while ($data = $ambildata->fetch_assoc()) {
                   echo '<option value= "'.$data['id_kategori'].'" >'.$data['nama_kategori'].'</option>';
                 }
                 ?>
               </select>
               <a href="index.php?halaman=kategori" class="btn" style="text-decoration:none">tambah kategori</a>
              </div>

              <br>
              <br>

              <div class="col-sm-7">
               <input type="text" name="namabarang" class="form-control" id="inputkodeproduk" placeholder="nama Barang">
             </div>
             <br>

             <br>
             <br>
              <div class="col-sm-7">
               <input type="text" name="merek" class="form-control" id="inputkodeproduk" placeholder="merek" >
             </div>
             <br><br>

             <div class="col-sm-7">
              <input type="number" name="hrg_beli" class="form-control" id="inputkodeproduk" placeholder="Harga beli" >
            </div>
            <br><br>

            <div class="col-sm-7">
             <input type="number" name="hrg_jual" class="form-control" id="inputkodeproduk" placeholder="harga jual" >
           </div>
           <br><br>

           <div class="col-sm-7">
            <input type="text" name="satuan" class="form-control" id="inputkodeproduk" placeholder="Satuan" >
          </div>
           <!-- <label for="inputkodeproduk" class="col-sm-5 col-form-label">stok</label>
           <div class="col-sm-7">
            <input type="number" name="stok" class="form-control" id="inputkodeproduk">
          </div> -->

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Save changes</button>
            <!-- <button style="margin-bottom:20px" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info col-md-2">
              <span class="glyphicon glyphicon-plus"></span>Tambah Barang</button> -->
          </div>
        </div>
      </div>
      </div>
    </div>
  </form>

  <?php
    if (isset($_POST['add'])) {
      // code...
      $kategori = $_POST['kategori'];
      $namabarang = $_POST['namabarang'];
      $merek = $_POST['merek'];
      $hrg_beli= $_POST['hrg_beli'];
      $hrg_jual = $_POST['hrg_jual'];
      $stok= $_POST['stok'];
      $satuan= $_POST['satuan'];

      $result = mysqli_query($mysqli, "INSERT INTO data_barang(id_kategori,nama_barang,merk,harga_beli,harga_jual,stok,satuan) VALUES('$kategori','$namabarang','$merek','$hrg_beli','$hrg_jual','$stok','$satuan')") or die( mysqli_error($mysqli));
    }
  ?>
<br/>
<br/>

<div class="col-md-12">

  <!-- sengaja kosong  -->
  <div class="col-md-8">
  </div>
    <table class="table table-striped" id="DataTables">
      <div class="table-responsive-sm col-md-12">
        <thead>
          <tr>
            <th>No</th>
            <th>kotegori</th>
            <th class="col-md-2">nama barang</th>
            <th scope="col">Merek</th>
            <th class="col-md-2">Harga Beli</th>
            <th class="col-md-2">Harga Jual</th>
            <th>Stok</th>
            <th >satuan</th>
            <th class="col-md-6">Opsi/evant</th>
          </tr>
        </thead>
      </div>

    <tbody>
      <?php $nomor = 1; ?>
      <?php $ambildata = $mysqli->query("SELECT * FROM data_barang JOIN kategori ON data_barang.id_kategori=kategori.id_kategori"); ?>
      <?php while ($pecahdata =$ambildata->fetch_assoc()) { ?>
      <tr>
        <td scope="row"><?php echo $nomor; ?></td>
        <td><?php echo $pecahdata['nama_kategori']; ?></td>
        <td><?php echo $pecahdata['nama_barang']; ?></td>
        <td><?php echo $pecahdata['merk']; ?></td>
        <td><?php echo $pecahdata['harga_beli']; ?></td>
        <td><?php echo $pecahdata['harga_jual']; ?></td>
        <td><?php echo $pecahdata['stok']; ?></td>
        <td><?php echo $pecahdata['satuan']; ?></td>
        <td>
          <a href="index.php?halaman=transaksipembelianproduk&id=<?php echo $pecahdata['id_databarang']; ?>"
            class="btn btn-info">Beli</a>
          <a href="index.php?halaman=hapusbarang&id=<?php echo $pecahdata['id_databarang']; ?>"
            onclick="javascript: return confirm('Anda yakin hapus data barang ?')"
            class="btn btn-warning">hapus</a>
          <a href="index.php?halaman=editbarang&id=<?php echo $pecahdata['id_databarang']; ?>" class="btn btn-danger">Edit</a>
        </td>
      </tr>
      <?php $nomor++ ?>
    <?php } ?>
    </tbody>
    </table>
  <!-- </div> -->
</div>
