<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

if ($dato!=0 || $dato!=null ) {

$registro = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S' AND personas.Cedula LIKE '%$dato%' ORDER BY idPersonas ASC");

}else{
$registro = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S' ORDER BY idPersonas ASC");

}

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="150">Precio Unitario</th>
                <th width="150">Precio Distribuidor</th>
                <th width="150">Fecha Registro</th>
                
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['idPersonas'].'</td>
				<td>'.$registro2['Cedula'].'</td>
				<td>S/. '.$registro2['Nombres'].'</td>
				<td>S/. '.$registro2['NombreCurso'].'</td>
				<td>'.fechaNormal($registro2['Fecha']).'</td>
				
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>