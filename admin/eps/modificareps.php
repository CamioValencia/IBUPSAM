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
    
    
        $idseguro= $_POST['idseguro'];
        $nombre_seguro = $_POST['nombre_seguro'];
        $nuevonombre = $_POST['nuevonombre'];
    
   
        $link = Conectarse();
    


        $sql=mysql_query("UPDATE seguro SET nombre_seguro ='$nuevonombre' WHERE idseguro='$idseguro'",$link);
        
        echo'<script>
        alert("Actualización correctamente ';
        
        echo '");
        window.location="vereps.php";
        </script>';
    
}else{
    echo "Los datos enviados estan vacios";
}
?>
