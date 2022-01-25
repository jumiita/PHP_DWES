<?php

include_once "../MODELO/modeloRegistro.php";

$modelo = new modeloRegistro();

if (isset($_POST['mail']) && isset($_POST['password'])){
    if ($_POST["password"] == $_POST["password2"]) {
        if ($comprobacion = $modelo->checkUserExists($_POST['mail'])) {
            die("User already exists");
        } else {
            try {
                $password = crypt($_POST["password"], bin2hex(random_bytes(10)));
            } catch (Exception $e) {
                $password = crypt($_POST["password"], "salt");
            }
            $insertar = $modelo->insertUser($_POST['mail'], $password);
            header("Location: ../CONTROLADOR/controladorLogin.php");
        }
    }

}
require_once "../VISTA/vistaRegistro.phtml";





require_once "../VISTA/vistaRegistro.phtml";