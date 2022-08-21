<div id="page-wrapper">
	<div>
		<center><h2 class="page-header alert alert-default bg-primary">Data Tanggapan / Disposisi</h2><br></center>

		<table id="myTable" class="table table-bordered table-hover">
			<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>No Surat</th>
					<th>Jenis Surat</th>
					<th>Kepada</th>
					<th>Status</th>
					<th>Tanggapan</th>
					<th>Keputusan</th>
				</tr>
			</thead>
			<?php $iduser=$_SESSION['id']; 
			$no=0;
				$sql=$conn->query("SELECT * FROM disposisi a JOIN surat_masuk b ON a.id_sm=b.id_sm JOIN jenis_surat c ON b.id_jenissurat=c.id_jenissurat WHERE a.id_user='$iduser'");
				while ($row=$sql->fetch_assoc()) {
					$no++; ?>
			<tbody>
				<tr class="active">
					<td><?php echo $no; ?></td>
					<td><?php echo $row['no_surat']; ?></td>
					<td><?php echo $row['jenis_surat']; ?></td>
					<td><?php 
					if (empty($row['kepada'])) {
						echo "<label class='label label-default'>NULL <i class='fa fa-exclamation'></i></label>";
					}
					else {
						echo $row['kepada'];
					}
					?></td>

					<td><?php 
					if ($row['status_surat']=='Sudah ditanggapi') {
						echo $row['status_surat']." <label class='label label-success'><i class='glyphicon glyphicon-ok'></i></label>";
					}
					elseif ($row['status_surat']=='Belum ditanggapi') {
						echo $row['status_surat']." <label class='label label-warning'><i class='fa fa-exclamation'></i></label>";
					}
					?></td>

					<td><?php 
					if (empty($row['tanggapan'])) {
						echo "<label class='label label-default'>NULL</label>";
					}
					elseif ($row['tanggapan']=='Tindak Lanjut') {
					 	echo $row['tanggapan']." <i class='fa fa-share-square fa-lg'></i>";
					}
					else {
						echo $row['tanggapan']." <i class='fa fa-check-circle fa-lg'></i>";
					}
					?></td>

					<td><?php 
					if (empty($row['keputusan'])) {
						echo "<label class='label label-default'>NULL</label>";
					}
					elseif ($row['keputusan']=='ACC') {
					 	echo "<label class='label label-success'>".$row['keputusan']."</label>";
					}
					else {
						echo "<label class='label label-danger'>".$row['keputusan']."</label>";
					}
					?></td>

				</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
</div>