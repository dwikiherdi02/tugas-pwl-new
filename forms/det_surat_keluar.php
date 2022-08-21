<?php $id_sk=$_GET['det_sk'];
$sql=$conn->query("SELECT * FROM surat_keluar a JOIN jenis_surat b ON a.id_jenissurat=b.id_jenissurat WHERE a.id_sk='$id_sk'");
$r=$sql->fetch_assoc();
error_reporting(0);
?>
<div class="page-wrapper">
	<center><h2 class="page-header alert alert-default bg-info">Detail Surat Keluar</h2><br>
	<form class="form-vertical" method="POST" enctype="multipart/form-data" action="core/edit.php">

		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Tanggal Kirim</label>
				<input type="hidden" name="id" value="<?php echo $r['id_sk'] ?>">
				<input type="date" class="form-control" name="tgl_kirim" value="<?php echo $r['tgl_kirim'] ?>">
			</div>

			<div class="form-group">
				<label>No Surat</label>
				<input type="text" class="form-control" name="no_surat" value="<?php echo $r['no_surat'] ?>">
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
				<label>Penerima / Tujuan Surat</label>
				<input type="text" class="form-control" name="penerima" value="<?php echo $r['penerima'] ?>">
			</div>

			<div class="form-group">
				<label>Perihal</label>
				<input type="text" class="form-control" name="perihal" value="<?php echo $r['perihal'] ?>">
			</div>

			<div class="form-group">
				<label>Gambar Surat</label>
				<?php if (empty($r['pict'])) {
					echo "<span class='form-control text-danger'>Belum ada file ter-upload!</span>
					<input type='file' class='form-control' name='upload'>";
				}
				else {
					echo "<a class='form-control' target='_blank' href='?embed_sk=$r[id_sk]'>$r[pict]</a>
					<input type='file' class='form-control' name='upload'>
					<p class='text-danger form-control'>Upload untuk mengubah gambar atau <strong><u>Kosongkan</u></strong> jika tidak ingin diubah</p>";
				} 
				?>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-3">
		<center><button type="submit" class="btn btn-success" name="e_outgo"><i class="fa fa-check"></i> Simpan</button>&nbsp;&nbsp;<button type="reset" class="btn btn-danger" onclick="history.go(-1)"><i class="fa fa-repeat"></i> Kembali</button></center>
		</div>
	</form>
</div>