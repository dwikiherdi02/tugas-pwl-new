<div class="col-lg-12">
		<center><h2 class="page-header alert alert-default bg-primary">Data Surat Keluar</h2><br>
			<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah</button></center>

		<form action="report/pdf_suratkeluar.php" method="POST">
			<input type="month" name="month">
			<button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Print Report</button>
		</form>
		<br>

		<table id="myTable" class="table table-bordered table-hover">
			<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Tanggal Kirim</th>
					<th>Nomor Surat</th>
					<th>Penerima</th>
					<th>Perihal</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $sql=$conn->query("SELECT * FROM surat_keluar");
			$no=0;
                while ($row=$sql->fetch_assoc()) { 
                $no++;	?>
			<tr class="active">
				<td><?php echo $no; ?></td>
				<td><?php echo $row['tgl_kirim']; ?></td>
				<td><?php echo $row['no_surat']; ?></td>
				<td><?php echo $row['penerima']; ?></td>
				<td><?php echo $row['perihal'] ?></td>
				<td><a href="?det_sk=<?php echo $row['id_sk'];?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Detail</a> | <a href="?del_sk=<?php echo $row['id_sk'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data??');"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
</div>

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
		</div>

		<div class="col-md-6">
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
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
        <button type="submit" class="btn btn-success" name="s_outgo"><i class="fa fa-check"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>