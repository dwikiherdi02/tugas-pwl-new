<div class="col-lg-12">
	<center><h2 class="page-header alert alert-default bg-primary">Data Surat Masuk</h2><br>
		<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah</button></center>

		<form action="report/index.php" method="POST">
			<input type="month" name="month">
			<button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Report</button>
		</form><br>

		<table class="table table-bordered table-hover" id="myTable">
			<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Tanggal Terima</th>
					<th>No Surat</th>
					<th>Pengirim</th>
					<th>Perihal</th>
					<th>Status Surat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $sql=$conn->query("SELECT * FROM surat_masuk a JOIN disposisi b ON a.id_sm=b.id_sm");
			$no=0;
                while ($row=$sql->fetch_assoc()) { 
                $no++;	?>
				<tr class="active">
					<td><?php echo $no; ?></td>
					<td><?php echo $row['tgl_terima']; ?></td>
					<td><?php echo $row['no_surat']; ?></td>
					<td><?php echo $row['pengirim']; ?></td>
					<td><?php echo $row['perihal']; ?></td>
					<td><?php
					if ($row['status_surat']=='Sudah ditanggapi') {
						echo $row['status_surat']." <label class='label label-success'><i class='glyphicon glyphicon-ok'></i></label>";
					}
					else {
						echo $row['status_surat']." <label class='label label-danger'><i class='glyphicon glyphicon-remove'></i></label>";
					}
					?></td>
					<td><a href="?det_sm=<?php echo $row['id_sm'];?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Detail</a> | <a href="?del_sm=<?php echo $row['id_sm'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
</div>

<!-- Modal -->
<form method="POST" enctype="multipart/form-data" action="core/insert.php">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
			<div class="col-md-6">
				<div class="form-group">
					<label>Tanggal Terima</label>
					<input type="date" class="form-control" name="tgl_terima" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
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
			</div>

			<div class="col-md-6">
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

				<div class="form-group">
					<label>Tujuan Surat</label>
					<select class="form-control" name="loker" required>
						<option disabled="" selected="">Pilih Loker Surat</option>
						<?php $sql=$conn->query("SELECT * FROM loker ORDER BY loker ASC");
						while ($r=$sql->fetch_assoc()) { ?>
						<option value="<?php echo $r['id_loker']; ?>"><?php echo $r['loker']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
        <button type="submit" class="btn btn-success" name="s_incom"><i class="fa fa-check"></i> Submit</button>
      </div>
    </div>
  </div>
</div>
</form>