<?php
include('conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysql_query("SELECT usuarios.User, personas.Cedula, personas.Nombres, personas.FechaNac, personas.Telefono, personas.Correo, rol.idRol
FROM personas, usuarios, rol
WHERE personas.idPersonas= usuarios.idPersonas AND usuarios.idRol=rol.idRol AND personas.Cedula='$id'");
$valores2 = mysql_fetch_array($valores);

$datos = array(

				0 => $valores2['Cedula'], 
				1 => $valores2['Nombres'], 
				2 => $valores2['FechaNac'], 
				3 => $valores2['Telefono'],
				4 => $valores2['Correo'],
				5 => $valores2['User'],
				6 => $valores2['idRol'],
				
				
				);
echo json_encode($datos);
?>