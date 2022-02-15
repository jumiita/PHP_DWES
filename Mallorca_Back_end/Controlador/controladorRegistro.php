<?php
include_once "../DBO/dbo.php";
include_once "../Modelos/modeloRegistro.php";


$return = array();
$result = false;
$error = "";

if (isset($_GET['mail']) && isset($_GET['password'])) {
    $modelo = new modeloRegistro();
        if ($modelo->comprobarUsuario($_GET['mail'])){
            $error = "Ya existe";
        } else{
            try {
                $password = crypt($_GET['password'],bin2hex(random_bytes(8)));
            } catch (Exception $e){
                $password = crypt($_GET['password'],"salt");
            } if ($modelo->insertarUsuario($_GET['mail'], $password)){
                $result = true;
            } else {
                $error = "El registro ha fallado";
            }
        }
    } else {
    $error = "No se pudo realizar el registro";
}

$return['result'] = $result;
$return['error'] = $error;
echo json_encode($return);
