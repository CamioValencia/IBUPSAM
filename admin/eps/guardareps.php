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
        $eps = $_POST['eps'];
        

        
               
$link = Conectarse();
                mysql_query("INSERT INTO seguro(nombre_seguro)
                            VALUES ('$eps')",$link);
                  

                
               
                
                  echo'<script>
                alert("Registro realizado");
                window.location="creareps.php"
                </script>';


            }
             ?>