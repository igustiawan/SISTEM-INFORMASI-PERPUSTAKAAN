<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">

		<div class="alert alert-info">Tambah Buku</div>
		<p><a href="buku.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Kembali</a></p>
		<div class="addstudent">
		<div class="details">Silahkan isi data dibawah ini..</div>
		<form class="form-horizontal" method="POST" action="simpan_buku.php" enctype="multipart/form-data">

		<div class="control-group">
			<label class="control-label" for="inputEmail">Judul Buku:</label>
			<div class="controls">
			<input type="text" class="span4" id="inputEmail" name="judul_buku"  placeholder="Judul Buku" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputEmail">Sinopsis:</label>
			<div class="controls">
			<textarea class="span4" id="inputEmail" name="sinopsis"  placeholder="Sinopsis" required></textarea>
			</div>
		</div>

		<div class="control-group">
		<label class="control-label" for="inputPassword">Kategori</label>
			<div class="controls">
			<select name="id_kategori">
			<option></option>
			<?php
			$cat_query = mysql_query("select * from tblkategori");
			while($cat_row = mysql_fetch_array($cat_query)){
			?>
			<option value="<?php echo $cat_row['id_kategori']; ?>"><?php echo $cat_row['nm_kategori']; ?></option>
			<?php  } ?>
			</select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputEmail">Penulis:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPassword" name="penulis"  placeholder="Penulis" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="iionputPassword">Stok:</label>
			<div class="controls">
			<input type="text" class="span1" id="inputPassword" name="stok"  placeholder="" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Peenerbit:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPassword" name="penerbit"  placeholder="Penerbit" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Isbn:</label>
			<div class="controls">
			<input type="text"  class="span4" id="inputPassword" name="isbn"  placeholder="ISBN" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Tahun Terbit</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="tahun_terbit"  placeholder="Tahun Terbit" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="last-name">Gambar
			</label>
			<div class="controls">
			<input type="file" name="image" id="last-name2">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Status:</label>
			<div class="controls">
			<select name="status" required>
				<option></option>
				<option>Baru</option>
				<option>Lama</option>
				<option>Hilang</option>
				<option>Rusak</option>
				<option>Penggantian</option>
			</select>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Simpan</button>
			</div>
		</div>
    </form>
			</div>
			</div>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
