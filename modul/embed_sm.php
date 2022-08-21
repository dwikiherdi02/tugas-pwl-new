<?php if (isset($_GET['embed_sm'])) {
	$id=$_GET['embed_sm'];
	$sql=$conn->query("SELECT * FROM surat_masuk WHERE id_sm='$id'");
	$r=$sql->fetch_assoc();
}
?>
<div class="page-wrapper">
	<div class="well">
		<embed class="embed-responsive img-responsive" width="100%" height="100%" src="<?php echo 'docs/incoming/'.$r['pict']; ?>"></embed>
	</div>
</div>