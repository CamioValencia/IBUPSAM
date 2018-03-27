<?php

//Controlando el inicio de la sesión
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

if(isset($_SESSION['loginUsers'])){
    $nameU = $objses->get('loginUsers');
    $iduse = $objses->get('idUser');
    $idPro = $objses->get('idProfile');

    //controlar el perfil de acceso

    if($idPro != 2){
    	header('Location: http://localhost:8888/usersMod/index.php?error=3');
    }
}else{
    $user = isset($_SESSION['loginUsers']) ? $_SESSION['loginUsers'] : null ;

    if($user == ''){
    	$objses->destroy();
        header('Location: http://localhost:8888/usersMod/index.php?error=2');
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administrador Dashboard</title>
	</head>
	<body>
		<?php echo "Bienvenido, " . $_SESSION['loginUsers'];?>
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<li><a href="log_out.php">Cerrar</a></li>
		</ul>
	</body>
</html>