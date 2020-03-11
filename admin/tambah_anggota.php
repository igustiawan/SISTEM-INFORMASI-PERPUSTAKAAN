<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">

             <div class="alert alert-info">Tambah Anggota</div>
			<p><a href="anggota.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Kembali</a></p>
	<div class="addstudent">
	<div class="details">Silahkan isi data dibawah ini..</div>
	<form class="form-horizontal" method="POST" action="simpan_anggota.php" enctype="multipart/form-data">

		<div class="control-group">
			<label class="control-label" for="inputEmail">Nama Depan:</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="nama_depan"  placeholder="Nama Depan" required>

			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Nama Belakang:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="nama_belakang"  placeholder="Nama Belakang" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Jenis Kelamin:</label>
			<div class="controls">
			<select name="jenis_kelamin" required>
				<option></option>
				<option>Pria</option>
				<option>Wanita</option>
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Alamat:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="alamat"  placeholder="Alamat" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Handphone</label>
			<div class="controls">
			<input type='tel' pattern="[0-9]{11,11}" class="search" name="no_hp"  placeholder="Handphone"  autocomplete="off"  maxlength="11" >
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
