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





if (isset($_POST['Guardar'])){
    
    
        $idCurso="";
        $NombreCurso = $_POST['NombreCurso'];
        $Docente = $_POST['Docente'];
        $Horaini = $_POST['Horaini'];
        $Horafin = $_POST['Horafin'];
        $Dia = $_POST['Dia'];
    
   
        $link = Conectarse();
    


        $sql=mysql_query("UPDATE cursos SET idpersonas ='$Docente' WHERE NombreCurso='$NombreCurso'",$link);
        
        echo'<script>
        alert("Actualización correctamente ';
        
        echo '");
        window.location="cuentas.php";
        </script>';
    
}else{
    echo "Los datos enviados estan vacios";
}
?>
