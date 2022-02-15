<?php

include_once "../Modelo/modeloHotelDetalle.php";

$modelo = new modeloHotelDetalle();
session_start();

$error = "";
$return = array();

if(isset($_GET['id'])) {
    $return['hotel'] = $modelo->getHotelId($_GET['id']);
    $return['imagenes'] = $modelo->getImagen($_GET['id']);
    $return['habitaciones'] = $modelo->getHabitaciones($_GET['id']);

}else{
    $return ["error"] = "NO ID SELECTED";
}
echo json_encode($return);
