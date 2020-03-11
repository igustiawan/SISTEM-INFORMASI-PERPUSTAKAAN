<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('menu.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><i class="icon-user icon-large"></i>&nbsp;Laporan Peminjaman</strong>
                </div>
                <div class="span12">
                    <form method="post" action="pdf_lap_peminjaman.php" target="_blank">
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Tgl Awal Peminjaman</label>
                                <div class="controls">
                                <input type="text"  class="w8em format-d-m-y " name="tgl_awal_pinjam" id="tgl_awal_pinjam" maxlength="10" style="border: 3px double #CCCCCC;" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Tgl Akhir Peminjaman</label>
                                <div class="controls">
                                <input type="text"  class="w8em format-d-m-y " name="tgl_akhir_pinjam" id="tgl_akhir_pinjam" maxlength="10" style="border: 3px double #CCCCCC;" required/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                <button name="download" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Download</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 

   
<?php include('footer.php') ?>
