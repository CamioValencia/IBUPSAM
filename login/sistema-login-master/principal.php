<?php session_start();


if (isset($_SESSION['User'] )) {
    
require 'views/principal.view.php';
} else{
    
    header('location:login.php');
}












 ?>