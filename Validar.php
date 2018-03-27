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

if (isset($_POST['Boton'])){
    $usuario = $_POST['username'];
    $pass = md5($_POST["password"]);  
	$pass2 = $_POST["password"];
    if(empty($usuario) || empty($pass)){
        echo"<script>
        alert('Error, no pueden quedar campos vacios')
        window.history.back();
        </script>";
    }
    else{
        $link = Conectarse(); 
        $result = mysql_query("SELECT * from usuarios where User='" . $usuario . "'", $link);
        $perfil = mysql_query("SELECT * from Personas,usuarios where usuarios.idPersonas=Personas.idPersonas AND usuarios.User='" . $usuario . "'", $link);
        $row2 = mysql_fetch_array($perfil);
        $Act =  $row2['Cedula'];
        $Id = $row2['idPersonas'];
        $area = mysql_query("SELECT * from cursos where cursos.idPersonas= '" . $Act . "'", $link);
        $row3 = mysql_fetch_array($area);
        if($row = mysql_fetch_array($result)){
            if($row['Password'] == $pass){
                session_start();
                $_SESSION['usuarios'] = $usuario;
                $_SESSION['logueado'] = true;
                $_SESSION['nombre'] = $row2['Nombres'];
                $_SESSION['privilegio'] = $row['idRol'];
                $_SESSION['actividad'] = $row3['NombreCurso'];
                $_SESSION['cedula'] = $Act;
                $_SESSION['idPersonas'] = $Id;
                if($row['idRol'] == "1"){
                     echo'<script>
                     alert("Bienvenido/a al sistema ';
                     echo $row2['Nombres'];
                     echo '");
                     window.location="./admin/usuarios.php";
                     </script>';
                }
                else if($row['idRol'] == "3"){
                    echo'<script>
                     alert("Bienvenido/a al sistema ';
                     echo $row2['Nombres'];
                     echo '");
                     window.location="./admin/usuarios.php";
                     </script>';
                }
                else if($row['idRol']  == "2"){
                    echo'<script>
                     alert("Bienvenido/a al sistema ';
                     echo $row2['Nombres'];
                     echo '");
                     window.location="./docente/estudiantes.php";
                     </script>';
                }
                exit;
            }
            else{
               echo"<script>
                     alert('Contrasenia invalida!');
                      window.history.back();
                     </script>";
            }
        }
        else{
            $result = mysql_query("SELECT * FROM personas WHERE Correo='" . $usuario . "' AND aceptado='S'", $link);
            if($row = mysql_fetch_array($result)){
                if($row['Cedula'] == $pass2){
                    session_start();
                    $_SESSION['Correo'] = $usuario;
                    $_SESSION['logueado'] = true;
                    $_SESSION['nombre'] = $row['Nombres'];
                    $_SESSION['privilegio'] = "Persona";
                    $_SESSION['cedula'] = $row['Cedula'];
                    $_SESSION['idPersonas'] = $row['idPersonas'];

                    echo'<script>
                        alert("Bienvenido/a al sistema ';
                    echo $row2['Nombres'];
                    echo '");
                        window.location="./actividades.php";
                        </script>';
                }
                else{
                   echo"<script>
                         alert('Contrasenia invalida!');
                          window.history.back();
                         </script>";
                }
            }
            else{
                echo"<script>alert('Usuario invalido');window.history.back();</script>";
            }
        } 
    }
}
?>