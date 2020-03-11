<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
								<div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Tabel Peminjaman</strong>
                                </div>

		<div class="span12">

		<form method="post" action="simpan_peminjaman.php">
<div class="span3">

											<div class="control-group">Nama Peminjam</label>
				<div class="controls">
				<select name="id_anggota" class="chzn-select"required/>
				<option></option>
				<?php $result =  mysql_query("select * from tblanggota")or die(mysql_error());
				while ($row=mysql_fetch_array($result)){ ?>
				<option value="<?php echo $row['id_anggota']; ?>"><?php echo $row['nama_depan']." ".$row['nama_belakang']; ?></option>
				<?php } ?>
				</select>
				</div>
			</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Tgl Batas Peminjaman</label>
					<div class="controls">
					<input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="tgl_akhir_pinjam" id="tgl_akhir_pinjam" maxlength="10" style="border: 3px double #CCCCCC;" required/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">

								<button name="delete_student" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Pinjam</button>
					</div>
				</div>
				</div>
				<div class="span8">
						<div class="alert alert-success"><strong>Pilih Buku</strong></div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
										<th>Penulis</th>
										<th>Penerbit</th>
										<th>Stok</th>
										<th>Jml Pinjam</th>
										<th>Tambah</th>

                                    </tr>
                                </thead>
                                <tbody>

								  <?php  $user_query=mysql_query("select judul_buku,penulis,penerbit,id_buku,stok-book as stok,id_kategori 
								  								from tblbuku where stok > 0 ")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
									$id=$row['id_buku'];
									$cat_id=$row['id_kategori'];
									$stok=$row['stok'];

											$cat_query = mysql_query("select * from tblkategori where id_kategori = '$cat_id'")or die(mysql_error());
											$cat_row = mysql_fetch_array($cat_query);
									?>
									<tr class="del<?php echo $id ?>">
										<td width="30%"><?php echo $row['judul_buku']; ?></td>
										<td width="30%"><?php echo $cat_row ['nm_kategori']; ?> </td>
										<td width="10%"><?php echo $row['penulis']; ?> </td>
										<td width="10%"><?php echo $row['penerbit']; ?></td>
										<td width="10%">
											<input id="" class="uniform_on" name="stok[<?php echo $id; ?>]" type="number" readonly value=<?php echo $stok; ?> >
											
										</td>
										<td width="5%">
										<input name="qty[<?php echo $id; ?>]" type="number" onkeypress="return isNumberKey(event)" value=1 />
										</td>
										<td width="10%">
											<input id="" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>" >
										</td>
                                    </tr>
									<?php  }  ?>
                                </tbody>
                            </table>

			    </form>
			</div>
			</div>


<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

// $(".uniform_on").change(function(){
//     var max= 3;
//     if( $(".uniform_on:checked").length == max ){

//         $(".uniform_on").attr('disabled', 'disabled');
// 		         alert('3 Books are allowed per borrow');
//         $(".uniform_on:checked").removeAttr('disabled');

//     }else{

//          $(".uniform_on").removeAttr('disabled');
//     }
// })
</script>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
