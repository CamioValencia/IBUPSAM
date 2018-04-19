<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT cursos.NombreCurso, personas.Nombres, personas.Cedula FROM personas,cursos,horario where personas.idPersonas= cursos.idPersonas and cursos.idCursos= horario.idCursos GROUP BY cursos.idCursos"));
    $nroLotes = 6;
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

  	$registro = mysql_query("SELECT cursos.NombreCurso, personas.Nombres, personas.Cedula, cursos.idCursos FROM personas,cursos,horario where personas.idPersonas= cursos.idPersonas and cursos.idCursos= horario.idCursos GROUP BY cursos.idCursos LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table  table-condensed ">
			            <tr>
			                <th width="300">Nombre</th>
			                <th width="200">Tipo</th>
			                <th width="50">Editar</th>
                       <th width="50">Horarios</th>
			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.' <tr>
        <td>'.$registro2['NombreCurso'].'</td>
        <td>'.$registro2['Nombres'].'</td>
        <td><a href="javascript:editarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-edit"></a></td>
        <td><button href="javascript:horario('.$registro2['idCursos'].');">Ver horarios</button></td>
        
        </tr>';	
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>