<?php

if (isset($_POST['mail']) && isset($_POST['password'])){
    $file = file_get_contents("http://localhost/jFernandezTema2/Mallorca_Back_end/Controlador/controladorLogin.php?mail=".$_POST['mail']."&password=".$_POST['password']);
    $objetoUsuario = json_decode($file);
    if ($objetoUsuario->id > 0 ){
        session_start();
        $_SESSION['user_id'] = $objetoUsuario->id;
        $_SESSION['userMail'] = $objetoUsuario->mail;
        $_SESSION['userPlainPassword'] = $_POST['password'];
        header("Location: controladorDeLaLista.php");
    } else{
        die("El login ha fallado");
    }
} else {
    include_once "../Vistas/vistaLogin.phtml";
}