<?php

if (isset($_GET['id'])) {
    $selectedPropertyId = $_GET['id'];
    $file = file_get_contents("http://localhost:63342/untitled/Mallorca_Back_end/Controlador/controladorUnaPropiedad.php?id=" . $selectedPropertyId);
    $property = json_decode($file);
}else{
    die("No hay un id seleccionado");
}
session_start();
require_once "../Vistas/vistaUnaPropiedad.phtml";