<?php
	
	$mysqli=new mysqli("localhost","root","","mydb"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$acentos = $mysqli->query("SET NAMES 'utf8'");

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	

?>