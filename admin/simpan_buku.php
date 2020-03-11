<?php
include('dbcon.php');
if (isset($_POST['submit'])){
    if (!isset($_FILES['image']['tmp_name'])) {
        echo "";
        }else{
        $file=$_FILES['image']['tmp_name'];
        $image = $_FILES["image"] ["name"];
        $image_name= addslashes($_FILES['image']['name']);
        $size = $_FILES["image"] ["size"];
        $error = $_FILES["image"] ["error"];
        {
                    if($size > 10000000) //conditions for the file
                    {
                    die("Format is not allowed or file size is too big!");
                    }

                else
                    {
                        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);
  					    $gambar=$_FILES["image"]["name"];
                        $judul_buku=$_POST['judul_buku'];
                        $id_kategori=$_POST['id_kategori'];
                        $penulis=$_POST['penulis'];
                        $stok=$_POST['stok'];
                        $penerbit=$_POST['penerbit'];
                        $isbn=$_POST['isbn'];
                        $tahun_terbit=$_POST['tahun_terbit'];
                        $status=$_POST['status'];
                        $sinopsis=$_POST['sinopsis'];

                        mysql_query("insert into tblbuku (judul_buku,id_kategori,penulis,stok,penerbit,isbn,tahun_terbit,tgl_input,status,gambar,sinopsis)
                        values('$judul_buku','$id_kategori','$penulis','$stok','$penerbit','$isbn','$tahun_terbit',NOW(),'$status','$gambar','$sinopsis')")or die(mysql_error());

            }
            }

            header('location:buku.php');
}
}
?>