<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysql_query("DELETE FROM seguro WHERE idseguro = '$id' ");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT seguro.nombre_seguro, seguro.idseguro FROM seguro");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed ">
        	<tr>
            	<th width="300">Nombre</th>
				<th width="50">Editar</th>
                <th width="50">Eliminar</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nombre_seguro'].'</td>
        <td><a href="javascript:editarProducto('.$registro2['idseguro'].');" class="glyphicon glyphicon-edit"></a></td>
        <td><a href="javascript:eliminarProducto('.$registro2['idseguro'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>