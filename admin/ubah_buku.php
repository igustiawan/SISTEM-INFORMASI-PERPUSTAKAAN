<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">
		<?php
		$query=mysql_query("select * from tblbuku LEFT JOIN tblkategori on tblkategori.id_kategori  = tblbuku.id_kategori where id_buku='$get_id'")or die(mysql_error());
		$row=mysql_fetch_array($query);
		$category_id = $row['id_kategori'];
		?>
		<div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Ubah Buku</div>
		<p><a class="btn btn-info" href="buku.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Kembali</a></p>
		<div class="addstudent">
		<div class="details">Silahkan isi data dibawah ini..</div>
		
		<form class="form-horizontal" method="POST" action="perbaharui_buku.php" enctype="multipart/form-data">

		<div class="control-group">
			<label class="control-label" for="inputEmail">Judul Buku:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="judul_buku" value="<?php echo $row['judul_buku']; ?>" placeholder="Judul Buku" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="Judul Buku" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputEmail">Sinopsis:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="sinopsis" value="<?php echo $row['sinopsis']; ?>" placeholder="Sinopsis" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="Sinopsis" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Kategori:</label>
			<div class="controls">
			<select name="id_kategori">
				<option value="<?php echo $category_id; ?>"><?php echo $row['nm_kategori']; ?></option>
				<?php $query1 = mysql_query("select * from tblkategori where id_kategori != '$category_id'")or die(mysql_error());
				while($row1 = mysql_fetch_array($query1)){
				?>
				<option value="<?php echo $row1['id_kategori']; ?>"><?php echo $row1['nm_kategori']; ?></option>
				<?php } ?>
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Penulis:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputPassword" name="penulis" value="<?php echo $row['penulis']; ?>" placeholder="Penulis" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Stok:</label>
			<div class="controls">
			<input class="span1" type="text" id="inputPassword" name="stok" value="<?php echo $row['stok']-$row['book']; ?>" placeholder="Stok" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Penerbit:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputPassword" name="penerbit" value="<?php echo $row['penerbit']; ?>" placeholder="Penerbit" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Isbn:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputPassword" name="isbn" value="<?php echo $row['isbn']; ?>" placeholder="isbn" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Tahun Terbit:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" placeholder="Tahun Terbit" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Status:</label>
			<div class="controls">
			<select name="status">
			<option><?php echo $row['status']; ?></option>
			<option>Baru</option>
			<option>Lama</option>
			<option>Hilang</option>
			<option>Rusak</option>
			<option>Penggantian</option>
			</select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="last-name">Gambar
			</label>
			<div class="controls">
			<a href=""><?php if($row['gambar'] != ""): ?>
			<img src="upload/<?php echo $row['Gambar']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
			<?php else: ?>
			<img src="../img/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
			<?php endif; ?>
			</a>
			</div>
			<div class="controls">
			<input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control" />
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Perbaharui</button>
			</div>
		</div>
    </form>
			</div>
			</div>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
