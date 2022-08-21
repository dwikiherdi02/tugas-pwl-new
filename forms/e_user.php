<div class="modal fade" id="edit<?php echo $row['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning">
			    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <h4 class="modal-title" id="myModalLabel">Ubah Data</h4>
			</div>
			<form method="POST" action="core/edit.php">
			<div class="modal-body">

			  	<div class="form-group">
					<label>Nama Depan</label>
					<input type="hidden" name="id" value="<?php echo $row['id_user'];?>">
					<input type="text" class="form-control" name="nm_dpn" required value="<?php echo $row['nama_depan']; ?>">
				</div>

				<div class="form-group">
					<label>Nama Belakang</label>
					<input type="text" class="form-control" name="nm_blk" required value="<?php echo $row['nama_belakang']; ?>">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" required value="<?php echo $row['username']; ?>">
				</div>

				<div class="form-group">
					<label>Kata Sandi</label>
					<input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru">
					<p class="text-muted">Kosongkan bagian ini jika tidak ingin mengubah Password</p>
				</div>

				<div class="form-group">
					<label>Status</label>
					<?php if ($row['status']=='Aktif') {
						$cek1="Checked";
						$cek2="";
						$cek3="";
					}
					elseif ($row['status']=='Blokir') {
						$cek1="";
						$cek2="Checked";
						$cek3="";
					}
					else {
						$cek1="";
						$cek2="";
						$cek3="Checked";
					}
					?>
				<div class="form-control">
					<input type="radio" name="status" required value="Aktif" <?php echo $cek1 ?> /> Aktif &nbsp;&nbsp;&nbsp;
					<input type="radio" name="status" required value="Blokir" <?php echo $cek2 ?> /> Blokir &nbsp;&nbsp;&nbsp;
					<input type="radio" name="status" required value="Tidak Aktif" <?php echo $cek3 ?> /> Tidak Aktif
				</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
					<button type='submit' class='btn btn-success' name='e_user'><i class="fa fa-check"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>