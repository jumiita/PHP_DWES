<?php

include_once "../Modelos/modeloLogin.php";

$modelo = new modeloLogin();

    if (isset($_GET['mail']) && isset($_GET['password'])){
        $iniciar = $modelo->comprobarUsuario($_GET['mail'],$_GET['password']);
        echo json_encode($iniciar);
    }else{
         echo json_encode(new users(0,"-","-"));
    }

