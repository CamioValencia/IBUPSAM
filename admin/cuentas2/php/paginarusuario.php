<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT * FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol"));
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

  	$registro = mysql_query("SELECT * FROM personas,usuarios,rol where personas.idPersonas= usuarios.idPersonas and usuarios.idRol= rol.idRol LIMIT $limit, $nroLotes ");


  	$tabla = $tabla.'<table class="table  table-condensed ">
			            <tr>
			                <th width="300">Nombre</th>
			                <th width="200">Tipo</th>
			                <th width="50">Editar</th>
                       <th width="50">Eliminar</th>
			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<tr>
        <td>'.$registro2['User'].'</td>
        <td>'.$registro2['Tiporol'].'</td>
        <td><a href="javascript:editarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-edit"></a></td>
        <td><a href="javascript:eliminarProducto('.$registro2['Cedula'].');" class="glyphicon glyphicon-remove-circle"></a></td>
        </tr>';	
	}
        

    $tabla = $tabla.'</table>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>