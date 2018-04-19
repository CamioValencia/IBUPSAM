<?php
include('conexion.php');
 		$idCurso="";
        $Cursolibre = $_POST['Cursolibre'];
        $Docente = $_POST['Docente'];
        $Tipo = $_POST['Tipo'];
        $Horaini = $_POST['Horaini'];
        $Horafin = $_POST['Horafin'];
        $Dia = $_POST['Dia'];
        $proceso= $_POST['pro'];
		
//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':
		

		mysql_query("INSERT INTO cursos(NombreCurso, idPersonas, Tipo)
                            VALUES ('$Cursolibre','$Docente', '$Tipo')");
		$idCurso= mysql_insert_id();

		for($i=0;$i<count($Dia);$i++){
		mysql_query("INSERT INTO horario( Dia,Horaini, Horafin, idCursos)
                VALUES ('".$Dia[$i]."','".$Horaini[$i]."','".$Horafin[$i]."',$idCurso)");}
	break;
	
	case 'Edicion':
		mysql_query("UPDATE usuarios SET Password =md5('$password') WHERE User='$User'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysql_query("SELECT cursos.NombreCurso, personas.Nombres, personas.Cedula FROM personas,cursos,horario where personas.idPersonas= cursos.idPersonas and cursos.idCursos= horario.idCursos GROUP BY cursos.idCursos");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<form method="POST" action="../horarios.php" ><table class="table table-striped table-condensed ">
        	<tr>
            	<th width="300">Nombre</th>
                <th width="200">Perfil</th>
                <th width="50">Editar</th>
                <th width="50">Eliminar</th>
                
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['NombreCurso'].'</td>
				<td>'.$registro2['Nombres'].'</td>
				<td><a href="javascript:editarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-edit"></a></td>
				<td><a href="javascript:eliminarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-remove-circle"></a></td>
				</tr>';
	}
echo '</table>';
?>