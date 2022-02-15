<?php

if (isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    if ($_POST["password"] == $_POST["password2"]) {
        $file = file_get_contents("http://localhost/jFernandezTema2/Mallorca_Back_end/Controlador/controladorRegistro.php?mail=".$_POST["mail"]."&password=".$_POST["password"]);
        $registroObjeto = json_decode($file);
        if ($registroObjeto->result){
            header("Location: controladorLogin.php");
        } else{
            die($registroObjeto->error);
        }
    }
} else{
    include_once "../Vistas/vistaRegistro.phtml";
}