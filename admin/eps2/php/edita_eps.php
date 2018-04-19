<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT seguro.idseguro, seguro.nombre_seguro from seguro where seguro.idseguro='$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(

				0 => $valores2['idseguro'], 
				1 => $valores2['nombre_seguro'], 

				
				
				
				);
echo json_encode($datos);
?>