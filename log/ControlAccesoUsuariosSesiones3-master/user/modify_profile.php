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

    if($idPro != 1){
        $objses->destroy();
        header('Location: http://localhost:8888/usersMod/index.php?error=3');
    }

}else{
    $user = isset($_SESSION['loginUsers']) ? $_SESSION['loginUsers'] : null ;

    if($user == ''){
        header('Location: http://localhost:8888/usersMod/index.php?error=2');
    }
}

//llamamos la clase file
require'../class/files.php';
$objFile = new Files();

$idUser = $objses->get('idUser');

//print_r($_SESSION);

//vamos a armar la ruta para cargar la imagen
$path = $objFile->fix_path($idUser);

//cambiar el nombre del archivo

$file = $objFile->change_name();

$success = $objFile->upload_file($file, $path);

$newPath = explode('..', $success);

$size = count($newPath);

$path = 'http://localhost:8888/usersMod' . $newPath[$size-1];

//llamamos la clase database
require'../class/database.php';

//llamamos la clase users
require'../class/users.php';
$objUser = new Users();
$objUser->modify_login($iduse, $path);


