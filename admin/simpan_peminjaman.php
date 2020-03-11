	<?php
 	include('dbcon.php');


	if(isset($_POST['selector'])){
		$id = $_POST['selector'];
	}else{
		$id = "";#default value
	}

	$id_anggota  = $_POST['id_anggota'];
	//$tgl_akhir_pinjam = $_POST['tgl_akhir_pinjam'];
	$tgl_akhir_pinjam = date("Y-m-d", strtotime($_POST['tgl_akhir_pinjam']));

	if ($id == '' ){
	  echo '<script language="javascript">';
	  echo 'alert("Buku belum ada yang dipilih..!")';
	  echo '</script>';
	  echo "<script>window.location='peminjaman.php'</script>";
	  //exit;
	?>

	<?php }elseif ($id_anggota == '' ){
	  echo '<script language="javascript">';
	  echo 'alert("anggota belum dipilih..!")';
	  echo '</script>';
	  echo "<script>window.location='peminjaman.php'</script>";
	}


	else{


		foreach ($_POST['selector'] as $selected) {
			$qty = $_POST['qty'][$selected];
			$stok = $_POST['stok'][$selected];

				if ($qty > $stok){
					echo '<script language="javascript">';
					echo 'alert("qty pinjam melebihi stok")';
					echo '</script>';
					echo "<script>window.location='peminjaman.php'</script>";
				}else{
					mysql_query("insert into tblpeminjaman (id_anggota,id_buku,tgl_awal_peminjaman,tgl_akhir_peminjaman,status,jml_pinjam)
					values('$id_anggota','$selected',NOW(),'$tgl_akhir_pinjam','dipinjam',$qty)")or die(mysql_error());

					mysql_query("update tblbuku set stok=$stok-$qty where id_buku='$selected'")or die(mysql_error());

					echo '<script language="javascript">';
					echo 'alert("Berhasil simpan")';
					echo '</script>';
					echo "<script>window.location='peminjaman.php'</script>";


				}
			//echo $stok . '<br />';
	}


	//$N = count($id);
	
	
	//for($i=0; $i < $N; $i++)
	//{
	
		// if ($qty[$i] > $stok[$i]){
		// 	echo '<script language="javascript">';
		// 	echo 'alert("qty pinjam melebihi stok")';
		// 	echo '</script>';
		// 	echo "<script>window.location='peminjaman.php'</script>";
		//}else{

			//echo $qty[$i];
			//echo "<br>";
			// mysql_query("insert into tblpeminjaman (id_anggota,id_buku,tgl_awal_peminjaman,tgl_akhir_peminjaman,status,jml_pinjam)
			// values('$id_anggota','$id[$i]',NOW(),'$tgl_akhir_pinjam','dipinjam',$qty[$i])")or die(mysql_error());
			
			// mysql_query("update tblbuku set stok=$stok[$i]-$qty[$i] where id_buku='$id[$i]'")or die(mysql_error());

			// echo '<script language="javascript">';
			// echo 'alert("Berhasil simpan")';
			// echo '</script>';
			// echo "<script>window.location='peminjaman.php'</script>";
	//	}

	

	//}
	//echo 'alert("Transaksi berhasil..")';
	//header("location: peminjaman.php");
	}
	?>
