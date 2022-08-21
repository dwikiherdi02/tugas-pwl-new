<?php if (isset($_GET['embed_sk'])) {
	$id=$_GET['embed_sk'];
	$sql=$conn->query("SELECT * FROM surat_keluar WHERE id_sk='$id'");
	$r=$sql->fetch_assoc();
}
?>
<div class="page-wrapper">
	<div class="well">
		<embed class="embed-responsive img-responsive" width="100%" height="100%" src="<?php echo 'docs/outgoing/'.$r[pict]; ?>"></embed>
	</div>
</div>