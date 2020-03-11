<?php  
session_start();
?>
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
        <a class="navbar-brand" href="index.php">Rumah Belajar Pertamina</a>
        <!--<a class="btn btn-primary" href="admin">Login</a>-->
      </div>
    </nav>

   <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
						
						</div>
					</div>
      </div>
    </section>
    </br>
   
		<div class="container">
			<div class="row">
				
            <div class="col-12 col-md-6 mb-2 mb-md-0">
             

					<h3>Data Pemesan Buku..</h3>
                    <form method="post">
                        <?php
                        //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                        include("db_connection.php");
                        //$id_buku=$_GET['id'];

                        $sql = "select id_buku,judul_buku,sinopsis,stok-book as stok,book from tblbuku WHERE id_buku = '".$_GET['id']."'";
                        $result = mysql_query($sql);
                        while($baris = mysql_fetch_array ($result)){

                        ?>  
                        <div class="row form-group">
							<div class="col-md-6">
								<label for="fname">Nama</label>
								<input required type="text" id="nama" name="nama" class="form-control" placeholder="Isikan nama anda">
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input required type="text" id="email" name="email" class="form-control" placeholder="isikan alamat email anda">
							</div>
                        </div>
                        <div class="row form-group">
							<div class="col-md-12">
								 <label for="email">Judul Buku</label>
								<input readonly type="text" value="<?php echo $baris['judul_buku'];?>" id="judul_buku" class="form-control" >
							</div>
                        </div>
                        <div class="row form-group">
							<div class="col-md-12">
								 <label for="email">Stok</label>
                                <input readonly type="text" value="<?php echo $baris['stok'];?>" name="stok" id="stok" class="form-control" >
                                <input type="hidden" id="inputEmail" name="book" id="book" value="<?php echo $baris['book'];?>" placeholder="Judul Buku">
                            </div>
						</div>
                        <div class="row form-group">
							<div class="col-md-12">
								 <label for="email">Jumlah Book</label>
								<input required type="text" name="jumlahbook" id="jumlahbook" value=1 class="form-control" >
							</div>
						</div>

						<div class="form-group">
                            <input type="submit" name="submit" value="Book Now" class="btn btn-primary">
                            <button onclick="location.href='index.php'"class="btn btn-primary">Batal</button>
						</div>
                        <?php
										}
                                        ?>
                    </form>		
                  
				</div>
			</div>
			
		</div>

	

  </body>
                         <?php
                            if(isset($_POST['submit'])){
                                $id = $_GET['id'];
                                $stok = $_POST['stok'];
                                $jumlahbook = $_POST['jumlahbook'];
                                $book = $_POST['book'];
                                $nama = $_POST['nama'];
                                $email = $_POST['email'];
                                
                                


                                    if ($stok==0)
                                    {
                                        echo "<script>alert('Stok tidak Mencukupi')</script>";
                                    }elseif($jumlahbook>$stok){
                                        echo "<script>alert('Jumlah book melebihi stok..!')</script>";
                                    }else{
                                
                                        mysql_query("update tblbuku set book=$book+$jumlahbook where id_buku='$id'")or die(mysql_error());
                                
                                        $query = "SELECT max(id_transaksi) as maxKode FROM tbltransaksi";
                                        $hasil = mysql_query($query);
                                        $data = mysql_fetch_array($hasil);
                                        $idtransaksi = $data['maxKode'];

                                        //mengambil angka atau bilangan dalam kode anggota terbesar,
                                        // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
                                        // misal 'BRG001', akan diambil '001'
                                        // setelah substring bilangan diambil lantas dicasting menjadi integer
                                        $noUrut = (int) substr($idtransaksi, 6, 5);
                                    
                                        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                        $noUrut++;
                                        
                                        // membentuk kode transaksi baru
                                        // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
                                        // misal sprintf("%03s", 12); maka akan dihasilkan '012'
                                        // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                                        $char = date('Y') . date('m');
                                        //$char = "TRN";
                                        $idtransaksi = $char . sprintf("%05s", $noUrut);
                                        //echo $idtransaksi;
                                        //echo "insert into tbltransaksi values ('$idtransaksi','$id','$jumlahbook',CURDATE())";
                                        mysql_query("insert into tbltransaksi values ('$idtransaksi','$id','$jumlahbook',CURDATE(),'$nama','$email',0)")or die(mysql_error());
                                        $_SESSION['idtransaksi'] = $idtransaksi;
                                        //header("location:index.php");
                                        echo "<script> document.location.href='transaksi.php'; </script>";
                                    }
                                    
                            }
                            ?>
</html>
