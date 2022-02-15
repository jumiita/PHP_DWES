<?php
include_once "../Modelo/modeloSignUp.php";
$modelo = new modeloSignUp();

if (isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST['telefono']) && isset($_POST['name'])) {
    if ($_POST["password"] == $_POST["password2"]) {
        if ($comprobacion = $modelo->checkUserExists($_POST['mail'])){
            die("User already exists");
        }else{
            try {
                $password = crypt($_POST["password"], bin2hex(random_bytes(10)));
            } catch (Exception $e) {
                $password = crypt($_POST["password"], "salt");
            }
            $crear = $modelo->introducirUsuario($_POST['mail'], $password, $_POST['name'], $_POST['telefono']);
            header("Location: ../Controlador/controladorLogin.php");
        }
    }

}
require_once "../Vistas/signUpVista.phtml";