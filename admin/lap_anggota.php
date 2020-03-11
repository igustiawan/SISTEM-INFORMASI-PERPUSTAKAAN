

<?php

include('dbcon.php');

// Koneksi library FPDF
require('fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Laporan Data Anggota',0,1,'C');
$pdf->SetFont('Arial','B',9);
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'Id',1,0);
$pdf->Cell(50,6,'Nama Anggota',1,0);
$pdf->Cell(35,6,'Jenis Kelamin',1,0);
$pdf->Cell(30,6,'Alamat',1,0);
$pdf->Cell(25,6,'No HP',1,0);
$pdf->Cell(25,6,'Status',1,1);
 
$pdf->SetFont('Arial','',10);
$query = mysql_query("SELECT * FROM tblanggota");
while ($row = mysql_fetch_array($query)){
    $pdf->Cell(10,6,$row['id_anggota'],1,0);
    $pdf->Cell(50,6,$row['nama_depan'],1,0);
    $pdf->Cell(35,6,$row['jenis_kelamin'],1,0);
    $pdf->Cell(30,6,$row['alamat'],1,0);
    $pdf->Cell(25,6,$row['no_hp'],1,0);
    $pdf->Cell(25,6,$row['status'],1,1);
}

$pdf->Output();
?>
