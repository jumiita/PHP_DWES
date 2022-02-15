<?php

include_once "../Modelos/modeloUnaPropiedad.php";

$modelo = new modeloUnaPropiedad();
$error = "";
$return = array();
if (isset($_GET['propertyId'])) {

    $return['property'] = $modelo->getMultimediasById($_GET['propertyId']);
} else{
    $return['error'] = "no hay un id seleccionado";
}

echo json_encode($return);