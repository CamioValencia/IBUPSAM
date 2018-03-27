<?php

header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');

$dato = $_GET["dato"];
$mysqli = new mysqli("localhost", "root", "", "mydb");
$query = $mysqli->query("SELECT usuarios.User
FROM personas, usuarios 
WHERE personas.idPersonas= usuarios.idPersonas AND personas.Cedula= $dato
                        ");
						
						
						

$valores = $query->fetch_assoc();

$query->free();

$response["flag"] = true;
$response["data"] = $valores;

echo json_encode($response);

?>