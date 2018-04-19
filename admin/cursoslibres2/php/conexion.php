<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('mydb', $conexion);

function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
}
?>