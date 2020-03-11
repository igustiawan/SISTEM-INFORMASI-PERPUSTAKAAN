<?php
include('dbcon.php');
if (isset($_POST['submit'])){
$nama_depan=$_POST['nama_depan'];
$nama_belakang=$_POST['nama_belakang'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];

mysql_query("insert into tblanggota(nama_depan,nama_belakang,jenis_kelamin,alamat,no_hp,status) values('$nama_depan','$nama_belakang','$jenis_kelamin','$alamat','$no_hp','Aktif')")or die(mysql_error());


header('location:anggota.php');
}
?>
