<?php
	include('conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysql_num_rows(mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh,personas.tiposangre, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo, personas.Imagen, personas.aceptado FROM personas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo WHERE personas.cursoslibres='1' AND personas.aceptado='N'"));
    $nroLotes = 2;
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

  	$registro = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh,personas.tiposangre, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo, personas.Imagen, personas.aceptado FROM personas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo WHERE personas.cursoslibres='1' AND personas.aceptado='N' LIMIT $limit, $nroLotes ");




  	$tabla = $tabla.'<form method="POST" action="../CRUDpersonas.php" > <table class="table  table-condensed ">
			            <tr>
			                <th width="62.5">Cedula</th>
			                <th width="62.5">Nombre</th>
			                <th width="200">Sexo</th>
                      <th nowrap>Tipo de sangre</th>
                      <th width="200">RH</th>
                       <th width="200">Codigo Estudiantil</th>
                       <th width="200">Fecha de nacimiento</th>
                       <th width="200">Edad</th>
                       <th width="200">Direccion</th>
                       <th width="200">Telefono</th>
                       <th width="200">Correo Electronico</th>
                       <th nowrap>Programa Academico</th>
                       <th width="200">Nivel Academico </th>
                       <th width="200">Estamento</th>
                       <th width="200">Carne</th>
                       <th width="200">Aprobar solicitud</th>
			            </tr>';
				
	while($registro2 = mysql_fetch_array($registro)){
		$tabla = $tabla.'<tr>


        <td><input  id="cedula" name="cedula[]" type="hidden" value='.$registro2['Cedula'].'>'.$registro2['Cedula'].'</td>
        <td nowrap>'.$registro2['Nombres'].'</td>
        <td>'.$registro2['Sexo'].'</td>
        <td>'.$registro2['tiposangre'].'</td>
        <td>'.$registro2['Rh'].'</td>
        <td>'.$registro2['Codigo'].'</td>
        <td>'.$registro2['FechaNac'].'</td>
        <td>'.$registro2['Edad'].'</td>
        <td>'.$registro2['Direccion'].'</td>
        <td>'.$registro2['Telefono'].'</td>

        <td><input  id="cedula" name="correo[]" type="hidden" value='.$registro2['Correo'].'>'.$registro2['Correo'].'</td>
        <td>'.$registro2['Nombre'].'</td>
       
        <td>'.$registro2['Nombresemestre'].'</td>
        <td>'.$registro2['Nombretipo'].'</td>
        <td ><a href="../../fotos/'.$registro2['Imagen'].'" target="_blank"><img src="../../fotos/'.$registro2['Imagen'].'"
        width="100px" height="100px"></a></td>


        <td><select name="aceptado[]" id="aceptado" style="background-color:#ff0000;">
                    <option value="N">NO</option>
                    <option value="S">Si</option>
                   
                </select></td>

        
        
        
        <td><input  id="cedula" name="idPersonas[]" type="hidden" value='.$registro2['idPersonas'].'></td>

        
    
 

        
       
        </tr>';	
	}

        

    $tabla = $tabla.'</table><center><button type="submit" class="btn btn-primary btn-large" name="BotonAceptar" value="Aceptar">Enviar</button></center></form>';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>