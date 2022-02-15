<?php
include_once "../Models/registroModelo.php";

$modelo = new registroModelo();

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nombre'])) {
    if ($_POST['password'] == $_POST['password2']) {
        if ($comprobar = $modelo->comprobarUsuario($_POST['email'])) {
            die("ya existe el usuario");
        } else {
            try {
                $password = crypt($_POST['password'], bin2hex(random_bytes(8)));
            } catch (Exception $e) {
                $password = crypt($_POST['password'], "salt");
            }
            $insertar = $modelo->insertarUsuario($_POST['email'], $_POST['nombre'], $password);
            header("Location: ../Controllers/loginControl.php");
        }
    } else {

        echo "<script>alert('La contraseña no coincide, repite otra vez,gracias')</script>";
    }

    }

require_once "../Views/registroVista.phtml";