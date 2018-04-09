<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT personas.Nombres,familiares.Parentesco,familiares.idFamiliar FROM familiares,personas WHERE familiares.idPersonas=personas.idPersonas AND personas.idPersonas='$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(

				0 => $valores2['Nombres'], 
				1 => $valores2['Parentesco'], 
				2 => $valores2['idFamiliar'], 
				
				
				
				);
echo json_encode($datos);
?>