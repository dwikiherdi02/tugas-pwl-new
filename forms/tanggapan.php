<div class="modal fade" id="tanggapi<?php echo $row['id_sm'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header bg-primary">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Tanggapan</h4>
				      </div>
				      <form action="core/edit.php" method="POST">
				      <div class="modal-body">
							<div class="col-sm-6">
								<div class="form-group">
									<label>No Surat</label>
									<input type="hidden" name="id" value="<?php echo $row['id_sm']; ?>">
									<input type="text" readonly class="form-control" name="no_surat" placeholder="Nomor Surat" value="<?php echo $row['no_surat']; ?>">
								</div>

								<div class="form-group">
									<label>Jenis Surat</label>
									<input type="text" readonly class="form-control" name="jenis_surat" placeholder="Nomor Surat" value="<?php echo $row['jenis_surat']; ?>">
								</div>

								<div class="form-group">
									<label>Pengirim</label>
									<input type="text" readonly class="form-control" name="pengirim" placeholder="Nama Pengirim" value="<?php echo $row['pengirim']; ?>">
								</div>

								<div class="form-group">
									<label>Perihal</label>
									<input type="text" readonly class="form-control" name="perihal" placeholder="Perihal Surat" value="<?php echo $row['perihal']; ?>">
								</div>
							</div>
							
							<div class="col-sm-6">

								<div class="form-group">
									<label>Kepada</label>
									<input type="text" class="form-control" required name="kepada" placeholder="Kepada" value="<?php echo $row['kepada']; ?>">
								</div>

								<div class="form-group">
									<label>Keterangan</label>
									<textarea name="keterangan" class="form-control"><?php echo $row['keterangan']; ?></textarea>
								</div>

								<div class="form-group">
									<label>Tanggapan</label>
									<p class="text-muted well">Untuk <u>menindaklanjuti</u> surat masuk / request surat keluar, silahkan pilih <strong><u>Tindak Lanjut</u></strong></p>
									<div class="form-control">
										<?php
										if ($row['tanggapan']=='Tindak Lanjut') {
											$cek1="Checked";
											$cek2="";
										}
										elseif ($row['tanggapan']=='Selesai') {
											$cek1="";
											$cek2="Checked";
										}
										else {
											$cek1="";
											$cek2="";
										}
										?>
										<input type="radio" name="tanggapan" required value="Tindak Lanjut" <?php echo $cek1 ?> /> Tindak Lanjut &nbsp;&nbsp;&nbsp;
										<input type="radio" name="tanggapan" required value="Selesai" <?php echo $cek2 ?> /> Selesai
									</div>
								</div>

								<div class="form-group">
									<label>Keputusan</label>
									<div class="form-control">
										<?php
										if ($row['keputusan']=='ACC') {
											$cek1="Checked";
											$cek2="";
										}
										elseif ($row['keputusan']=='Tolak') {
											$cek1="";
											$cek2="Checked";
										}
										else {
											$cek1="";
											$cek2="";
										}
										?>
										<input type="radio" name="keputusan" required value="ACC" <?php echo $cek1 ?> /> ACC &nbsp;&nbsp;&nbsp;
										<input type="radio" name="keputusan" required value="Tolak" <?php echo $cek2 ?> /> Tolak
									</div>
								</div>

								<div class="form-group">
									<label>Penerima / Disposisi</label>
									<select class="form-control" name="id_user" required>
										<option value="<?php echo $row['id_user']; ?>"><?php echo $row['nama_depan']." ".$row['nama_belakang']; ?></option>
									</select>
								</div>

							</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				        <button type="submit" class="btn btn-success" name="e_dispos">Simpan</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>