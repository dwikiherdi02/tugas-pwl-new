<?php include 'config/config.php';
$user=htmlspecialchars($_POST['username']);
$pass=md5($_POST['password']);

$sql=$conn->query("SELECT * FROM user WHERE username='$user' AND password='$pass'");
	$log=$sql->fetch_assoc();
	$cek=mysqli_num_rows($sql);

	if ($cek > 0) {
		if ($log['level']=='Admin' OR $log['level']=='Archiver' OR $log['level']=='User') {
			if ($log['status']=='Aktif') {
				session_start();

				$_SESSION['id']=$log['id_user'];
				$_SESSION['user']=$log['username'];
				$_SESSION['pass']=$log['password'];
				$_SESSION['dpn']=$log['nama_depan'];
				$_SESSION['blk']=$log['nama_belakang'];
				$_SESSION['lvl']=$log['level'];
				echo "<script>alert('Welcome ".$_SESSION['dpn']." ".$_SESSION['blk']."');
				document.location='dashboard.php';</script>";
			}
			elseif ($log['status']=='Blokir') {
				echo "<script>alert('Akun diblokir, silahkan hubungi Administrator!');</script>
				<meta http-equiv='refresh' content='0;URL=index.php'>";
			}
			else {
				echo "<script>alert('Akun tidak aktif, silahkan hubungi Administrator!');</script>
				<meta http-equiv='refresh' content='0;URL=index.php'>";
			}	
		} // END OF IF CHECKING LEVEL
		
		else {
			echo "<script>alert('Anda tidak memiliki akses!');</script>
			<meta http-equiv='refresh' content='0;URL=error.php'>";
		}
	}

	else {
		echo "<script>alert('Wrong Username or Password!');</script>
		<meta http-equiv='refresh' content='0;URL=index.php'>";
	}
?>