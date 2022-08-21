<?php include '../config/config.php';
if (isset($_POST['e_jenis'])) {
	$id=htmlspecialchars($_POST['id']);
	$jenis=htmlspecialchars($_POST['jenis']);

	$change=$conn->query("UPDATE jenis_surat SET jenis_surat='$jenis' WHERE id_jenissurat='$id'");
	if ($change) {
		echo "<script>alert('Data berhasil diubah');</script>
		<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=jenis'>";
	}
	else {
		echo "<script>alert('Gagal diubah');</script>
		<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=jenis'>";
	}
}
elseif (isset($_POST['e_user'])) {
	$idp=htmlspecialchars($_POST['id']);
	$dpn=htmlspecialchars($_POST['nm_dpn']);
	$blk=htmlspecialchars($_POST['nm_blk']);
	$user=htmlspecialchars($_POST['username']);
	$pass=htmlspecialchars($_POST['password']);
	$status=htmlspecialchars($_POST['status']);

	if (empty($pass)) {
		$edit=$conn->query("UPDATE user SET nama_depan='$dpn', nama_belakang='$blk', username='$user', status='$status' WHERE id_user='$idp'");
		if ($edit) {
			echo "<script>alert('Data berhasil diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=user'>";
		}
		else {
			echo "<script>alert('Gagal diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=user'>";
		}
	}
	else {
		$edit=$conn->query("UPDATE user SET nama_depan='$dpn', nama_belakang='$blk', username='$user', password=md5('$pass'), status='$status' WHERE id_user='$idp'");
		if ($edit) {
			echo "<script>alert('Data berhasil diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=user'>";
		}
		else {
			echo "<script>alert('Gagal diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=user'>";
		}
	}
}
elseif (isset($_POST['e_incom'])) {
	$idsm=htmlspecialchars($_POST['id']);
	$tgl_ter=htmlspecialchars($_POST['tgl_terima']);
	$tgl_kir=htmlspecialchars($_POST['tgl_kirim']);
	$no_sur=htmlspecialchars($_POST['no_surat']);
	$sender=htmlspecialchars($_POST['pengirim']);
	$hal=htmlspecialchars($_POST['perihal']);
	$upl=$_FILES['upload']['name'];
	$jenis=htmlspecialchars($_POST['id_jenis']);
	$loker=htmlspecialchars($_POST['loker']);

	$kepada=htmlspecialchars($_POST['kepada']);
	$keterangan=htmlspecialchars($_POST['keterangan']);
	$status=htmlspecialchars($_POST['status']);
	$tanggapan=htmlspecialchars($_POST['tanggapan']);
	$user=htmlspecialchars($_POST['id_user']);


	if (empty($upl)) {
		$ex=$conn->query("UPDATE surat_masuk SET tgl_terima='$tgl_ter', tgl_kirim='$tgl_kir', no_surat='$no_sur', pengirim='$sender', perihal='$hal', id_jenissurat='$jenis', id_loker='$loker' WHERE id_sm='$idsm'");
		$ex2=$conn->query("UPDATE disposisi SET kepada='$kepada', keterangan='$keterangan', status_surat='$status', tanggapan='$tanggapan', id_user='$user' WHERE id_sm='$idsm'");
		if ($ex) {
			echo "<script>alert('Data berhasil diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sm'>";
		}
		else {
			echo "<script>alert('Gagal diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?det_sm=$idsm'>";
		}
	}
	else {
		$upload=move_uploaded_file($_FILES['upload']['tmp_name'], "../docs/incoming/".$upl);
		if ($upload) {
			echo "Upload file Berhasil";
			$q=$conn->query("SELECT * FROM surat_masuk WHERE id_sm='$idsm'");
			$r=$q->fetch_assoc();
			if (is_file("../docs/incoming/".$r['pict'])) {
				unlink("../docs/incoming/".$r['pict']);	
			}
			$sql = "UPDATE surat_masuk SET tgl_terima='$tgl_ter', tgl_kirim='$tgl_kir', no_surat='$no_sur', pengirim='$sender', perihal='$hal', pict='$upl', id_jenissurat='$jenis', id_loker='$loker' WHERE id_sm='$idsm'";
			$ex=$conn->query($sql);
			$ex2=$conn->query("UPDATE disposisi SET email='$email', kepada='$kepada', keterangan='$keterangan', status_surat='$status', tanggapan='$tanggapan' WHERE id_sm='$idsm'");
			if ($ex) {
				echo "<script>alert('Data berhasil diubah');</script>
				<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sm'>";
			}
			else {
				echo "<script>alert('Gagal diubah');</script>
				<meta http-equiv='refresh' content='0;URL=../dashboard.php?det_sm=$idsm'>";
			}
		}
		else {
			echo "<script>alert('Upload Gagal, Silahkan Cek Kembali!');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?det_sm=$idsm'>";
		}
	}	
}
elseif (isset($_POST['e_outgo'])) {
	$idsk=htmlspecialchars($_POST['id']);
	$tgl_kir=htmlspecialchars($_POST['tgl_kirim']);
	$no_sur=htmlspecialchars($_POST['no_surat']);
	$recev=htmlspecialchars($_POST['penerima']);
	$hal=htmlspecialchars($_POST['perihal']);
	$upl=$_FILES['upload']['name'];
	$jenis=htmlspecialchars($_POST['id_jenis']);

	if (empty($upl)) {
		$kep=$conn->query("UPDATE surat_keluar SET tgl_kirim='$tgl_kir', no_surat='$no_sur', penerima='$recev', perihal='$hal', id_jenissurat='$jenis' WHERE id_sk='$idsk'");
		if ($kep) {
			echo "<script>alert('Data berhasil diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sk'>";
		}
		else {
			echo "<script>alert('Gagal diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?det_sk=$idsk'>";
		}
	}
	else {
		$upload=move_uploaded_file($_FILES['upload']['tmp_name'], "../docs/outgoing/".$upl);
		if ($upload) {
			echo "Upload file Berhasil";
			$q=$conn->query("SELECT * FROM surat_keluar WHERE id_sk='$idsk'");
			$r=$q->fetch_assoc();
			if (is_file("../docs/outgoing/".$r['pict'])) {
				unlink("../docs/outgoing/".$r['pict']);	
			}
			$kep=$conn->query("UPDATE surat_keluar SET tgl_kirim='$tgl_kir', no_surat='$no_sur', penerima='$recev', perihal='$hal', pict='$upl', id_jenissurat='$jenis' WHERE id_sk='$idsk'");
			if ($kep) {
				echo "<script>alert('Data berhasil diubah');</script>
				<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sk'>";
			}
			else {
				echo "<script>alert('Gagal diubah');</script>
				<meta http-equiv='refresh' content='0;URL=../dashboard.php?det_sk=$idsk'>";
			}
		}
		else {
			echo "<script>alert('Upload Gagal, Silahkan Cek Kembali!');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?det_sk=$idsk'>";
		}
	}
}
elseif (isset($_POST['e_dispos'])) {
	$idsm=htmlspecialchars($_POST['id']);
	$sql=$conn->query("SELECT * FROM surat_masuk WHERE id_sm='$idsm'");
	$sm=$sql->fetch_assoc();

	$kepada=htmlspecialchars($_POST['kepada']);
	$keterangan=htmlspecialchars($_POST['keterangan']);
	$tanggapan=htmlspecialchars($_POST['tanggapan']);
	$keputusan=htmlspecialchars($_POST['keputusan']);
	$user=htmlspecialchars($_POST['id_user']);

	if ($tanggapan=='Tindak Lanjut') {
		$sk=$conn->query("INSERT INTO surat_keluar (tgl_kirim, no_surat, penerima, perihal, pict, id_jenissurat) VALUES (null,'".$sm['no_surat']."','$kepada','Balasan ".$sm['perihal']."','','".$sm['id_jenissurat']."')");
		$idsk=mysqli_insert_id($conn);
		
		$ex2=$conn->query("UPDATE disposisi SET kepada='$kepada', keterangan='$keterangan', status_surat='Sudah ditanggapi', tanggapan='$tanggapan', keputusan='$keputusan', id_sk='$idsk', id_user='$user' WHERE id_sm='$idsm'");
		if ($ex2) {
			echo "<script>alert('Data berhasil diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sm'>";
		}
		else {
			echo "<script>alert('Gagal diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sm'>";
		}
	}
	else {
		$ex2=$conn->query("UPDATE disposisi SET kepada='$kepada', keterangan='$keterangan', status_surat='Sudah ditanggapi', tanggapan='$tanggapan', keputusan='$keputusan', id_user='$user' WHERE id_sm='$idsm'");
		if ($ex2) {
			echo "<script>alert('Data berhasil diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sm'>";
		}
		else {
			echo "<script>alert('Gagal diubah');</script>
			<meta http-equiv='refresh' content='0;URL=../dashboard.php?table=sm'>";
		}
	}
}
?>