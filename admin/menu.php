<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($currect_page == $url){
      echo 'active'; //class name in css
  }
}
?>

      <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
                        <!-- .nav, .navbar-search, .navbar-form, etc -->
					<ul class="nav">
                        <!--<li class="<?php //active('beranda.php');?>"><a href="beranda.php"><i class="icon-home icon-large"></i>&nbsp;Beranda</a></li>-->
                    <li class="<?php active('buku.php');?>"><a href="buku.php"><i class="icon-book icon-large"></i>&nbsp;Buku</a></li>
                    <li class="<?php active('anggota.php');?>"><a href="anggota.php"><i class="icon-book icon-large"></i>&nbsp;Anggota</a></li>   
                    <li>
                    <a href=""  data-toggle="dropdown" ><i class="icon-file icon-large"></i> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="admin_transaksi.php"><i class="icon-reorder icon-large"></i>&nbsp;BOOKING</a></li>
                            <li><a href="peminjaman.php"><i class="icon-user icon-large"></i>&nbsp;Peminjaman</a></li>
                            <li><a href="pengembalian.php"><i class="icon-book icon-large"></i>&nbsp;Pengembalian</a></li>
                        </ul>
                    </li>
                    <li>
                    <a href=""  data-toggle="dropdown" ><i class="icon-file icon-large"></i> Laporan</a>
                        <ul class="dropdown-menu">
                            <li><a href="lap_peminjaman.php"><i class="icon-reorder icon-large"></i>&nbsp;Lap Peminjaman</a></li>
                            <li><a href="lap_pengembalian.php"><i class="icon-user icon-large"></i>&nbsp;Lap Pengembalian</a></li>
                            <li><a href="lap_anggota.php" target="_blank"><i class="icon-book icon-large"></i>&nbsp;Lap Anggota</a></li>
                        </ul>
                    </li>

					<li><a href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Keluar</a></li>
					</ul>
					 <div class="pull-right">
                     </div>
                    </div>
                </div>
            </div>
        </div>

<?php //include('pencarian.php'); ?>
