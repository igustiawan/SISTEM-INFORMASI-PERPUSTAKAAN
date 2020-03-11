<?php
    include('dbcon.php');
    $id=$_GET['id'];

    $query = "SELECT * FROM tbltransaksi where id_transaksi='$id' " ;
    $hasil = mysql_query($query);
    $data = mysql_fetch_array($hasil);
    $qty = $data['qty'];
    $id_buku = $data['id_buku'];

    $booking    =new DateTime($data['tgl_transaksi']);
    $today        =new DateTime();
    $diff = $today->diff($booking);

    $buku = mysql_query("select stok,book from tblbuku where id_buku = '$id_buku'")or die(mysql_error());
    $row_buku = mysql_fetch_array($buku);
    $stok_buku = $row_buku ['stok']; 
    $book = $row_buku ['book']; 

 //3 adalah batas expired transaksi 3 hari
if($diff->d >= 3){
    echo"<script type='text/javascript'>
    alert('Transaksi Expired');
    window.location.href = 'admin_transaksi.php';
    </script>";

}else{

    if ($book-$stok_buku < 0){
            echo '<script language="javascript">';
            echo 'alert("Data tidak dapat diproses, stok tidak mencukupi")';
            echo '</script>';
            echo "<script>window.location='admin_transaksi.php'</script>";
    }
    

    mysql_query("update tblbuku set book=book-$qty,stok=stok-$qty where id_buku='$id_buku'")or die(mysql_error());

    mysql_query("update tbltransaksi set status = '1' where id_transaksi='$id'")or die(mysql_error());
    echo"<script type='text/javascript'>
    alert('Transaksi berhasil disimpan');
    window.location.href = 'admin_transaksi.php';
    </script>"; 
}
?>