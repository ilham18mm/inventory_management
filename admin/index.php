<?php
include_once("models/config.php");
?>

﻿<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko fotocopy</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- dataTables -->
    <link href="assets/dataTables/datatables.min.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-cls-top " role="navigation" style="margin-bottom: 1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Rumah Fotocopy</a>
            </div>
  <div style="color: white;
padding: 10px 60px 10px 90px;
float: right;
font-size: 16px;"><a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center"></li>
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-bank fa-2x"></i>Home</a>
                    </li>
                    <li><h3>Produk</h3> </li>
                    <li>
                        <a href="index.php?halaman=barang"><i class="	fa fa-archive fa-1x"></i> Data Barang </a>
                    </li>

                    <li><h3>Laporan rekanan</h3></li>
                    <li>
                        <a class=""  href="index.php?halaman=pembelianrekanan"><i class="fa fa-cc-visa fa-1x"></i>Data Pembelian Rekanan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pelunasan"><i class="fa fa-envelope-o	fa-1x"></i> Laporan Pelunasan </a>
                    </li>

                    <li><h3>Laporan</h3> </li>
                    <li>
                        <a href="index.php?halaman=Laporanjual"><i class="fa fa-gears fa-1x"></i> Laporan Penjualan / produk </a>
                    </li>

                    <li>
                        <a href="index.php?halaman=Laporapembelian"><i class="fa fa-hdd-o fa-2x"></i> Laporan Pembelian </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=Laporankeuntungan"><i class="	fa fa-plane fa-2x"></i> Laporan Keuntungan </a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner" class="col-md-12">
              <?php
              if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] =="kategori") {
                  // code...
                  include 'kategori.php';
                }
                elseif ($_GET['halaman'] == "barang") {
                  // code...
                  include 'barang.php';
                }
                elseif ($_GET['halaman'] == "pelunasan") {
                  // code...
                  include 'pelunasan.php';
                }
                elseif ($_GET['halaman'] == "hapusbarang") {
                  // code...
                  include 'hapusbarang.php';
                }
                elseif ($_GET['halaman'] == "pembelianrekanan") {
                  // code...
                  include 'belipinjam/pembelianrekanan.php';
                }
                elseif ($_GET['halaman'] == "transaksipenjualan") {
                  // code...
                  include 'transaksipenjualan.php';
                }
                elseif ($_GET['halaman'] == "pembelian") {
                  // code...
                  include 'pembelian.php';
                }
                elseif ($_GET['halaman'] == "transaksibelipinjam") {
                  // code...
                  include 'belipinjam/transaksibelipinjam.php';
                }
                elseif ($_GET['halaman'] == "transaksipembelianproduk") {
                  // code...
                  include 'transaksipembelianproduk.php';
                }
                elseif ($_GET['halaman'] == "Laporanjual") {
                  // code...
                  include 'Laporanjual.php';
                }
                elseif ($_GET['halaman'] == "Laporapembelian") {
                  // code...
                  include 'Laporapembelian.php';
                }
                elseif ($_GET['halaman'] == "jual") {
                  // code...
                  include 'jual.php';
                }
                elseif ($_GET['halaman'] == "checkout") {
                  // code...
                  include 'checkout.php';
                }
                elseif ($_GET['halaman'] == "keranjang") {
                  // code...
                  include 'keranjang.php';
                }
                elseif ($_GET['halaman'] == "editbarang") {
                  // code...
                  include 'editbarang.php';
                }
                elseif ($_GET['halaman'] == "Laporankeuntungan") {
                  // code...
                  include 'Laporankeuntungan.php';
                }
                elseif ($_GET['halaman'] == "detailpelunasan") {
                  // code...
                  include 'detailpelunasan.php';
                }
                elseif ($_GET['halaman'] == "jualrekan") {
                  // code...
                  include 'belipinjam/jualrekan.php';
                }
                elseif ($_GET['halaman'] == "keranjangrekan") {
                  // code...
                  include 'belipinjam/keranjangrekan.php';
                }
                elseif ($_GET['halaman'] == "checkoutrekan") {
                  // code...
                  include 'belipinjam/checkoutrekan.php';
                }
                elseif ($_GET['halaman'] == "datarekan") {
                  // code...
                  include 'belipinjam/datarekan.php';
                }
                elseif ($_GET['halaman'] == "detailbelipinjam") {
                  // code...
                  include 'belipinjam/detailbelipinjam.php';
                }
                elseif ($_GET['halaman'] == "bayar") {
                  // code...
                  include 'belipinjam/bayar.php';
                }
                elseif ($_GET['halaman'] == "keranjangbayar") {
                  // code...
                  include 'belipinjam/keranjangbayar.php';
                }
              }
              else {
                // code...
                include 'home.php';
              }
               ?>

             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <!-- <script src="assets/js/morris/morris.js"></script> -->
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- dataTables -->
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">

    </script>
    <script type="text/javascript">
      $(document).ready( function () {
        $('#DataTables').DataTable();
      } );
    </script>

</body>
</html>
