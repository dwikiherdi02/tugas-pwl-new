<div class="modal fade" id="edit<?php echo $row['id_jenissurat'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				    <h4 class="modal-title" id="myModalLabel">Ubah Data</h4>
			</div>
			<form method="POST" action="core/edit.php">
				<div class="modal-body">
				   <div class="form-group input-group">
						<span class="input-group-addon">Jenis Surat</span>
					    <input type="hidden" value="<?php echo $row['id_jenissurat'];?>" name="id">
						<input type="text" class="form-control" name="jenis" required value="<?php echo $row['jenis_surat'];?>">
					</div>
				</div>
				<div class="modal-footer">
				    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
				    <button type='submit' class='btn btn-success' name='e_jenis'><i class="fa fa-check"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>