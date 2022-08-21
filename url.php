<?php include 'config/config.php';
if ($_SESSION['lvl']=='Admin') {
	if (isset($_GET['table'])) {
		if ($_GET['table']=='jenis') {
			include 'tables/jenis.php';
		}
		elseif ($_GET['table']=='sm') {
			include 'tables/surat_masuk.php';
		}
		elseif ($_GET['table']=='sk') {
			include 'tables/surat_keluar.php';
		}
		elseif ($_GET['table']=='user') {
			include 'tables/user.php';
		}
	}
	elseif (isset($_GET['page'])) {
		// if ($_GET['page']=='incoming') {
		// 	include 'forms/surat_masuk.php';
		// }
		// elseif ($_GET['page']=='outgoing') {
		// 	include 'forms/surat_keluar.php';
		// }
		if ($_GET['page']=='backup') {
			include 'modul/backup.php';
		}
		else {
			include 'logout.php';
		}
	}

	elseif (isset($_GET['embed_sm'])) {
		include 'modul/embed_sm.php';
	}
	elseif (isset($_GET['embed_sk'])) {
		include 'modul/embed_sk.php';
	}

	elseif (isset($_GET['det_sm'])) {
		include 'forms/det_surat_masuk.php';
		include 'core/edit.php';
	}
	elseif (isset($_GET['det_sk'])) {
		include 'forms/det_surat_keluar.php';
		include 'core/edit.php';
	}

	//URL DELETE
	elseif (isset($_GET['del_sm'])) {
		include 'core/delete.php';
	}
	elseif (isset($_GET['del_sk'])) {
		include 'core/delete.php';
	}
	elseif (isset($_GET['del_jen'])) {
		include 'core/delete.php';
	}
	elseif (isset($_GET['del_use'])) {
		include 'core/delete.php';
	}

	else {
		include 'modul/index.php';
	}	
} // END IF SESSION ADMIN


elseif ($_SESSION['lvl']=='Archiver') {
	if (isset($_GET['table'])) {
		if ($_GET['table']=='jenis') {
			include 'tables/jenis.php';
		}
		elseif ($_GET['table']=='sm') {
			include 'tables/surat_masuk.php';
		}
		elseif ($_GET['table']=='sk') {
			include 'tables/surat_keluar.php';
		}
		else {
			echo "<script>alert('Anda tidak memiliki akses!');</script>
			<meta http-equiv='refresh' content='0;URL=dashboard.php'>";
		}
		// elseif ($_GET['table']=='petugas') {
		// 	include 'tables/petugas.php';
		// }
	}
	elseif (isset($_GET['page'])) {
		// if ($_GET['page']=='incoming') {
		// 	include 'forms/surat_masuk.php';
		// }
		// elseif ($_GET['page']=='outgoing') {
		// 	include 'forms/surat_keluar.php';
		// }
		if ($_GET['page']=='backup') {
			include 'modul/backup.php';
		}
		elseif($_GET['page']=='out') {
			include 'logout.php';
		}
		else {
			echo "<script>alert('Anda tidak memiliki akses!');</script>
			<meta http-equiv='refresh' content='0;URL=dashboard.php'>";
		}
	}

	elseif (isset($_GET['embed_sm'])) {
		include 'modul/embed_sm.php';
	}
	elseif (isset($_GET['embed_sk'])) {
		include 'modul/embed_sk.php';
	}

	elseif (isset($_GET['det_sm'])) {
		include 'forms/det_surat_masuk.php';
		include 'core/edit.php';
	}
	elseif (isset($_GET['det_sk'])) {
		include 'forms/det_surat_keluar.php';
		include 'core/edit.php';
	}

	//URL DELETE
	elseif (isset($_GET['del_sm'])) {
		include 'core/delete.php';
	}
	elseif (isset($_GET['del_sk'])) {
		include 'core/delete.php';
	}
	elseif (isset($_GET['del_jen'])) {
		include 'core/delete.php';
	}
	// elseif (isset($_GET['del_pet'])) {
	// 	include 'core/delete.php';
	// }

	else {
		include 'modul/index.php';
	}	
}
elseif ($_SESSION['lvl']=='User') {
	if (isset($_GET['page'])) {
		if($_GET['page']=='out') {
				include 'logout.php';
			}
		else {
			include 'modul/index_user.php';
		}	
	}
	elseif (isset($_GET['table'])) {
		if ($_GET['table']=='sm') {
			include 'tables/surat_masuk_user.php';
		}
		elseif ($_GET['table']=='dispos') {
			include 'tables/disposisi.php';
		}
	}
	elseif (isset($_GET['det_dispos'])) {
		include 'forms/det_surat_masuk_user.php';
		include 'core/edit.php';
	}
	elseif (isset($_GET['embed_sm'])) {
		include 'modul/embed_sm.php';
	}
	else {
			include 'modul/index_user.php';
	}
}
else {
	echo "<script>alert('Anda tidak memiliki akses!');</script>
	<meta http-equiv='refresh' content='0;URL=error.php'>";
}
?>