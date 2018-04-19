<?php
include('conexion.php');

$dato = $_POST['dato'];

if ($dato!=null ) {

$registro = mysql_query("SELECT usuarios.User, rol.Tiporol, personas.Cedula FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol AND usuarios.User LIKE '%$dato%'");

}else{
$registro = mysql_query("SELECT usuarios.User, rol.Tiporol, personas.Cedula FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol");

}

//EJECUTAMOS LA CONSULTA DE BUSQUED

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table  table-condensed ">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
                <th width="50">Editar</th>
                <th width="50">Eliminar</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['User'].'</td>
				<td>'.$registro2['Tiporol'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-edit"></a></td>
				<td><a href="javascript:eliminarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>