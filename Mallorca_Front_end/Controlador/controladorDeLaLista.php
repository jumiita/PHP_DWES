<?php

if (isset($_GET['propertyId'])) {
    $selectedPropertyId = $_GET['propertyId'];
    $file = file_get_contents("http://localhost/jFernandezTema2/Mallorca_Back_end/Controlador/controladorLista.php?propertyId=" . $selectedPropertyId);
    $objeto = json_decode($file);
} else{
    $file = file_get_contents("http://localhost/jFernandezTema2/Mallorca_Back_end/Controlador/controladorLista.php");
}
$objeto = json_decode($file);

$propiedad = $objeto->properties;
var_dump($objeto);

if (isset($_GET['propertyId'])) {
    $selectedPropertyId = $_GET["propertyId"];
    $selectedProperty = $objeto->selectedProperty;
    $selectedLatitud = $objeto->selectedLatitud;
    $selectedLongitud = $objeto->selectedLongitud;
    $zoom = $objeto->zoom;
}
session_start();

require_once "../Vistas/listaVista.phtml";