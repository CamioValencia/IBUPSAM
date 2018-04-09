<?php
include('conexion.php');
 		$idpersona="";
     	$Cedula = $_POST['Cedula'];
        $Nombres = $_POST['Nombres'];
        $FechaNac = $_POST['FechaNac'];
		$Telefono = $_POST['Telefono'];
		$Correo = $_POST['Correo'];
		$proceso= $_POST['pro'];
		$Tipo = $_POST['Tipo'];
        $User = $_POST['User'];
        $Password = $_POST['Password'];
        $Perfil = $_POST['Perfil'];
		
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		mysql_query("INSERT INTO personas(Cedula, Nombres, FechaNac, Telefono, Correo, idTipo)
                            VALUES ('$Cedula','$Nombres', '$FechaNac','$Telefono','$Correo', '$Tipo')");
		$idpersona= mysql_insert_id();

		mysql_query("INSERT INTO usuarios(User, Password, idPersonas, idRol)
                            VALUES ('$User',md5('$Password'), '$idpersona','$Perfil')");
	break;
	
	case 'Edicion':
		mysql_query("UPDATE usuarios SET Password =md5('$password') WHERE User='$User'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT * FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed ">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Perfil</th>
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