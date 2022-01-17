<?php
include_once "../modelos/imagenesModelo.php";

$modeloImagen = new imagenesModelo();

if(isset($_GET['id'])) {
    $imagenes = $modeloImagen->get_imagenes($_GET['id']);
}
require_once "../vista/vistaUnica.php";

?>