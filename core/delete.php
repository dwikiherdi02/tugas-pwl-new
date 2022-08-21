<?php //include '../config/config.php';
if (isset($_GET['del_sm'])) {
	$idsm=$_GET['del_sm'];
	$q=$conn->query("SELECT * FROM surat_masuk WHERE id_sm='$idsm'");
	$r=$q->fetch_assoc();
	$file="docs/incoming/".$r['pict'];
	unlink($file);
	$rev=$conn->query("DELETE FROM surat_masuk WHERE id_sm='$idsm'");
	$rev2=$conn->query("DELETE FROM disposisi WHERE id_sm='$idsm'");

	if ($rev) {
		echo "<script>alert('Data berhasil dihapus');</script>
		<meta http-equiv='refresh' content='0;URL=?table=sm'>";
	}
	else {
		echo "<script>alert('Gagal');</script>
		<meta http-equiv='refresh' content='0;URL=?table=sm'>";
	}
}
elseif (isset($_GET['del_sk'])) {
	$idsk=$_GET['del_sk'];
	$q=$conn->query("SELECT * FROM surat_keluar WHERE id_sk='$idsk'");
	$r=$q->fetch_assoc();
	$file="docs/outgoing/".$r['pict'];
	unlink($file);
	$rmv=$conn->query("DELETE FROM surat_keluar WHERE id_sk='$idsk'");

	if ($rmv) {
		echo "<script>alert('Data berhasil dihapus');</script>
		<meta http-equiv='refresh' content='0;URL=?table=sk'>";
	}
	else {
		echo "<script>alert('Gagal');</script>
		<meta http-equiv='refresh' content='0;URL=?table=sk'>";
	}
}
elseif (isset($_GET['del_jen'])) {
	$idj=$_GET['del_jen'];
	$del=$conn->query("DELETE FROM jenis_surat WHERE id_jenissurat='$idj'");

	if ($del) {
		echo "<script>alert('Data berhasil dihapus');</script>
		<meta http-equiv='refresh' content='0;URL=?table=jenis'>";
	}
	else {
		echo "<script>alert('Gagal');</script>
		<meta http-equiv='refresh' content='0;URL=?table=jenis'>";
	}
}
elseif (isset($_GET['del_use'])) {
	$idu=$_GET['del_use'];
	$dis=$conn->query("DELETE FROM user WHERE id_user='$idu'");

	if ($dis) {
		echo "<script>alert('Data berhasil dihapus');</script>
		<meta http-equiv='refresh' content='0;URL=?table=petugas'>";
	}
	else {
		echo "<script>alert('Gagal');</script>
		<meta http-equiv='refresh' content='0;URL=?table=petugas'>";
	}
}
?>