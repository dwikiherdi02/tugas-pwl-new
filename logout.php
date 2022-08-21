<?php session_unset($_SESSION['user']);
//session_destroy();
echo "<script>alert('Sign Out Success');
document.location='index.php';</script>";

?>