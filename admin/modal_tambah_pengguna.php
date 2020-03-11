	<div id="add_user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Tambah Pengguna</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				<input type="password" name="password" id="inputPassword" placeholder="Password" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Nama Depan</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="nama_depan" placeholder="Nama Depan" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Nama Belakang</label>
				<div class="controls">
				<input type="text" id="inputEmail" name="nama_belakang" placeholder="Nama Belakang" required>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Simpan</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
		</div>
    </div>

	<?php
	if (isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$nama_depan=$_POST['nama_depan'];
	$nama_belakang=$_POST['nama_belakang'];

	mysql_query("insert into tblpengguna (username,password,nama_depan,nama_belakang) values('$username','$password','$nama_depan','$nama_belakang')")or die(mysql_error());
	}
	?>
