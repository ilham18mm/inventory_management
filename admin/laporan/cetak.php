<?php
include_once("fpdf.php");
include_once("../models/config.php");

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->cell(0,5,'CV. TOKO KITA','0','1','C',false) ;
$pdf->SetFont('Arial','i',8);
$pdf->cell(0,5,'Alamat : Jl. bau massepe','0','1','C',false);
$pdf->cell(0,2,'code by @deramadhan','0','1','C', false);
$pdf->ln(3);
$pdf->cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,'Laporan data barang terjual','0','1','L',false);
$pdf->Ln(10);

$pdf->setFont('Arial','B',7);
$pdf->cell(8,6,'No.',1,0,'C');
$pdf->cell(30,6,'nama barang',1,0,'C');
$pdf->cell(25,6,'nama rekan',1,0,'C');
$pdf->cell(20,6,'Merek',1,0,'C');
$pdf->cell(20,6,'Satuan',1,0,'C');
$pdf->cell(20,6,'Harga Jual',1,0,'C');
$pdf->cell(20,6,'Jumlah Beli',1,0,'C');
$pdf->cell(23,6,'tgl',1,0,'C');
$pdf->cell(30,6,'sub harga',1,0,'C');
$pdf->Ln(2);
$no = 0;
$totalbelanja = 0;


if ($_GET['cetak_priode']) {
  $tgl1 = $_GET['tanggalawal'];
  $tgl2 = $_GET['tanggalakhir'];
  $ambildata = $mysqli->$ambildata = $mysqli->query("SELECT * FROM simpan_data JOIN data_barang ON simpan_data.id_databarang = data_barang.id_databarang
    AND (tanggal_beli BETWEEN '$tgl1' AND '$tgl2' ) ");
}
else {
  $ambildata = $mysqli->query("SELECT * FROM simpan_data JOIN data_barang ON simpan_data.id_databarang = data_barang.id_databarang");
}

while ($pecahdata = $ambildata->fetch_array()) {
  $sub_harga = $pecahdata['harga_jual'] * $pecahdata['jmljl'];
  $no++;
  $pdf->Ln(4);
  $pdf->SetFont('Arial','',8);
  $pdf->Cell(8,4,$no.".",1,0,'C');
  $pdf->Cell(30,4,$pecahdata['nama_barang'],1,0,'L');
  $pdf->Cell(25,4,$pecahdata['nama_rekan'],1,0,'L');
  $pdf->Cell(20,4,$pecahdata['merk'],1,0,'L');
  $pdf->Cell(20,4,$pecahdata['satuan'],1,0,'L');
  $pdf->Cell(20,4,number_format($pecahdata['harga_jual']),1,0,'L');
  $pdf->Cell(20,4,$pecahdata['jmljl'],1,0,'L');
  $pdf->Cell(23,4,date('d F Y', strtotime($pecahdata['tgl_trnsaksi'])),1,0,'L');
  $pdf->Cell(30,4,number_format($sub_harga),1,0,'R');
  $totalbelanja+=$sub_harga;
};
$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->cell(50,5,'Total Pembelian','0','1','C',false);
$pdf->cell(50,6,"Rp"." ".number_format($totalbelanja),'0','1','C', false);

$pdf->Output('');

?>
