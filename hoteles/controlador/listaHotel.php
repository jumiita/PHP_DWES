<?php
include_once "../modelos/hotelsModelo.php";

$modelo = new hotelsModelo();

$hoteles = $modelo->get_hotel();

require_once "../vista/vista.php";

?>

