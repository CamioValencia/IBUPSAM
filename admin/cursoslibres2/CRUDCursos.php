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
        return $link;  
    }
    
   
    
    
    if ($_POST){
    
        $idCurso="";
        $Cursolibre = $_POST['Cursolibre'];
        $Docente = $_POST['Docente'];
        $Tipo = $_POST['Tipo'];
        $Horaini = $_POST['Horaini'];
        $Horafin = $_POST['Horafin'];
        $Dia = $_POST['Dia'];

        
        

            $link = Conectarse();
            
            for($i=0;$i<count($Dia);$i++){
            $consulta = "select * from personas, horario where idPersonas ='$Docente' AND Dia = '".$Dia[$i]."'  AND Horaini ='".$Horaini[$i]."' AND Horafin ='".$Horafin[$i]."'";

            }
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) == 0){
               

                mysql_query("INSERT INTO cursos(NombreCurso, idPersonas, Tipo)
                            VALUES ('$Cursolibre','$Docente', '$Tipo')",$link);
                $idCurso= mysql_insert_id();

                

                for($i=0;$i<count($Dia);$i++){
            mysql_query("INSERT INTO horario( Dia,Horaini, Horafin, idCursos)
                VALUES ('".$Dia[$i]."','".$Horaini[$i]."','".$Horafin[$i]."',$idCurso)",$link); 
                
               
                }
                  echo'<script>
                alert("Registro realizado");
                 window.location="./crearcurso.php";
                </script>';

            }else{

                echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="./crear_usuario.php";
                </script>';
            }



            }


      /*  if ($_POST){
        $User = $_POST['User'];
        $Password = $_POST['Password'];
        $Perfil = $_POST['Perfil'];
       
        
            $link = Conectarse();
            $consulta = "select * from usuarios where User = '$User'" ;
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) > 0){
                echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="crear_usuario.php";
                </script>';
            }
            else{
                mysql_query("INSERT INTO usuarios(User, Password, idPersonas, idRol)
                            VALUES ('$User',md5('$Password'), '$idpersona','$Perfil')",$link);
                echo'<script>
                alert("Registro realizado");
                 window.location="crear_usuario.php";
                </script>';
            }
        
    }*/
    
     
    
?>      