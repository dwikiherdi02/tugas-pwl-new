<div id="page-wrapper">
	<div class="table-responsive">
		<center><h2 class="page-header alert alert-default bg-primary">Data Jenis Surat</h2><br>
			<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah</button></center>

		<table id="myTable" class="table table-bordered table-hover">
			<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Jenis Surat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $sql=$conn->query("SELECT * FROM jenis_surat");
                while ($row=$sql->fetch_assoc()) { ?>

			<tr class="active">
				<td><?php echo $row['id_jenissurat']; ?></td>
				<td><?php echo $row['jenis_surat']; ?></td>
				<td><a href="#edit<?php echo $row['id_jenissurat'];?>" data-toggle="modal" class="btn btn-warning"><i class="glyphicon glyphicon-zoom-in"></i>&nbsp;Ubah</a> | <a href="?del_jen=<?php echo $row['id_jenissurat'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a></td>
			</tr>

			<?php include 'forms/e_jenis.php'; ?>

			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<form method="POST" action="core/insert.php">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group input-group">
			<span class="input-group-addon">Jenis Surat</span>
			<input type="text" class="form-control" name="jenis" required placeholder="Jenis Surat">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
        <button type="submit" class="btn btn-success" name="s_jenis"><i class="fa fa-check"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>