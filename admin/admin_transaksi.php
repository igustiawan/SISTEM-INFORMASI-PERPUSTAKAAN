<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<div class="span12">
			   <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Tabel Transaksi</strong>
                                </div>
						<!--  -->

						<!--  -->
						<center class="title">
						<h1>List Transaksi</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                                <thead>
                                    <tr>
									    <th>No. Transaksi</th>
                                        <th>Tgl. Transaksi</th>
                                        <th>Judul Buku</th>
										<th>Nama</th>
                                        <th>Email</th>
                                        <th>Status Transaksi</th>
										<th class="action">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php
								    $user_query=mysql_query("select id_transaksi,tgl_transaksi,judul_buku,nama,email,a.status from tbltransaksi a inner join tblbuku b on a.id_buku = b.id_buku")or die(mysql_error());
									while($row=mysql_fetch_array($user_query)){
                                    $id=$row['id_transaksi'];
                                    
                                    $booking    =new DateTime($row['tgl_transaksi']);
                                    $today        =new DateTime();
                                    $diff = $today->diff($booking);
                                    //$diff->d;
            
									?>
									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['id_transaksi']; ?></td>
                                    <td><?php echo date('d F Y', strtotime($row['tgl_transaksi'])); ?></td>
									<td><?php echo $row ['judul_buku']; ?> </td>
                                    <td><?php echo $row['nama']; ?> </td>
                                    <td><?php echo $row['email']; ?></td>
                                    <?php
                                    //3 adalah batas expired transaksi 3 hari
                                    if($diff->d >= 3){
                                     ?>
                                            <td>Transaksi Expired</td>
                                     <?php       
                                    }else{
                                        if($row['status']== 0){
                                            ?>
                                                <td>Menunggu Konfirmasi</td>
                                            <?php                
                                                }elseif($row['status']== 1){
                                             ?>  
                                                <td>Sudah diproses</td>
                                             <?php           
                                                }elseif($row['status']== 2){
                                            ?>
                                                 <td>Sudah proses pengembalian</td>
                                            <?php      
                                                }else{
                                                    ?>
                                                         <td></td>
                                                    <?php      
                                                        }
                                    }
                                       
                                    ?>
                        
									<?php include('toolttip_edit_delete.php'); ?>
                                    <?php
                                        if($row['status']== 0 && $diff->d < 3)
                                        {
                                            ?>
                                            <td class="action">
                                                <a rel="tooltip"  title="Proses" id="<?php echo $id; ?>" href="#proses_transaksi<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-repeat icon-large"></i>Proses Booking</a>
                                                <?php include('proses_transaksi_modal.php'); ?>
                                            </td>
                                            <?php
                                        }elseif($row['status']== 1){
                                            ?>
                                                 <td class="action">
                                                <a rel="tooltip"  title="Proses" id="<?php echo $id; ?>" href="#proses_transaksi_pengembalian<?php echo $id; ?>" data-toggle="modal"    class="btn btn-danger"><i class="icon-repeat icon-large"></i>Pengembalian</a>
                                                <?php include('proses_transaksi_pengembalian_modal.php'); ?>
                                                </td>
                                                <!--kondisi-->
                                                <?php
                                        }else
                                        {
                                           ?>

                                            <td></td>

                                        <?php 
                                        }
                                            ?>
                         
                                    </tr>
									<?php  }  ?>

                                </tbody>
                            </table>


			</div>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
