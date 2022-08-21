<?php
	$conn = new mysqli("localhost","root","","db_arsip");
	if ($conn-> connect_errno) {
		echo "Failed to connectto MYSQL :
		(" .$conn->connect_errno. ") " . $conn->connect_error;
	}
?>