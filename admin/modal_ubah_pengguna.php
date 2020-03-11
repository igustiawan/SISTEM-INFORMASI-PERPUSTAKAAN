	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit User</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['user_id']; ?>" required>
				<input readonly type="text" id="inputEmail" name="username" value="<?php echo $row['username']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				<input type="password" name="password" id="inputPassword" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Nama Depan</label>
				<div class="controls">

				<input type="text" id="inputEmail" name="nama_depan" value="<?php echo $row['nama_depan']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Nama Belakang</label>
				<div class="controls">

				<input type="text" id="inputEmail" name="nama_belakang" value="<?php echo $row['nama_belakang']; ?>" required>
				</div>
			</div>

			<div class="control-group">
			<label class="control-label" for="inputEmail">Status</label>
			<div class="controls">
			<select name="status" class="select2_single form-control" tabindex="-1" >
					<option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
					<option value="Aktif">Aktif</option>
					<option value="Tidak Aktif">Tidak Aktif</option>
			</select>
		</div>

		</div>



			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Perbaharui</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
		</div>
    </div>

	<?php
	if (isset($_POST['edit'])){

	$user_id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$nama_depan=$_POST['nama_depan'];
	$nama_belakang=$_POST['nama_belakang'];
	$status=$_POST['status'];

	mysql_query("update tblpengguna set password='$password' , nama_depan = '$nama_depan' , nama_belakang = '$nama_belakang',status='$status'  where user_id='$user_id'")or die(mysql_error()); ?>
	<script>
	window.location="pengguna.php";
	</script>
	<?php
	}
	?>
