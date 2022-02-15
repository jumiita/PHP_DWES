<?php

include_once "../Modelo/modeloHotelDetalle.php";

$modelo = new modeloHotelDetalle();
session_start();
if(isset($_GET['id'])) {
    $hotel = $modelo->getHotelId($_GET['id']);
    $imagenes = $modelo->getImagen($_GET['id']);
    $habitaciones = $modelo->getHabitaciones($_GET['id']);
}

require_once "../Vistas/hotelDetalleVista.phtml";