<?php

function Conectarse()  {
    if (!( $link = mysql_connect("localhost","root","")))  {
        echo"<script>
        alert('Error al conectarse al servidor');
        </script>";
        }  
   if (!mysql_select_db("mydb",$link))  {
        echo"<script>
        alert('Error al conectarse a la base de datos');
        </script>";
      } 
      mysql_query("SET NAMES 'UTF8'"); 
   return $link;  
}



if (isset($_POST['Boton'])){

    $cargo_id=$_POST['idTipo'];
    if($cargo_id=='4'){ 
    
    $idfamiliar="";
    $idpersona="";

    $Fecha = date("Y-m-d");
    $Cedula = $_POST['Cedula'];
    $Nombres = $_POST['Nombres'];
    $Edad = $_POST['FechaNac'];
    $Genero = $_POST['Genero'];
    $Rh1 = $_POST['Rh1'];
    $Rh = $_POST['Rh'];
    $Codigo = $_POST['Codigo'];
    $FechaNac = $_POST['FechaNac'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $idPrograma = $_POST['idPrograma'];
    $idSemestre = $_POST['idSemestre'];
    $idTipo = $_POST['idTipo'];
    $curso = $_POST['curso'];
    $nom_familiares = $_POST['nom_familiares'];
    $tel_familiares = $_POST['tel_familiares'];
    $par_familiares = $_POST['par_familiares'];
    $edad = strtotime ($Fecha) - strtotime ($Edad);
    $diferencia_anios = intval($edad/60/60/24/365.25);
    $aceptado= $_POST['aceptado'];
    $idCursos= $_POST['idCursos'];
    $eps = $_POST['eps'];


        $link = Conectarse();
            $consulta = "select * from personas where Correo ='$Correo' OR Cedula ='$Cedula' OR Codigo ='$Codigo'";
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) == 0){
             
    
    
    if(empty($Nombres) || empty($Cedula)  || empty($Edad) || empty($Genero) || empty($Rh) || empty($Direccion) || empty($idTipo) || empty($Telefono) ){
        echo'<script>
        alert("Error, verifique los campos obligatorios y que al menos tenga una referencia familiar. ';
        //echo 'Nombres: '.$Nombres.', \nCedula: '. $Cedula.', \nEdad: '.$Edad.', \nGenero: '.$Genero.', \nRh: '.$Rh.', \nDireccion: '.$Direccion.', \nidTipo: '.$idTipo.', \nTelefono: '.$Telefono;
        echo '");
        window.history.back();
        </script>';
    }
    else{
        $link = Conectarse();
        $target_path = "fotos/";
        if(isset($_FILES["Imagen"])){
            $Imagen = $_FILES['Imagen']['name'];
            $target_path = $target_path.basename($_FILES['Imagen']['name']);
            move_uploaded_file($_FILES['Imagen']['tmp_name'], $target_path);
        }
        else $Imagen = "";



        mysql_query("INSERT INTO personas(Cedula, Nombres, Sexo, tiposangre, Rh, Codigo, FechaNac, Edad, Direccion, Telefono, Correo, idPrograma, idSemestre, idTipo, Imagen, aceptado, cursoslibres, seguro_id)
                VALUES ('$Cedula','$Nombres', '$Genero', '$Rh1', '$Rh', '$Codigo', '$FechaNac', '$diferencia_anios', '$Direccion', '$Telefono', '$Correo', '$idPrograma', '$idSemestre', '$idTipo', '$Imagen', '$aceptado', '$curso', '$eps')",$link);

        $idpersona= mysql_insert_id();
        
        
        for($i=0;$i<count($nom_familiares);$i++){
            mysql_query("INSERT INTO personas(Nombres,Telefono)
                VALUES ('".$nom_familiares[$i]."','".$tel_familiares[$i]."')",$link); 
        $idfamiliar= mysql_insert_id();
        
            mysql_query("INSERT INTO familiares(idPersonas,idFamiliar,Parentesco)
                VALUES ('$idpersona','$idfamiliar','".$par_familiares[$i]."')",$link); 
        //var_dump('par_familiares',".$par_familiares[$i].");
       
                
                }  

                /*var_dump('Fecha',$Fecha);
            var_dump('idCursos',$idCursos);
            var_dump('idpersona',$idpersona);*/
        for($i=0;$i<count($idCursos);$i++){
            mysql_query("INSERT INTO personas_has_cursos(Fecha,idPersonas,idCursos)
                VALUES ('$Fecha','$idpersona','".$idCursos[$i]."')",$link); 
                
               
                }
        


        }
        echo'<script>
        alert("Inscripcion realizada correctamente senior(a) ';
        echo $Nombres;
        echo '");
       window.location="formularioinscripcion.php";
   
        </script>';

        }else {

          echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="formularioinscripcion.php";
                </script>';
              }


    }elseif ($cargo_id=='5') { 

    $idfamiliar="";
    $idpersona="";
    $Fecha = date("Y-m-d");
    $Cedula = $_POST['Cedula'];
    $Nombres = $_POST['Nombres'];
    $Edad = $_POST['FechaNac'];
    $Genero = $_POST['Genero'];
    $Rh = $_POST['Rh'];
    $FechaNac = $_POST['FechaNac'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $idTipo = $_POST['idTipo'];
    $nom_familiares = $_POST['nom_familiares'];
    $tel_familiares = $_POST['tel_familiares'];
    $edad = strtotime ($Fecha) - strtotime ($Edad);
    $diferencia_anios = intval($edad/60/60/24/365.25);
    $curso = $_POST['curso'];
    $aceptado = $_POST['aceptado'];
    $idCursos= $_POST['idCursos'];
    $eps= $_POST['eps'];

    $link = Conectarse();
            $consulta = "select * from personas where Correo ='$Correo' OR Cedula ='$Cedula'";
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) == 0){

    if(empty($Nombres) || empty($Cedula)  || empty($Edad) || empty($Genero) || empty($Rh) || empty($Direccion) || empty($idTipo) || empty($Telefono) ){
        echo'<script>
        alert("Error, verifique los campos obligatorios y que al menos tenga una referencia familiar. ';
        //echo 'Nombres: '.$Nombres.', \nCedula: '. $Cedula.', \nEdad: '.$Edad.', \nGenero: '.$Genero.', \nRh: '.$Rh.', \nDireccion: '.$Direccion.', \nidTipo: '.$idTipo.', \nTelefono: '.$Telefono;
        echo '");
        window.history.back();
        </script>';
    }
    else{
        $link = Conectarse();
        $target_path = "fotos/";
        if(isset($_FILES["Imagen"])){
            $Imagen = $_FILES['Imagen']['name'];
            $target_path = $target_path.basename($_FILES['Imagen']['name']);
            move_uploaded_file($_FILES['Imagen']['tmp_name'], $target_path);
        }
        else $Imagen = "1713811_09879.jpg";

        mysql_query("INSERT INTO personas(Cedula, Nombres, Sexo, Rh, FechaNac, Edad, Direccion, Telefono, Correo, idTipo, Imagen, aceptado, cursoslibres, seguro_id)
                VALUES ('$Cedula','$Nombres', '$Genero', '$Rh', '$FechaNac', '$diferencia_anios', '$Direccion', '$Telefono', '$Correo', '$idTipo', '$Imagen', '$aceptado', '$curso', '$eps')",$link);

        $idpersona= mysql_insert_id();


        for($i=0;$i<count($nom_familiares);$i++){
            mysql_query("INSERT INTO personas(Nombres,Telefono)
                VALUES ('".$nom_familiares[$i]."','".$tel_familiares[$i]."')",$link);
            $idfamiliar= mysql_insert_id();
        
            }

        for($i=0;$i<count($idCursos);$i++){
            mysql_query("INSERT INTO personas_has_cursos(Fecha,idPersonas,idCursos)
                VALUES ('$Fecha','$idpersona','".$idCursos[$i]."')",$link); 
                
               
                }
    
        }
        echo'<script>
        alert("Inscripcion realizada correctamente senior(a) ';
        echo $Nombres;
        echo '");
         window.location="formularioinscripcion.php";
        </script>';
        }else {

          echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="formularioinscripcion.php";
                </script>';
              }

    }elseif ($cargo_id=='3') {
    $idfamiliar="";
    $idpersona="";

    $Fecha = date("Y-m-d");
    $Cedula = $_POST['Cedula'];
    $Nombres = $_POST['Nombres'];
    $Edad = $_POST['FechaNac'];
    $Genero = $_POST['Genero'];
    $Rh1 = $_POST['Rh1'];
    $Rh = $_POST['Rh'];
    $FechaNac = $_POST['FechaNac'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $idPrograma = $_POST['idPrograma'];
    $idTipo = $_POST['idTipo'];
    $curso = $_POST['curso'];
    $nom_familiares = $_POST['nom_familiares'];
    $tel_familiares = $_POST['tel_familiares'];
    $par_familiares = $_POST['par_familiares'];
    $edad = strtotime ($Fecha) - strtotime ($Edad);
    $diferencia_anios = intval($edad/60/60/24/365.25);
    $aceptado= $_POST['aceptado'];
    $idCursos= $_POST['idCursos'];
    $eps = $_POST['eps'];


        $link = Conectarse();
            $consulta = "select * from personas where Correo ='$Correo' OR Cedula ='$Cedula'";
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) == 0){
             
    
    
    if(empty($Nombres) || empty($Cedula)  || empty($Edad) || empty($Genero) || empty($Rh) || empty($Direccion) || empty($idTipo) || empty($Telefono) ){
        echo'<script>
        alert("Error, verifique los campos obligatorios y que al menos tenga una referencia familiar. ';
        //echo 'Nombres: '.$Nombres.', \nCedula: '. $Cedula.', \nEdad: '.$Edad.', \nGenero: '.$Genero.', \nRh: '.$Rh.', \nDireccion: '.$Direccion.', \nidTipo: '.$idTipo.', \nTelefono: '.$Telefono;
        echo '");
        window.history.back();
        </script>';
    }
    else{
        $link = Conectarse();
        $target_path = "fotos/";
        if(isset($_FILES["Imagen"])){
            $Imagen = $_FILES['Imagen']['name'];
            $target_path = $target_path.basename($_FILES['Imagen']['name']);
            move_uploaded_file($_FILES['Imagen']['tmp_name'], $target_path);
        }
        else $Imagen = "";



        mysql_query("INSERT INTO personas(Cedula, Nombres, Sexo, tiposangre, Rh, Codigo, FechaNac, Edad, Direccion, Telefono, Correo, idPrograma, idTipo, Imagen, aceptado, cursoslibres, seguro_id)
                VALUES ('$Cedula','$Nombres', '$Genero', '$Rh1', '$Rh', '$Codigo', '$FechaNac', '$diferencia_anios', '$Direccion', '$Telefono', '$Correo', '$idPrograma', '$idTipo', '$Imagen', '$aceptado', '$curso', '$eps')",$link);

        $idpersona= mysql_insert_id();
        
        
        for($i=0;$i<count($nom_familiares);$i++){
            mysql_query("INSERT INTO personas(Nombres,Telefono)
                VALUES ('".$nom_familiares[$i]."','".$tel_familiares[$i]."')",$link); 
        $idfamiliar= mysql_insert_id();
        
            mysql_query("INSERT INTO familiares(idPersonas,idFamiliar,Parentesco)
                VALUES ('$idpersona','$idfamiliar','".$par_familiares[$i]."')",$link); 
        //var_dump('par_familiares',".$par_familiares[$i].");
       
                
                }  

                /*var_dump('Fecha',$Fecha);
            var_dump('idCursos',$idCursos);
            var_dump('idpersona',$idpersona);*/
        for($i=0;$i<count($idCursos);$i++){
            mysql_query("INSERT INTO personas_has_cursos(Fecha,idPersonas,idCursos)
                VALUES ('$Fecha','$idpersona','".$idCursos[$i]."')",$link); 
                
               
                }
        


        }
        echo'<script>
        alert("Inscripcion realizada correctamente senior(a) ';
        echo $Nombres;
        echo '");
       window.location="formularioinscripcion.php";
   
        </script>';

        }else {

          echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="formularioinscripcion.php";
                </script>';
              }
        
    }

    else{

    $idfamiliar="";
    $idpersona="";

    $Fecha = date("Y-m-d");
    $Cedula = $_POST['Cedula'];
    $Nombres = $_POST['Nombres'];
    $Edad = $_POST['FechaNac'];
    $Genero = $_POST['Genero'];
    $Rh1 = $_POST['Rh1'];
    $Rh = $_POST['Rh'];
    $FechaNac = $_POST['FechaNac'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $idTipo = $_POST['idTipo'];
    $curso = $_POST['curso'];
    $nom_familiares = $_POST['nom_familiares'];
    $tel_familiares = $_POST['tel_familiares'];
    $par_familiares = $_POST['par_familiares'];
    $edad = strtotime ($Fecha) - strtotime ($Edad);
    $diferencia_anios = intval($edad/60/60/24/365.25);
    $aceptado= $_POST['aceptado'];
    $idCursos= $_POST['idCursos'];
    $eps= $_POST['eps'];


        $link = Conectarse();
            $consulta = "select * from personas where Correo ='$Correo' OR Cedula ='$Cedula'";
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) == 0){
             
    
    
    if(empty($Nombres) || empty($Cedula)  || empty($Edad) || empty($Genero) || empty($Rh) || empty($Direccion) || empty($idTipo) || empty($Telefono) ){
        echo'<script>
        alert("Error, verifique los campos obligatorios y que al menos tenga una referencia familiar. ';
        //echo 'Nombres: '.$Nombres.', \nCedula: '. $Cedula.', \nEdad: '.$Edad.', \nGenero: '.$Genero.', \nRh: '.$Rh.', \nDireccion: '.$Direccion.', \nidTipo: '.$idTipo.', \nTelefono: '.$Telefono;
        echo '");
        window.history.back();
        </script>';
    }
    else{
        $link = Conectarse();
        $target_path = "fotos/";
        if(isset($_FILES["Imagen"])){
            $Imagen = $_FILES['Imagen']['name'];
            $target_path = $target_path.basename($_FILES['Imagen']['name']);
            move_uploaded_file($_FILES['Imagen']['tmp_name'], $target_path);
        }
        else $Imagen = "";



        mysql_query("INSERT INTO personas(Cedula, Nombres, Sexo, tiposangre, Rh, FechaNac, Edad, Direccion, Telefono, Correo, idTipo, Imagen, aceptado, cursoslibres, seguro_id)
                VALUES ('$Cedula','$Nombres', '$Genero', '$Rh1', '$Rh', '$FechaNac', '$diferencia_anios', '$Direccion', '$Telefono', '$Correo', '$idTipo', '$Imagen', '$aceptado', '$curso', '$eps')",$link);

        $idpersona= mysql_insert_id();
        
        
        for($i=0;$i<count($nom_familiares);$i++){
            mysql_query("INSERT INTO personas(Nombres,Telefono)
                VALUES ('".$nom_familiares[$i]."','".$tel_familiares[$i]."')",$link); 
        $idfamiliar= mysql_insert_id();
        
            mysql_query("INSERT INTO familiares(idPersonas,idFamiliar,Parentesco)
                VALUES ('$idpersona','$idfamiliar','".$par_familiares[$i]."')",$link); 
        //var_dump('par_familiares',".$par_familiares[$i].");
       
                
                }  

                /*var_dump('Fecha',$Fecha);
            var_dump('idCursos',$idCursos);
            var_dump('idpersona',$idpersona);*/
        for($i=0;$i<count($idCursos);$i++){
            mysql_query("INSERT INTO personas_has_cursos(Fecha,idPersonas,idCursos)
                VALUES ('$Fecha','$idpersona','".$idCursos[$i]."')",$link); 
                
               
                }
        


        }
        echo'<script>
        alert("Inscripcion realizada correctamente senior(a) ';
        echo $Nombres;
        echo '");
       window.location="formularioinscripcion.php";
   
        </script>';

        }else {

          echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="formularioinscripcion.php";
                </script>';
              }


    }


    }
        


?>
