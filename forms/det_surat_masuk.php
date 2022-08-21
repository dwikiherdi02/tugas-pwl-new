<?php $id_sm=$_GET['det_sm'];
$sql=$conn->query("SELECT * FROM surat_masuk a JOIN disposisi b ON a.id_sm=b.id_sm JOIN jenis_surat c ON a.id_jenissurat=c.id_jenissurat JOIN user d ON b.id_user=d.id_user JOIN loker e ON a.id_loker=e.id_loker WHERE a.id_sm='$id_sm'");
$r=$sql->fetch_assoc();
error_reporting(0);
?>
<div class="page-wrapper">
	<center><h2 class="page-header alert alert-default bg-info">Detail Surat Masuk</h2><br>
	<form method="POST" enctype="multipart/form-data" action="core/edit.php">
		<div class="col-md-6">
			<div class="form-group">
				<label>Tanggal Terima</label>
				<input type="hidden" name="id" value="<?php echo $r['id_sm']; ?>">
				<input type="date" class="form-control" name="tgl_terima" value="<?php echo $r['tgl_terima']; ?>">
			</div>

			<div class="form-group">
				<label>Tanggal Kirim</label>
				<input type="date" class="form-control" name="tgl_kirim" value="<?php echo $r['tgl_kirim']; ?>">
			</div>

			<div class="form-group">
				<label>No Surat</label>
				<input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" value="<?php echo $r['no_surat']; ?>">
			</div>

			<div class="form-group">
				<label>Jenis Surat</label>
				<select class="form-control" name="id_jenis">
					<option value="<?php echo $r['id_jenissurat']; ?>"><?php echo $r['jenis_surat']; ?></option>
					<?php $sql=$conn->query("SELECT * FROM jenis_surat WHERE id_jenissurat<>'$r[id_jenissurat]'");
					while ($rw=$sql->fetch_assoc()) { ?>
					<option value="<?php echo $rw['id_jenissurat']; ?>"><?php echo $rw['jenis_surat']; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label>Pengirim</label>
				<input type="text" class="form-control" name="pengirim" placeholder="Nama Pengirim" value="<?php echo $r['pengirim']; ?>">
			</div>

			<div class="form-group">
				<label>Perihal</label>
				<input type="text" class="form-control" name="perihal" placeholder="Perihal Surat" value="<?php echo $r['perihal']; ?>">
			</div>
		</div>
		
		<div class="col-md-6">

			<div class="form-group">
				<label>Kepada</label>
				<input type="text" class="form-control" name="kepada" placeholder="Kepada" value="<?php echo $r['kepada']; ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<textarea name="keterangan" class="form-control"><?php echo $r['keterangan']; ?></textarea>
			</div>

			<div class="form-group">
				<label>Status Surat</label>
				<select name="status" class="form-control">
					<?php
					if ($r['status_surat']=='Sudah ditanggapi') {
						echo "<option disabled selected value='$r[status_surat]'>$r[status_surat]</option>";
					}
					else {
						echo "<option value='$r[status_surat]'>$r[status_surat]</option>";
					}
					?>
				</select>
				<!-- <input type="text" class="form-control" name="status" placeholder="Status Surat" value="<?php echo $r['status_surat']; ?>"> -->
			</div>

			<div class="form-group">
				<label>Tanggapan</label>
				<input type="text" class="form-control" name="tanggapan" placeholder="Tanggapan Surat" value="<?php echo $r['tanggapan']; ?>">
			</div>

			<div class="form-group">
				<label>Penerima / Disposisi</label>
				<select class="form-control" name="id_user" required>
					<option value="<?php echo $r['id_user']; ?>"><?php echo $r['nama_depan']." ".$r['nama_belakang']; ?></option>
					<?php $sql=$conn->query("SELECT * FROM user WHERE level='User' AND id_user<>'$r[id_user]'");
						while ($rw=$sql->fetch_assoc()) { ?>
					<option value="<?php echo $rw['id_user']; ?>"><?php echo $rw['nama_depan']." ".$rw['nama_belakang']; ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label>Tempat/Loker Surat</label>
				<select class="form-control" name="loker" required>
					<option value="<?php echo $r['id_loker']; ?>"><?php echo $r['loker']; ?></option>
					<?php $sql=$conn->query("SELECT * FROM loker WHERE id_loker<>'$r[id_loker]'");
					while ($rw=$sql->fetch_assoc()) { ?>
					<option value="<?php echo $rw['id_loker']; ?>"><?php echo $rw['loker']; ?></option>
					<?php } ?>
				</select>
			</div>

		</div>

		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
				<label>Gambar Surat</label>
				<?php if (empty($r['pict'])) {
					echo "<span class='text-danger form-control'>Belum ada file ter-upload!</span>
					<input type='file' class='form-control' name='upload'>";
				}
				else {
					echo "<a class='form-control' target='_blank' href='?embed_sm=$r[id_sm]'>$r[pict]</a>
					<input type='file' class='form-control' name='upload'>
					<p class='text-danger form-control'>Upload untuk mengubah gambar atau <strong><u>Kosongkan</u></strong> jika tidak ingin diubah</p>";
				} 
				?>
			</div>
			<center><button type="submit" class="btn btn-success" name="e_incom"><i class="fa fa-check"></i> Simpan</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger" onclick="history.go(-1)"><i class="fa fa-repeat"></i> Back</button></center>
		</div>

	</form>
</div>