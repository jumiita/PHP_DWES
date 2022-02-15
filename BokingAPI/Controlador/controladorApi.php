<?php
include_once "../Modelo/modeloListaPrincipal.php";

$modeloHoteles = new modeloListaPrincipal();
$hoteles = $modeloHoteles->getHoteles();

//Creamos el json de hoteles para luego llamarlo en la vista.
$codificacion = json_encode($hoteles);
echo $codificacion;

