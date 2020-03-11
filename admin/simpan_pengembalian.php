<?php
include ('dbcon.php');

$id=$_GET['id'];
$id_buku = $_GET['id_buku'];

$peminjaman = mysql_query("select jml_pinjam,id_anggota from tblpeminjaman where id_peminjaman = '$id'")or die(mysql_error());
$row_peminjaman = mysql_fetch_array($peminjaman);
$jml_pinjam = $row_peminjaman ['jml_pinjam'];                                           
$id_anggota = $row_peminjaman ['id_anggota']; 



$buku = mysql_query("select stok from tblbuku where id_buku = '$id_buku'")or die(mysql_error());
$row_buku = mysql_fetch_array($buku);
$stok_buku = $row_buku ['stok']; 


//echo $jml_pinjam;
mysql_query("insert into tblpengembalian (id_anggota,id_buku,tgl_pengembalian)
values('$id_anggota','$id_buku',NOW())")or die(mysql_error());

mysql_query("update tblpeminjaman set status='dikembalikan',tgl_pengembalian= NOW() where tblpeminjaman.id_peminjaman='$id' and tblpeminjaman.id_buku = '$id_buku'")or die(mysql_error());
mysql_query("update tblbuku set stok=$stok_buku+$jml_pinjam where id_buku='$id_buku'")or die(mysql_error());

echo '<script language="javascript">';
echo 'alert("Berhasil simpan")';
echo '</script>';
echo "<script>window.location='pengembalian.php'</script>";

 //header('location:pengembalian.php');

?>
