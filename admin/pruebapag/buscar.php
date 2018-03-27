<?php
  
      $buscar = $_POST['b'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($b) {
            $con = mysql_connect('localhost','root', '');
            mysql_select_db('nombre-bd', $con);
        
            $sql = mysql_query("SELECT personas.idPersonas, personas.Cedula, personas.Nombres, personas.Sexo, personas.Rh, personas.Codigo, personas.FechaNac, personas.Edad, personas.Direccion, personas.Telefono, personas.Correo, programa.Nombre, semestre.Nombresemestre, tipo.Nombretipo FROM personas LEFT JOIN programa ON personas.idPrograma = programa.idPrograma LEFT JOIN semestre ON personas.idSemestre = semestre.idSemestre LEFT JOIN tipo ON personas.idTipo = tipo.idTipo WHERE personas.cursoslibres='1' AND personas.aceptado='S'AND personas.Nombres LIKE '%".$b."%' LIMIT 10" ,$con);
              
            $contar = @mysql_num_rows($sql);
              
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
              while($row=mysql_fetch_array($sql)){
                $idPersonas = $row['idPersonas'];
                $Nombres = $row['Nombres'];
                $Sexo = $row['Sexo'];
                 $Rh = $row['Rh'];
                $Codigo = $row['Codigo'];
                $FechaNac = $row['FechaNac'];
                 $Edad = $row['Edad'];
                $Direccion = $row['Direccion'];
                $Telefono = $row['Telefono'];
                 $Correo = $row['Correo'];
                $Nombre = $row['Nombres'];
                $Nombresemestre = $row['Nombresemestre'];
                 $Nombretipo = $row['Nombretipo'];
               
                
                
                
            }
        }
  }
        
?>