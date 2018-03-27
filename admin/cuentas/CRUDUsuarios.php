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
    
        $idpersona="";
        $Cedula = $_POST['Cedula'];
        $Nombres = $_POST['Nombres'];
        $FechaNac = $_POST['FechaNac'];
		$Telefono = $_POST['Telefono'];
		$Correo = $_POST['Correo'];
        $Tipo = $_POST['Tipo'];
        $User = $_POST['User'];
        $Password = $_POST['Password'];
        $Perfil = $_POST['Perfil'];
		

            $link = Conectarse();
            $consulta = "select * from personas, usuarios where Cedula ='$Cedula' OR User ='$User'";
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) == 0){
               

                mysql_query("INSERT INTO personas(Cedula, Nombres, FechaNac, Telefono, Correo, idTipo)
                            VALUES ('$Cedula','$Nombres', '$FechaNac','$Telefono','$Correo', '$Tipo')",$link);
                $idpersona= mysql_insert_id();

                mysql_query("INSERT INTO usuarios(User, Password, idPersonas, idRol)
                            VALUES ('$User',md5('$Password'), '$idpersona','$Perfil')",$link);
                  echo'<script>
                alert("Registro realizado");
                 window.location="crear_usuario.php";
                </script>';

            }else{

                echo'<script>
                alert("Ya esta registrado en la base de datos");
                 window.location="crear_usuario.php";
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