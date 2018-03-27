<?php
// obtiene los valores para realizar la paginacion
$limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])	: 10;
$offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0	? intval($_POST["offset"])	: 0;
// realiza la conexion
$con = new mysqli("localhost","root","","mydb");
$con->set_charset("utf8");

// array para devolver la informacion
$json = array();
$data = array();
//consulta que deseamos realizar a la db	
$query = $con->prepare("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo FROM personas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo WHERE personas.cursoslibres='1' AND personas.aceptado='S' limit ? offset ?");
$query->bind_param("ii",$limit,$offset);
$query->execute();

// vincular variables a la sentencia preparada 
$query->bind_result($idPersonas, $Cedula,$Nombres,$Sexo, $Rh,$Codigo,$FechaNac, $Edad,$Direccion,$Telefono, $Correo,$Nombre,$Nombresemestre, $Nombretipo);

// obtener valores 
while ($query->fetch()) {
	$data_json = array();
	$data_json["idPersonas"] = $idPersonas;
	$data_json["Cedula"] = $Cedula;
	$data_json["Nombres"] = $Nombres;	
	$data_json["Sexo"] = $Sexo;
	$data_json["Rh"] = $Rh;
	$data_json["Codigo"] = $Codigo;	
	$data_json["FechaNac"] = $FechaNac;
	$data_json["Edad"] = $Edad;
	$data_json["Direccion"] = $Direccion;	
	$data_json["Telefono"] = $Telefono;
	$data_json["Correo"] = $Correo;
	$data_json["Nombre"] = $Nombre;	
	$data_json["Nombresemestre"] = $Nombresemestre;
	$data_json["Nombretipo"] = $Nombretipo;
	
				
	$data[]=$data_json;	
}

// obtiene la cantidad de registros
$cantidad_consulta = $con->query("select count(*) as total from personas WHERE personas.cursoslibres='1' AND personas.aceptado='S'");
$row = $cantidad_consulta->fetch_assoc();
$cantidad['cantidad']=$row['total'];

$json["lista"] = array_values($data);
$json["cantidad"] = array_values($cantidad);

// envia la respuesta en formato json		
header("Content-type:application/json; charset = utf-8");
echo json_encode($json);
exit();
?>