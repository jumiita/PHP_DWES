<?php

if (isset($_GET['id'])) {
    $file = file_get_contents("http://localhost/jFernandezTema2/BokingAPI/Controlador/controladorHotelDetalle.php");
    $hoteles = json_decode(file_get_contents("http://localhost/jFernandezTema2/BokingAPI/Controlador/controladorHotelDetalle.php?id=" . $_GET['id']));
    var_dump($hoteles);
}


require_once "../paginaDetalle.phtml";

?>