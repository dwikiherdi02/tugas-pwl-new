<div class="col-lg-6">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title text-center">Backup Database</h3>
	  </div>
	  <div class="panel-body" style="background: #000; color: white">
	    <form action="core/proses_backup.php" method="post" name="postform" enctype="multipart/form-data" >
		 <div class="asd">
		 	<center>
			  <label for="backup">File Backup Database (*.sql)</label><br>
			  <button type="submit" name="backup" class="btn btn-success"><i class="glyphicon glyphicon-export"></i> Backup Database</button>
			  <p class="text-muted">Klik button ini untuk backup database</p>
			</center>
		 </div>
		</form>
	  </div>
	</div>
</div>

<div class="col-lg-6">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title text-center">Restore Database</h3>
	  </div>
	  <div class="panel-body" style="background: #000; color: white">
	    <form action="" method="post" name="postform" enctype="multipart/form-data" >
		 <div class="asd">
		 	<center>
			  <label for="backup">File Backup Database (*.sql)</label>
			  <input type="file" name="datafile" size="30" class="form-control" /><br>
			  <button type="submit" name="restore" class="btn btn-primary"><i class="fa fa-download"></i> Restore Database</button>
			 </center>
		 </div>
		</form>
		<?php include 'core/proses_restore.php';
		if(isset($_POST['restore'])){
		 restore($_FILES['datafile']);
		 }
		 else
		 {
		 unset($_POST['restore']);
		 }
		?>
	  </div>
	</div>
</div>