
<?php

include('dbcon.php');

$tgl_awal= $_POST['tgl_awal_pinjam'];
$tgl_akhir= $_POST['tgl_akhir_pinjam'];

// Koneksi library FPDF
require('fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Laporan Peminjaman',0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,7,'Periode '.$tgl_awal.' dan '.$tgl_akhir.'',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'Id Anggota',1,0);
$pdf->Cell(50,6,'Nama Anggota',1,0);
$pdf->Cell(35,6,'Judul Buku',1,0);
$pdf->Cell(30,6,'Nama Kategori',1,0);
$pdf->Cell(35,6,'Tgl Peminjaman',1,1);
 
$pdf->SetFont('Arial','',10);
$query = mysql_query("select a.id_anggota,b.nama_depan,c.judul_buku,d.nm_kategori,tgl_awal_peminjaman from tblpeminjaman a 
                    inner join tblanggota b on a.id_anggota = b.id_anggota
                    inner join tblbuku c on a.id_buku = c.id_buku
                    inner join tblkategori d on c.id_kategori = d.id_kategori
                    where
                    DATE_FORMAT(tgl_awal_peminjaman, '%d/%m/%Y') between '$tgl_awal' and '$tgl_akhir'");
while ($row = mysql_fetch_array($query)){
    $pdf->Cell(30,6,$row['id_anggota'],1,0);
    $pdf->Cell(50,6,$row['nama_depan'],1,0);
    $pdf->Cell(35,6,$row['judul_buku'],1,0);
    $pdf->Cell(30,6,$row['nm_kategori'],1,0);
    $pdf->Cell(35,6,$row['tgl_awal_peminjaman'],1,1);
}

$pdf->Output();
?>