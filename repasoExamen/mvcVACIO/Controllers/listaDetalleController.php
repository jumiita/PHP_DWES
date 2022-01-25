<?php
include_once "../Models/litaDetalleModel.php";

$modelo = new litaDetalleModel();

$property =$modelo->get_properties($_GET['id']);

if (isset($_POST['mail'] ) && isset($_POST['password'] )){
    if ($modelo->checkUserExists($_POST['mail'])){
        die("User ya existe");
    } else{
    try {
        $password = crypt($_POST['password'], bin2hex(random_bytes(22)));
    } catch (Exception $e) {
        $password = crypt($_POST['password'], "salt");
    }
    $modelo->set_registro($_POST['mail'],$password);
    }

}

if (isset($_POST['mail_login'] ) && isset($_POST['password_login'] )) {

    $iniciar = $modelo->get_usuario($_POST['mail_login'],$_POST['password_login']);

    if ($iniciar == true){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $iniciar->getMail();
    }
}


require_once "../Views/listaDetalle.phtml";



