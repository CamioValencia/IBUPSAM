<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('mydb', $conexion);
mysql_query("SET NAMES 'utf8'");

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>