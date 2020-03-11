<?php
include('dbcon.php');
if (isset($_POST['submit'])){

$image = $_FILES["image"] ["name"];
$image_name= addslashes($_FILES['image']['name']);
$size = $_FILES["image"] ["size"];
$error = $_FILES["image"] ["error"];

$id=$_POST['id'];
$judul_buku=$_POST['judul_buku'];
$id_kategori=$_POST['id_kategori'];
$penulis=$_POST['penulis'];
$stok=$_POST['stok'];
$penerbit=$_POST['penerbit'];
$isbn=$_POST['isbn'];
$tahun_terbit=$_POST['tahun_terbit'];
/* $date_receive=$_POST['date_receive'];
$date_added=$_POST['date_added']; */
$status=$_POST['status'];
$sinopsis=$_POST['sinopsis'];

if ($error > 0){

$still_profile1 = $row['gambar'];


mysql_query("update tblbuku set judul_buku='$judul_buku',id_kategori='$id_kategori',penulis='$penulis'
,stok = '$stok',penerbit = '$penerbit',isbn = '$isbn',tahun_terbit='$tahun_terbit',status='$status',
sinopsis='$sinopsis',gambar='$still_profile1' where id_buku='$id'")or die(mysql_error());
}
else{


    if($size > 10000000) //conditions for the file
    {
    die("Format is not allowed or file size is too big!");
    }
    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);
    $profile=$_FILES["image"]["name"];
    
    //echo $_FILES["image"]["tmp_name"];
    //return false;

    mysql_query("update tblbuku set judul_buku='$judul_buku',id_kategori='$id_kategori',penulis='$penulis'
    ,stok = '$stok',penerbit = '$penerbit',isbn = '$isbn',tahun_terbit='$tahun_terbit',status='$status',
    sinopsis='$sinopsis',gambar='$profile' where id_buku='$id'")or die(mysql_error());

}
 header('location:buku.php');
}
?>
