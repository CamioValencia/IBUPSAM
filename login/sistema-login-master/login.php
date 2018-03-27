<?php session_start();


if (isset($_SESSION['User'] )) {
	header('location:login.html');		
}
try {
 	$conexion = new PDO('mysql:host=localhost;dbname=bienestar', 'root' , '');

 } catch (Exception $e) {
 	echo "ERROR A LA CONECCION DE LA BASE DE DATOS";
 } 


 $error='';
 $enviar='';
 $enviado ='';


 if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $User = $_POST['User'];
   $Password = md5($_POST['Password']);


   $sql = $conexion->prepare('SELECT * FROM usuarios WHERE User = :User AND Password = :Password');
   $sql->execute( array(':User' => $User ,
   ':Password'=> $Password ));

   $resultado = $sql->fetch();
   if ($resultado !== false) {
         $_SESSION['User'] = $User;
		$enviar .=  '<center> Bienvenido <br>'. ucwords($resultado['User']). '</center> <br>';
		$enviar .= '<meta http-equiv="refresh" content="2;url=./admin/usuarios.php">';
		$enviado .= '<center><i class="fa fa-cog fa-spin fa-3x fa-fw"></i><br>
                  <span class="">Loading...</span></center><br>';
   
   } else {
   $error .= '<li> Los Datos ingresados son Incorrecto </li>';
   
}
 } 



 ?>