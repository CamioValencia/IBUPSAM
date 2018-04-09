<?php

header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');

$dato = $_GET["dato"];
$mysqli = new mysqli("localhost", "root", "", "mydb");
$query = $mysqli->query("SELECT cursos.NombreCurso, personas.idPersonas
FROM personas, personas_has_cursos,cursos 
WHERE personas.idPersonas= personas_has_cursos.idPersonas AND personas_has_cursos.idCursos=cursos.idCursos AND personas_has_cursos.idPersonas= $dato
                        ");
						
						
						

$valores = $query->fetch_assoc();

$query->free();

$response["flag"] = true;
$response["data"] = $valores;

echo json_encode($response);

?>