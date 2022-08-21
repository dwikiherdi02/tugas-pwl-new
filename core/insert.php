<?php session_start();
include '../config/config.php';
if (isset($_POST['s_incom'])) {
	$tgl_ter=htmlspecialchars($_POST['tgl_terima']);
	$tgl_kir=htmlspecialchars($_POST['tgl_kirim']);
	$no_sur=htmlspecialchars($_POST['no_surat']);
	$sender=htmlspecialchars($_POST['pengirim']);
	$hal=htmlspecialchars($_POST['perihal']);
	$upl=$_FILES['upload']['name'];
	$jenis=htmlspecialchars($_POST['id_jenis']);
	$loker=htmlspecialchars($_POST['loker']);
	$user=htmlspecialchars($_POST['id_user']);

	$upload=move_uploaded_file($_FILES['upload']['tmp_name'], "../docs/incoming/".$upl);
	if (empty($upl)) {
		$save=$conn->query("INSERT INTO surat_masuk (tgl_terima, tgl_kirim, no_surat, pengirim, perihal, pict, id_jenissurat, id_loker) VALUES ('$tgl_ter','$tgl_kir','$no_sur','$sender','$hal','','$jenis','$loker')");
		if ($save) {
			$id_sm=mysqli_insert_id($conn);
			$save2=$conn->query("INSERT INTO disposisi (kepada, keterangan, status_surat, tanggapan, keputusan, id_sm, id_sk, id_user) VALUES (null,null,'Belum ditanggapi',null,null,'$id_sm',null,'$user')");
			echo "<script>alert('Berhasil Menyimpan Data!');
			document.location='../dashboard.php?table=sm';</script>";
		}
		else{
			echo "<script>alert('Gagal Menyimpan data!');
			document.location='../dashboard.php?table=sm';</script>";
		}
	}
	elseif ($upload) {
		echo "<script>alert('Upload Berhasil');</script>";
		$save=$conn->query("INSERT INTO surat_masuk (tgl_terima, tgl_kirim, no_surat, pengirim, perihal, pict, id_jenissurat, id_loker) VALUES ('$tgl_ter','$tgl_kir','$no_sur','$sender','$hal','$upl','$jenis','$loker')");
		if ($save) {
			$id_sm=mysqli_insert_id($conn);
			$save2=$conn->query("INSERT INTO disposisi (kepada, keterangan, status_surat, tanggapan, keputusan, id_sm, id_sk, id_user) VALUES (null,null,'Belum ditanggapi',null,null,'$id_sm',null,'$user')");
			echo "<script>alert('Berhasil Menyimpan Data!');
			document.location='../dashboard.php?table=sm';</script>";
		}
		else{
			echo "<script>alert('Gagal Menyimpan data!');
			document.location='../dashboard.php?table=sm';</script>";
		}
	}
	else {
		echo "<script>alert('Upload Gagal, silahkan input ulang');
		document.location='../dashboard.php?table=sm';</script>";
	}
}
elseif (isset($_POST['s_outgo'])) {
	$tgl_kir=htmlspecialchars($_POST['tgl_kirim']);
	$no_sur=htmlspecialchars($_POST['no_surat']);
	$recev=htmlspecialchars($_POST['penerima']);
	$hal=htmlspecialchars($_POST['perihal']);
	$upl=$_FILES['upload']['name'];
	$jenis=htmlspecialchars($_POST['id_jenis']);

	$upload=move_uploaded_file($_FILES['upload']['tmp_name'], "../docs/outgoing/".$upl);
	if (empty($upl)) {
		$keep=$conn->query("INSERT INTO surat_keluar (tgl_kirim, no_surat, penerima, perihal, pict, id_jenissurat) VALUES ('$tgl_kir','$no_sur','$recev','$hal','','$jenis')");
		if ($keep) {
				echo "<script>alert('Berhasil Menyimpan Data!');
				document.location='../dashboard.php?table=sk';</script>";
		}
		else{
			echo "<script>alert('Gagal!');
			document.location='../dashboard.php?table=sk';</script>";
		}
	}
	elseif ($upload) {
		echo "<script>alert('Upload Berhasil');</script>";
		$keep=$conn->query("INSERT INTO surat_keluar (tgl_kirim, no_surat, penerima, perihal, pict, id_jenissurat) VALUES('$tgl_kir','$no_sur','$recev','$hal','$upl','$jenis')");
		if ($keep) {
				echo "<script>alert('Berhasil Menyimpan Data!');
				document.location='../dashboard.php?table=sk';</script>";
		}
		else{
			echo "<script>alert('Gagal!');
			document.location='../dashboard.php?table=sk';</script>";
		}
	}
	else {echo "<script>alert('Upload Gagal, silahkan input ulang');
		document.location='../dashboard.php?table=sk';</script>";
	}
}
elseif (isset($_POST['s_jenis'])) {
	$jenis=htmlspecialchars($_POST['jenis']);

	$simpan=$conn->query("INSERT INTO jenis_surat (jenis_surat) VALUES('$jenis')");

	if ($simpan) {
		echo "<script>alert('Berhasil Menyimpan Data!');
		document.location='../dashboard.php?table=jenis';</script>";
	}
	else{
		echo "<script>alert('Gagal!');
		document.location='../dashboard.php?table=jenis';</script>";
	}	
}
elseif (isset($_POST['s_user'])) {
	$dpn=htmlspecialchars($_POST['nm_dpn']);
	$blk=htmlspecialchars($_POST['nm_blk']);
	$user=htmlspecialchars($_POST['username']);
	$pass=md5($_POST['password']);
	$lvl=htmlspecialchars($_POST['level']);

	$add=$conn->query("INSERT INTO user (nama_depan, nama_belakang, username, password, status, level) VALUES('$dpn', '$blk', '$user', '$pass', 'Tidak Aktif', '$lvl')");

	if ($add) {
		echo "<script>alert('Berhasil Menyimpan Data!');
		document.location='../dashboard.php?table=user';</script>";
	}
	else {
		echo "<script>alert('Gagal!');
		document.location='../dashboard.php?table=user';</script>";
	}
}
elseif (isset($_POST['register'])) {
	$dpn=htmlspecialchars($_POST['nm_dpn']);
	$blk=htmlspecialchars($_POST['nm_blk']);
	$user=htmlspecialchars($_POST['username']);
	$pass=md5($_POST['password']);
	$conpas=md5($_POST['kon_pass']);

	if ($_POST['password'] <> $_POST['kon_pass']) {
		echo "<script>alert('Konfirmasi Password salah!');
		document.location='../index.php';</script>";
	}
	else {
		$add=$conn->query("INSERT INTO user (nama_depan, nama_belakang, username, password, status, level) VALUES ('$dpn', '$blk', '$user', '$pass', 'Tidak Aktif', 'User')");
		if ($add) {
			echo "<script>alert('Berhasil membuat akun! akun masih nonaktif, hubungi admin untuk mengaktivasi');
			document.location='../index.php';</script>";
		}
		else {
			echo "<script>alert('Gagal!');
			document.location='../index.php';</script>";
		}
	}
}
?>