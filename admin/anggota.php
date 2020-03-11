<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Tabel Anggota</strong>
                                </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

								<p><a href="tambah_anggota.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Tambah</a></p>

                                <thead>
                                    <tr>

                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>No Hp</th>
										<th>Status</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php  $user_query=mysql_query("select * from tblanggota")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['id_anggota'];  ?>
									<tr class="del<?php echo $id ?>">


                                    <td><?php echo $row['nama_depan']." ".$row['nama_belakang']; ?></td>
                                    <td><?php echo $row['jenis_kelamin']; ?> </td>
                                    <td><?php echo $row['alamat']; ?> </td>
                                    <td><?php echo $row['no_hp']; ?></td>
									<td><?php echo $row['status']; ?></td>
									<?php include('toolttip_edit_delete.php'); ?>
                                    <td width="100">

										<a  rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="ubah_anggota.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>

                                    </td>

                                    </tr>
									<?php  }  ?>

                                </tbody>
                            </table>


			</div>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
