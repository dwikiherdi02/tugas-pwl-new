<?php $id_sm=$_GET['det_dispos'];
$sql=$conn->query("SELECT * FROM surat_masuk a JOIN disposisi b ON a.id_sm=b.id_sm JOIN jenis_surat c ON a.id_jenissurat=c.id_jenissurat JOIN user d ON b.id_user=d.id_user JOIN loker e ON a.id_loker=e.id_loker WHERE a.id_sm='$id_sm'");
$row=$sql->fetch_assoc();
error_reporting(0);
?>
<div class="page-wrapper">
	<center><h2 class="page-header alert alert-default bg-info">Detail Surat Masuk</h2><br>
		<form method="POST" action="core/edit.php">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Tanggal Terima</label>
				<input type="hidden" name="id" value="<?php echo $row['id_sm']; ?>">
				<input type="date" readonly class="form-control" name="tgl_terima" value="<?php echo $row['tgl_terima']; ?>">
			</div>

			<div class="form-group">
				<label>Tanggal Kirim</label>
				<input type="date" readonly class="form-control" name="tgl_kirim" value="<?php echo $row['tgl_kirim']; ?>">
			</div>

			<div class="form-group">
				<label>No Surat</label>
				<input type="text" readonly class="form-control" name="no_surat" placeholder="Nomor Surat" value="<?php echo $row['no_surat']; ?>">
			</div>

			<div class="form-group">
				<label>Jenis Surat</label>
				<select class="form-control" readonly name="id_jenis">
					<option value="<?php echo $row['id_jenissurat']; ?>"><?php echo $row['jenis_surat']; ?></option>
				</select>
			</div>

			
		</div>
		
		<div class="col-sm-6">

			<div class="form-group">
				<label>Pengirim</label>
				<input type="text" readonly class="form-control" name="pengirim" placeholder="Nama Pengirim" value="<?php echo $row['pengirim']; ?>">
			</div>

			<div class="form-group">
				<label>Perihal</label>
				<input type="text" readonly class="form-control" name="perihal" placeholder="Perihal Surat" value="<?php echo $row['perihal']; ?>">
			</div>
			<div class="form-group">
				<label>Penerima / Disposisi</label>
				<input type="text" name="penerima" class="form-control" value="<?php echo $row['nama_depan']." ".$row['nama_belakang']; ?>" readonly>
			</div>
			<div class="form-group">
				<label>Tempat/Loker Surat</label>
				<select class="form-control" name="loker" readonly>
					<option value="<?php echo $row['id_loker']; ?>"><?php echo $row['loker']; ?></option>
				</select>
			</div>

		</div>
      <div class="col-sm-2 col-sm-offset-5">
        <!-- <button type="submit" class="btn btn-success" name="e_dispos">Submit</button> -->
        <button type="button" class="btn btn-danger btn-block" onclick="history.go(-1)"><i class="fa fa-repeat"></i> Back</button>
      </div>
  	</form>
</div>