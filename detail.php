<?php
    include("db_connection.php");

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "select id_buku,judul_buku,sinopsis,stok-book as stok,book from tblbuku WHERE id_buku = $id";
        $result = mysql_query($sql);
        while ($baris = mysql_fetch_array ($result)){ ?>


        <form action="#" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $baris['id_buku']; ?>">
            <div class="form-group">
                <label>Judul Buku</label>
                <input readonly type="text" class="form-control" name="judul_buku" value="<?php echo $baris['judul_buku']; ?>">
            </div>
            <div class="form-group">
                <label>Stok Buku</label>
                <input readonly type="text" class="form-control" name="stok" value="<?php echo $baris['stok']; ?>">
                <input type="hidden" id="inputEmail" name="book" id="book" value="<?php echo $baris['book'];?>" placeholder="Judul Buku">
            </div>
            
            <div class="form-group">
                <label>Sinopsis</label>
                <textarea readonly class="form-control" rows="5" name="sinopsis" ><?php echo $baris['sinopsis']; ?></textarea>
            </div>

            <!--<div class="form-group">
                <label>Book</label>
                <input type="text" class="form-control" id="jumlahbook" name="jumlahbook" value="1">
            </div>
              <button class="btn btn-primary" name="submit" id="submit" type="submit">Book Now</button>-->
        </form>
        
        <?php } }
   
?>