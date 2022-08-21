<div class="page-wrapper">
	<center><h2 class="page-header alert alert-default bg-warning">Surat Masuk</h2><br>
	<form class="form-vertical col-md-6 col-md-offset-3" method="POST" enctype="multipart/form-data" action="core/insert.php">
		<div class="form-group">
			<label>Tanggal Terima</label>
			<input type="date" class="form-control" name="tgl_terima" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>">
		</div>

		<div class="form-group">
			<label>Tanggal Kirim</label>
			<input type="date" class="form-control" name="tgl_kirim" value="<?php echo date('Y-m-d'); ?>">
		</div>

		<div class="form-group">
			<label>No Surat</label>
			<input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" required>
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
			<label>Pengirim</label>
			<input type="text" class="form-control" name="pengirim" placeholder="Nama Pengirim" required>
		</div>

		<div class="form-group">
			<label>Perihal</label>
			<input type="text" class="form-control" name="perihal" placeholder="Perihal Surat" required>
		</div>

		<div class="form-group">
			<label>Upload Gambar Surat</label>
			<input type="file" class="form-control" name="upload">
		</div>

		<div class="form-group">
			<label>Tujuan Surat</label>
			<select class="form-control" name="id_user" required>
				<option disabled="" selected="">Pilih Disposisi</option>
				<?php $sql=$conn->query("SELECT * FROM user WHERE Level='User'");
				while ($r=$sql->fetch_assoc()) { ?>
				<option value="<?php echo $r['id_user']; ?>"><?php echo $r['nama_depan']." ".$r['nama_belakang']; ?></option>
				<?php } ?>
			</select>
		</div>

		<center><button type="submit" class="btn btn-success" name="s_incom">Submit</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger" onclick="history.go(-1)">Back</button></center>
	</form>
</div>