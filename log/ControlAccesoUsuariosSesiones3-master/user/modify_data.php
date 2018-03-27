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

//NOS CONECTAMOS A LA BASE DE DATOS
require'../class/database.php';

//print_r($_POST);

require'../class/users.php';
$objUser = new Users();
$objUser->modify_data($iduse);

