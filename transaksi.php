<?php  session_start(); ?>
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
   
		<div class="container">
			<div class="row">
                    <div style="width:900px; margin-left:auto; margin-right:auto; text-align:center; margin-top:50px;">
                    <div style="font-size:14px;">Data Telah di Simpan.</div>
                    <div style="font-size:26px;">NOMOR TRANSAKSI</div>
                    <div style="font-size:74px;"><?php echo $_SESSION['idtransaksi']?></div>
                    <input type="button" class="btn btn-primary" name="back" onclick="javascript:window.location='index.php'" value="OK" />
                    </div>
            
			</div>
			
		</div>

	

  </body>
                        
</html>
