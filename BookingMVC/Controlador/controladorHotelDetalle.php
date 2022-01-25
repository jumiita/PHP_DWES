<?php

include_once "../Modelo/modeloHotelDetalle.php";

$modelo = new modeloHotelDetalle();

if(isset($_GET['id'])) {
    $hotel = $modelo->getHotelId($_GET['id']);
    $imagenes = $modelo->getImagen($_GET['id']);
}

require_once "../Vistas/hotelDetalleVista.phtml";