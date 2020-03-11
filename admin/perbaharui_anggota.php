<?php
include('dbcon.php');
if (isset($_POST['submit'])){
$id=$_POST['id'];
$nama_depan=$_POST['nama_depan'];
$nama_belakang=$_POST['nama_belakang'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$status=$_POST['status'];

mysql_query("update tblanggota set nama_depan='$nama_depan',nama_belakang='$nama_belakang',jenis_kelamin='$jenis_kelamin',alamat = '$alamat',no_hp = '$no_hp',status = '$status' where id_anggota='$id'")or die(mysql_error());


header('location:anggota.php');
}
?>
