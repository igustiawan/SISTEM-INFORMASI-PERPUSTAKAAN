<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">
		<?php
		$query=mysql_query("select * from tblanggota where id_anggota='$get_id'")or die(mysql_error());
		$row=mysql_fetch_array($query);

		?>
             <div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Ubah Anggota</div>
			<p><a class="btn btn-info" href="anggota.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Kembali</a></p>
	<div class="addstudent">
	<div class="details">Silahkan isi data dibawah ini..</div>
	<form class="form-horizontal" method="POST" action="perbaharui_anggota.php" enctype="multipart/form-data">

		<div class="control-group">
			<label class="control-label" for="inputEmail">Nama Depan:</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="nama_depan" value="<?php echo $row['nama_depan']; ?>" placeholder="Nama Depan" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="Firstname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Nama Belakang:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="nama_belakang" value="<?php echo $row['nama_belakang']; ?>" placeholder="Nama Belakang" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Jenis Kelamin:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" placeholder="Jenis Kelamin" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Alamat:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="alamat" value="<?php echo $row['alamat']; ?>" placeholder="Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Handphone:</label>
			<div class="controls">
			<input type='tel' pattern="[0-9]{11,11}" class="search" name="no_hp"  placeholder="Phone Number"  autocomplete="off"  maxlength="11" >
			</div>
		</div>


				<div class="control-group">
			<label class="control-label" for="inputPassword">Status:</label>
			<div class="controls">
				<select name="status" required>
									<option><?php  echo $row['status']; ?></option>
									<option>Aktif</option>
									<option>Tidak Aktif</option>
				</select>
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
