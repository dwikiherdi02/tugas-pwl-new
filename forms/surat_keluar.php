<div class="page-wrapper">
	<center><h2 class="page-header alert alert-default bg-success">Surat Keluar</h2><br>
	<form class="form-horizontal col-md-6 col-md-offset-3" method="POST" enctype="multipart/form-data" action="core/insert.php">
		
		<div class="form-group">
			<label>Tanggal Kirim</label>
			<input type="date" class="form-control" name="tgl_kirim" required value="<?php echo date('Y-m-d'); ?>">
		</div>

		<div class="form-group">
			<label>No Surat</label>
			<input type="text" class="form-control" name="no_surat" required placeholder="Nomor Surat">
		</div>

		<div class="form-group">
			<label>Jenis Surat</label>
			<select class="form-control" name="id_jenis" required>
				<option disabled="" selected="">Jenis Surat</option>
				<?php $sql=$conn->query("SELECT * FROM jenis_surat");
				while ($r=$sql->fetch_assoc()) { ?>
				<option value="<?php echo $r['id_jenissurat']; ?>"><?php echo $r['jenis_surat']; ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Penerima / Tujuan Surat</label>
			<input type="text" class="form-control" name="penerima" placeholder="Nama Penerima" required>
		</div>

		<div class="form-group">
			<label>Perihal</label>
			<input type="text" class="form-control" name="perihal" placeholder="Perihal Surat" required>
		</div>

		<div class="form-group">
			<label>Upload Gambar Surat</label>
			<input type="file" class="form-control" name="upload">
		</div>

		<center><button type="submit" class="btn btn-success" name="s_outgo">Submit</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger" onclick="history.go(-1)">Back</button></center>
	</form>
</div>