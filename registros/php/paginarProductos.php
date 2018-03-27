<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S'"));
    $nroLotes = 4;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, cursos.NombreCurso, personas_has_cursos.Fecha FROM personas LEFT JOIN personas_has_cursos ON personas_has_cursos.idPersonas=personas.idPersonas LEFT JOIN cursos ON cursos.idCursos= personas_has_cursos.idCursos WHERE personas.cursoslibres='1' AND personas.aceptado='S' LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="300">Nombre</th>
			                <th width="200">Tipo</th>
			                <th width="150">Precio Unitario</th>
			                <th width="150">Precio Distribuidor</th>
			                <th width="150">Fecha Registro</th>
			                <th width="50">Opciones</th>
			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td>'.$registro2['idPersonas'].'</td>
							<td>'.$registro2['Cedula'].'</td>
							<td>S/. '.$registro2['Nombres'].'</td>
							<td>S/. '.$registro2['NombreCurso'].'</td>
							<td>'.fechaNormal($registro2['Fecha']).'</td>
							<td><a href="javascript:editarProducto('.$registro2['idPersonas'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['idPersonas'].');" class="glyphicon glyphicon-remove-circle"></a></td>
						  </tr>';		
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>