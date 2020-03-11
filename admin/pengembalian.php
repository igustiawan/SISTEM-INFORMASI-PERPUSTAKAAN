<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				<div class="span12">
						<div class="alert alert-info"><strong>Pengembalian Buku</strong></div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                              <thead>
                                <tr>
                                  <th>Judul</th>
                                  <th>Jml Pinjam</th>
                                  <th>Peminjam</th>
                                  <th>Tgl Awal Peminjaman</th>
                                  <th>Tgl Akhir Peminjaman</th>
                                  <th>Tgl Pengembalian</th>
                                  <th>Status</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              $result= mysql_query("SELECT a.id_buku,id_peminjaman,judul_buku,nama_depan,tgl_awal_peminjaman,tgl_akhir_peminjaman,tgl_pengembalian,a.status,a.jml_pinjam FROM db_rumahbelajar.tblpeminjaman a inner join tblbuku B
                                                on a.id_buku = b.id_buku inner join tblanggota c on a.id_anggota = c.id_anggota") or die (mysql_error());
                              while ($row= mysql_fetch_array ($result) ){
                              $id_peminjaman=$row['id_peminjaman'];
                              $id=$row['id_peminjaman'];
                              $id_buku=$row['id_buku'];
                              $jml_pinjam=$row['jml_pinjam'];
                              ?>
                              <tr>

                                <td><?php echo $row['judul_buku']; ?></td>
                                <td><?php echo $row['jml_pinjam']; ?></td>
                                <td><?php echo $row['nama_depan']; ?></td>
                                <td><?php echo $row['tgl_awal_peminjaman']; ?></td>
                                <td><?php echo $row['tgl_akhir_peminjaman']; ?></td>
                                <td><?php echo $row['tgl_pengembalian']; ?></td>
                                <td><?php echo $row['status']; ?></td>

                              <?php
                                  if($row['tgl_pengembalian']== NULL)
                                  {
                              ?>
                                  <td>
                                      <a rel="tooltip"  title="Kembali" id="<?php echo $id_peminjaman; ?>" href="#delete_book<?php echo $id_peminjaman; ?>" data-toggle="modal"    class="btn btn-success"><i class="icon-check icon-large"></i>Kembali</a>
                                  <?php include('modal_pengembalian.php'); ?>
                                  </td>
                              <?php
                            }else {

                              ?>
                                    <td></td>
                              <?php
                            }

                               ?>


                              </tr>
                              <?php } ?>
                              </tbody>
                            </table>


			</div>


			</div>
		</div>
    </div>
<?php include('footer.php') ?>
