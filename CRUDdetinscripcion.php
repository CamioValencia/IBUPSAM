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
    
    session_start();
    if(isset($_SESSION['logueado']) and $_SESSION['logueado']){
        if(isset($_SESSION['nombre']))
            $nombre = $_SESSION['nombre'];
        else
            $nombre = "";
        if(isset($_SESSION['privilegio']))
            $privilegio = $_SESSION['privilegio'];
        else
            $privilegio = "";
        if(isset($_SESSION['usuario']))
            $usuario = $_SESSION['usuario'];
        else
            $usuario = "";
        if(isset($_SESSION['idCursos']))
            $idCursos = $_SESSION['idCursos'];
        else
            $idCursos = "";
        if(isset($_SESSION['idPersonas']))
            $idPersonas = $_SESSION['idPersonas'];
        else
            $idPersonas = "";
        if(isset($_SESSION['idinscripcion']))
            $idinscripcion = $_SESSION['idinscripcion'];
        else
            $idinscripcion = "";
    }
    else{
        //Si el usuario no está logueado redireccionamos al login.
        header('Location: login.html');
        exit;
    }
    if (isset($_POST['Boton1'])){
        $idCursos = $_POST['idCursos'];
        if(empty($idCursos)){
            echo'<script type="text/javascript">
                alert("Ningun campo debe quedar vacio");
                 window.location="actividades.php";
                </script>';
        }
        else{
            $link = Conectarse();
            $consulta = "select * from personas_has_cursos where idPersonas = '".$idPersonas ."' AND idCursos='$idCursos'" ;
            $resultado = mysql_query($consulta) or die (mysql_error());
            if (mysql_num_rows($resultado) > 0){
                
                echo'<script type="text/javascript">
                alert("La personas ya se registro esa actividad, intentelo nuevamente");
                 window.location="actividades.php";
                </script>';
            }
            else{
                mysql_query("INSERT INTO personas_has_cursos (Fecha, idPersonas, idCursos)
                            VALUES ('".date('Y-m-d')."','$idPersonas','$idCursos')",$link);
           echo'<script type="text/javascript">
                alert("Registrado correctamente");
                 window.location="actividades.php";
                </script>';
            }
        }
    }
    elseif (isset($_POST['Boton3'])){
        $idinscripcion = $_POST['idinscripcion'];
        
            $link = Conectarse();

            mysql_query("DELETE FROM personas_has_cursos  WHERE idinscripcion='$idinscripcion'",$link);
            
            echo'<script type="text/javascript">
                alert("Eliminado correctamente");
                 window.location="actividades.php";
                </script>';
        
    }
    
?>    	