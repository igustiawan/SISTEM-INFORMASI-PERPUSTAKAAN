<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rumah Belajar - Pertamina</title>
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

	
	<!--<style>
	.dataTables_wrapper { font-size: 13px }
	
	</style>-->
	<style>
	div.dataTables_wrapper {
        width: 1000px;
        margin: 0 auto;
    },
	.table-responsive {
	overflow-x: inherit;
	}
	</style>
	
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Rumah Belajar Pertamina</a>
        <!--<a class="btn btn-primary" href="admin">Login</a>-->
      </div>
    </nav>

    
    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
						<form  method="post" action="index.php">
								<div class="form-row">
									<div class="col-12 col-md-3 mb-2 mb-md-0">
												<select name="status" class="form-control form-control-lg" >
												<option>--Semua--</option>
												<option>Judul Buku</option>
												<option>Penulis</option>
												<option>Kategori</option>
												<option>Penerbit</option>
										</select>
									</div>
									<div class="col-12 col-md-6 mb-2 mb-md-0">
										<input required name="keyword" id="keyword" class="form-control form-control-lg" placeholder="Pencarian Buku...">
									</div>
									<div class="col-12 col-md-3 mb-2 mb-md-0">
												<button type="submit" name="search" id="search" class="btn btn-block btn-lg btn-primary">Cari</button>
									</div>
									<!--<div class="col-12 col-md-2 mb-2 mb-md-0">
												<button type="button" onclick="location.href='index.php'" class="btn btn-block btn-lg btn-primary">Refresh</button>
									</div>-->
								</div>
							</form>
						</div>
					</div>
      </div>
    </section>

    <!-- Footer -->
 
      <div class="container">
        <div class="row">
		 			<div class="table-responsive">
							<table  id="example" class="table table-bordered table-hover" >
							<thead>
							<tr>			
									<th style="width:100px;">Gambar</th>	
									<th>Judul Buku</th>
									<th>Kategori</th>
									<th>Penulis</th>
									<th>Penerbit</th>
									<th>ISBN</th>
									<th>Tahun Terbit</th>
									<th></th>
							</tr>
							</tr>
							</thead>

							<?php	
										//ini_set('display_errors', 1);
										include("db_connection.php");

										if(isset($_POST['search'])){
												$keyword = $_POST['keyword']; 	
												$status = $_POST['status'];

												if ($status == '--Semua--') {
													$query = "select * from tblbuku a inner join tblkategori b on a.id_kategori = b.id_kategori
													where status != 'Arsip' and judul_buku like '%$keyword%' or penulis like '%$keyword%' or penerbit like '%$keyword%' or nm_kategori like '%$keyword%'";
												}elseif ($status == 'Judul Buku') {
													$query = "select * from tblbuku a inner join tblkategori b on a.id_kategori = b.id_kategori
													where status != 'Arsip' and  judul_buku like '%$keyword%'";
												}elseif ($status == 'Penulis') {
													$query = "select * from tblbuku a inner join tblkategori b on a.id_kategori = b.id_kategori
													where status != 'Arsip' and  penulis like '%$keyword%'";
												}elseif ($status == 'Kategori') {
													$query = "select * from tblbuku a inner join tblkategori b on a.id_kategori = b.id_kategori
													where status != 'Arsip' and  nm_kategori like '%$keyword%'";
												}elseif ($status == 'Penerbit') {
													$query = "select * from tblbuku a inner join tblkategori b on a.id_kategori = b.id_kategori
													where status != 'Arsip' and  Penerbit like '%$keyword%'";
												}

												//echo $query;
												//return false;
												
												$hasil = mysql_query($query);
												if(mysql_num_rows($hasil) == 0){
													?>
													<script>
													alert("Data tidak ditemukan");
													</script>
												<?php
												}
												
												while ($row = mysql_fetch_array ($hasil)){

												?>   
												<tr>
													<td>
														<?php if($row['gambar'] != ""): ?>
														<img src="upload/<?php echo $row['gambar']; ?>" class="img-thumbnail" width="75px" height="50px">
														<?php else: ?>
														<img src="img/book_image.jpg" class="img-thumbnail" width="75px" height="50px">
														<?php endif; ?>
													</td> 
													<td><?php echo $row['judul_buku']; ?></td>
													<td><?php echo $row ['nm_kategori']; ?> </td>
													<td><?php echo $row['penulis']; ?> </td>
													<td><?php echo $row['penerbit']; ?></td>
													<td><?php echo $row['isbn']; ?></td>
													<td><?php echo $row['tahun_terbit']; ?></td>
													<?php echo "<td><a href='#myModal' class='btn btn-primary'
													id='id_buku' data-toggle='modal' 
													data-id=".$row['id_buku']."> <i class='fa fa-search'></i></a>"; ?>
													<a class="btn btn-warning" href="detail_pemesanan.php<?php echo '?id='.$row['id_buku']; ?>">
													<i class="fa fa-shopping-basket"></i>
													</a>
													</td>
										</tr> 				
							<?php
										}
							}
							?>	
							</table>
		 			</div>		
        </div>
      </div>

			<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    <h4 class="modal-title">Detail Buku</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript">
		$(document).ready(function(){
		$('#myModal').on('show.bs.modal', function (e) {
		var rowid = $(e.relatedTarget).data('id');
		//menggunakan fungsi ajax untuk pengambilan data
		$.ajax({
		type : 'post',
		url : 'detail.php',
		data :  'rowid='+ rowid,
		success : function(data){
		$('.fetched-data').html(data);//menampilkan data ke dalam modal
		}
		});
		});
		});
	</script>

		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>
			$('#example').dataTable( {
			"searching": false,
			"lengthChange": false
			} );
		</script>

  </body>

</html>
