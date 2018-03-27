<?php

header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');

$dato = $_GET["dato"];
$mysqli = new mysqli("localhost", "root", "", "bienestar");
$query = $mysqli->query("SELECT trabajadores.Cc ,trabajadores.PNom , trabajadores.PApe, usuarios.User
FROM trabajadores LEFT JOIN usuarios ON trabajadores.User= usuarios.User
WHERE trabajadores.Cc= $dato
                        ");
						
						
						

$valores = $query->fetch_assoc();

$query->free();

$response["flag"] = true;
$response["data"] = $valores;

echo json_encode($response);

?>