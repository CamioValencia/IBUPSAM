<?php

header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');

$dato = $_GET["dato"];
$mysqli = new mysqli("localhost", "root", "", "mydb");
$query = $mysqli->query("SELECT cursos.NombreCurso 
FROM cursos, personas
WHERE personas.idPersonas= cursos.idPersonas AND cursos.idCursos= $dato");
						
						
						

$valores = $query->fetch_assoc();

$query->free();

$response["flag"] = true;
$response["data"] = $valores;

echo json_encode($response);

?>