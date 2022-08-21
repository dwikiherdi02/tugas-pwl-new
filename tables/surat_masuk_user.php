<div id="page-wrapper">
	<center><h2 class="page-header alert alert-default bg-primary">Data Surat Masuk</h2><br>

	<div class="table-responsive">
		<table class="table table-bordered table-hover" id="myTable">
			<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Tanggal Terima</th>
					<th>Pengirim</th>
					<th>Perihal</th>
					<th>Status Surat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $iduser=$_SESSION['id'];
			$sql=$conn->query("SELECT * FROM disposisi a JOIN surat_masuk b ON a.id_sm=b.id_sm JOIN user c ON a.id_user=c.id_user JOIN jenis_surat d ON b.id_jenissurat = d.id_jenissurat WHERE c.id_user='$iduser'");
			$no=0;
                while ($row=$sql->fetch_assoc()) { 
                $no++;	?>
				<tr class="active">
					<td><?php echo $no; ?></td>
					<td><?php echo $row['tgl_terima']; ?></td>
					<td><?php echo $row['pengirim']; ?></td>
					<td><?php echo $row['perihal']; ?></td>
					<td><?php
								if ($row['status_surat']=='Sudah ditanggapi') {
									echo $row['status_surat']." <label class='label label-success'><i class='glyphicon glyphicon-ok'></i></label>";
									$cek="disabled";
								}
								else {
									echo $row['status_surat']." <label class='label label-warning'><i class='fa fa-exclamation'></i></label>";
									$cek="";
								}

								if (empty($row['pict'])) {
									$cok="disabled";
								}
								else {
									$cok="";
								}
					?></td>
					<td><a href="#view<?php echo $row['id_sm'];?>" data-toggle="modal" class="btn btn-success" <?php echo $cok; ?>><i class="glyphicon glyphicon-picture"></i>&nbsp;Preview</a> | <a href="?det_dispos=<?php echo $row['id_sm'];?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Detail</a>
						<a href="#tanggapi<?php echo $row['id_sm'];?>" class="btn btn-primary" <?php echo $cek; ?> data-toggle="modal"><i class="glyphicon glyphicon-edit"></i>&nbsp;Tanggapi</a>
					</td>
				</tr>

				<div class="modal fade" id="view<?php echo $row['id_sm'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-success">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Preview</h4>
				      </div>
				      <div class="modal-body">
							<embed class="img-responsive" width="100%" height="100%" src="docs/incoming/<?php echo $row['pict'] ?>"></embed>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				      </div>
				    </div>
				  </div>
				</div>
				<?php include 'forms/tanggapan.php'; ?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>