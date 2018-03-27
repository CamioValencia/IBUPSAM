<?php session_start();

if (isset($_SESSION['User'])) {
	header('location:principal.php');
} else {
	header('location:login.php');
}





 ?>