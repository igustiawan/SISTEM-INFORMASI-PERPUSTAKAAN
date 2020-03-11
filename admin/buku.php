<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Tabel Buku</strong>
                                </div>
						<!--  -->

						<!--  -->
						<center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
						
								<p><a href="tambah_buku.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Tambah</a></p>

                                <thead>
                                    <tr>
									    <th>No.</th>
                                        <th>Judul Buku</th>
                                        <th>Kategori</th>
										<th>Penulis</th>
										<th class="action">Stok</th>
										<th>Penerbit</th>
										<th>ISBN</th>
										<th>Tahun Terbit</th>
										<th>Tgl Input</th>
										<th>Status</th>
										<th class="action">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php





								  $user_query=mysql_query("select * from tblbuku a inner join tblkategori b on a.id_kategori = b.id_kategori where status != 'Arsip'")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['id_buku'];
									$cat_id=$row['nm_kategori'];
									$stok = $row['stok'];

									//$borrow_details = mysql_query("select * from borrowdetails where book_id = '$id' and borrow_status = 'pending'");
									//$row11 = mysql_fetch_array($borrow_details);
									//$count = mysql_num_rows($borrow_details);

									//$total =  $book_copies  -  $count;

									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['id_buku']; ?></td>
                                    <td><?php echo $row['judul_buku']; ?></td>
									<td><?php echo $row ['nm_kategori']; ?> </td>
                                    <td><?php echo $row['penulis']; ?> </td>
                                    <td class="action"><?php echo $row['stok']-$row['book']; ?></td>

									 <td><?php echo $row['penerbit']; ?></td>
									 <td><?php echo $row['isbn']; ?></td>
									 <td><?php echo $row['tahun_terbit']; ?></td>
									 <td><?php echo $row['tgl_input']; ?></td>
									 <td><?php echo $row['status']; ?></td>
									<?php include('toolttip_edit_delete.php'); ?>
                                    <td class="action">
										
										<a  rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="ubah_buku.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
										<a rel="tooltip"  title="Hapus" id="<?php echo $id; ?>" href="#hapus_buku<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('hapus_buku_modal.php'); ?>
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
