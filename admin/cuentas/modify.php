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
    
    
    $User = $_POST['User'];    
    $password = $_POST['password'];
    
   
        $link = Conectarse();
    


        $sql=mysql_query("UPDATE usuarios SET Password =md5('$password') WHERE User='$User'",$link);
        
        echo'<script>
        alert("Actualización correctamente ';
        
        echo '");
        window.location="cuentas.php";
        </script>';
    
}else{
    echo "Los datos enviados estan vacios";
}
?>
