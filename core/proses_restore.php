<?php // Proses Restore dilakukan Oleh Fungsi
function restore($file) {
	global $rest_dir;
	include 'config/config.php';
	
	$nama_file	= $file['name'];
	$ukrn_file	= $file['size'];
	$tmp_file	= $file['tmp_name'];
	
	if ($nama_file == "")
	{
		echo "Fatal Error";
	}
	else
	{
		$alamatfile	= $rest_dir.$nama_file;
		$templine	= array();
		
		if (move_uploaded_file($tmp_file , $alamatfile))
		{
			
			$templine	= '';
			$lines		= file($alamatfile);

			foreach ($lines as $line)
			{
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				$templine .= $line;

				if (substr(trim($line), -1, 1) == ';'){
					mysqli_query($conn, $templine); 
					$templine = '';
				}
			}
			echo "<center>Berhasil Restore Database, silahkan di cek.</center>";
		
		}else{
			echo "Proses upload gagal, kode error = " . $file['error'];
		}	
	}
	
}
?>