<?php

    function Conectarse()  {
        if (!( $link = mysql_connect("localhost","root","")))  {
            echo"<script>
            alert('Error al conectarse al servidor');
            </script>";
        }  
        if (!mysql_select_db("bienestar",$link))  {
            echo"<script>
            alert('Error al conectarse a la base de datos');
            </script>";
        }  
        return $link;  
    }


if (isset($_POST['BotonAceptar'])){
        $Cedula = $_POST['cedula'];
        $Correo = $_POST['correo'];
        $Aceptado = $_POST['aceptado'];
        $link = Conectarse();
        for($i=0;$i<count($Cedula);$i++){
            mysql_query("UPDATE personas SET aceptado='".$Aceptado[$i]."'
                        WHERE Cc='".$Cedula[$i]."'",$link);
            if($Aceptado[$i] == 'S'){
                $mail = "La solicitud ha sido aceptada, por favor de click en el siguiente enlace: http://bienestarupcsam.eshost.com.ar/InscripcionCursos.php";
                //Titulo
                $titulo = "SOLICITUD ACEPTADA";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail($Correo[$i],$titulo,$mail,$headers);
                if(!$bool){
                    echo'<script>
                        alert("Correo no pudo ser enviado");
                        window.location="personas.php";
                        </script>';
                }
            }
            else{
                $mail = "No cumple con los requisitos, por lo cual su solicitud no fue aceptada";
                //Titulo
                $titulo = "SOLICITUD RECHAZADA";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail($Correo[$i],$titulo,$mail,$headers);
                if(!$bool){
                    echo'<script>
                        alert("Correo no pudo ser enviado");
                        window.location="personas.php";
                        </script>';
                }
            }
        }
        echo'<script>
        alert("Guardado exitoso");
        window.location="personas.php";
        </script>';
    }
	
	?>