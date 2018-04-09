<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM personas WHERE Cedula = '$id' ");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed ">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Tipo</th>
				<th width="50">Editar</th>
                <th width="50">Eliminar</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['User'].'</td>
				<td>'.$registro2['Tiporol'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-edit"></a></td>
				<td><a href="javascript:eliminarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>