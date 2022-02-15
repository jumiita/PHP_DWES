<?php
include_once "../Modelo/modeloLogin.php";

$modelo = new modeloLogin();

if (isset($_POST['mail'])&& isset($_POST['password'])){
    $inicio = $modelo->getUser($_POST['mail'],$_POST['password']);
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['user'] = $inicio->getEmail();
    $_SESSION['cliente'] = $inicio->getIdCliente();

    header("Location: ../Controlador/controladorPaginaPrincipal.php");
}

require_once "../Vistas/loginVista.phtml";

//file_get_contents
//$json_decode_> de json a array asociativo
//$json_enconde -> de array a json
