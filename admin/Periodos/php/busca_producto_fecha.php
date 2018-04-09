<?php
include('conexion.php');

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN
if ($desde!=0 && $hasta!=0) {

if(isset($desde)==false){
	$desde = $hasta;
}

if(isset($hasta)==false){
	$hasta = $desde;
}
$registro = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S' AND personas_has_cursos.Fecha BETWEEN '$desde' AND '$hasta' ORDER BY idPersonas ASC");

}else{
$registro = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S' ORDER BY idPersonas ASC");

}
//EJECUTAMOS LA CONSULTA DE BUSQUEDA


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table  table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
                <th width="150">Fecha Registro</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['idPersonas'].'</td>
				<td>'.$registro2['Cedula'].'</td>
				<td>S/. '.$registro2['Nombres'].'</td>
				<td>S/. '.$registro2['NombreCurso'].'</td>
				<td>'.fechaNormal($registro2['Fecha']).'</td>
				<td><a href="javascript:editarProducto('.$registro2['idPersonas'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['idPersonas'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>