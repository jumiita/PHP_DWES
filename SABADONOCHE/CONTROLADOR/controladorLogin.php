<?php

include_once "../MODELO/modeloLogin.php";

if (isset($_POST['mail']) && $_POST['password']){
    $modelo = new modeloLogin();
        $login = $modelo->comprobarUsuario($_POST['mail'],$_POST['password']);
        session_start();
        $_SESSION['user'] =true ;
        $_SESSION['login'] = $login ;

        header("Location: ../CONTROLADOR/controladorPaginaPrincipal.php");
}

require_once "../VISTA/vistaLogin.phtml";
