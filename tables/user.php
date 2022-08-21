<div id="page-wrapper">
	<div class="table-responsive">
		<center><h2 class="page-header alert alert-default bg-primary">Data Pengguna</h2><br><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah</button></center>

		<table id="myTable" class="table table-bordered table-hover">
			<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Nama Lengkap</th>
					<th>Username</th>
					<th>Status</th>
					<th>Level</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php $no=0;
				$sql=$conn->query("SELECT * FROM user WHERE level<>'Admin'");
				while ($row=$sql->fetch_assoc()) {
					$no++; ?>
			<tbody>
				<tr class="active">
					<td><?php echo $no; ?></td>
					<td><?php echo $row['nama_depan']." ".$row['nama_belakang']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><?php echo $row['level']; ?></td>
					<td><a href="#edit<?php echo $row['id_user'];?>" data-toggle="modal" class="btn btn-warning"><i class="glyphicon glyphicon-zoom-in"></i>&nbsp;Ubah</a> | <a href="?del_use=<?php echo $row['id_user'];?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');"><i class="glyphicon glyphicon-trash"></i>&nbsp;Hapus</a></td>
				</tr>

				<?php include 'forms/e_user.php'; ?>

			</tbody>
			<?php } ?>
		</table>
	</div>
</div>

<form method="POST" action="core/insert.php">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
			<label>Nama Depan</label>
			<input type="text" class="form-control" name="nm_dpn" required placeholder="Masukkan Nama Depan Anda">
		</div>

		<div class="form-group">
			<label>Nama Belakang</label>
			<input type="text" class="form-control" name="nm_blk" required placeholder="Masukkan Nama Belakang Anda">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" required placeholder="Masukkan Username">
		</div>

		<div class="form-group">
			<label>Kata Sandi</label>
			<input type="password" class="form-control" name="password" required placeholder="Masukkan Kata Sandi">
		</div>

		<div class="form-group">
			<label>Level</label>
			<div class="form-control">
				<input type="radio" name="level" required value="Archiver" /> Archiver &nbsp;&nbsp;&nbsp;
				<input type="radio" name="level" required value="User" /> User
			</div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
        <button type="submit" class="btn btn-success" name="s_user"><i class="fa fa-check"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>