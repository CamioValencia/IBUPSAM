<?php
include('conexion.php');

$dato = $_POST['dato'];

if ($dato!=null ) {

$registro = mysql_query("SELECT seguro.nombre_seguro, seguro.idseguro FROM seguro Where seguro.nombre_seguro LIKE '%$dato%'");

}else{
$registro = mysql_query("SELECT seguro.nombre_seguro, seguro.idseguro FROM seguro");

}

//EJECUTAMOS LA CONSULTA DE BUSQUED

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table  table-condensed ">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="50">Editar</th>
                <th width="50">Eliminar</th>
            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nombre_seguro'].'</td>
        <td><a href="javascript:editarProducto('.$registro2['idseguro'].');" class="glyphicon glyphicon-edit"></a></td>
        <td><a href="javascript:eliminarProducto('.$registro2['idseguro'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>