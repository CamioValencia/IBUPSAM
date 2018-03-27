<?php

header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');

$dato = $_GET["dato"];
$mysqli = new mysqli("localhost", "root", "", "mydb");
$query = $mysqli->query("SELECT seguro.nombre_seguro, seguro.idseguro
FROM seguro
WHERE  seguro.idseguro= $dato");
						
						
						

$valores = $query->fetch_assoc();

$query->free();

$response["flag"] = true;
$response["data"] = $valores;

echo json_encode($response);

?>