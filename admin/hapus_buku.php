<?php
include('dbcon.php');
$id=$_GET['id'];
mysql_query("update tblbuku set status = 'Arsip' where id_buku='$id'")or die(mysql_error());
header('location:buku.php');
?>