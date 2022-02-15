<?php

include_once "../Modelo/modeloListaPrincipal.php";

$modelo = new modeloListaPrincipal();
session_start();

$hoteles = $modelo->getHoteles();


//Creamos el json de hoteles para luego llamarlo en la vista.
//$codificacion = json_encode($hoteles);
// echo $codificacion;




if (session_start() == false){
    $ciudad = $modelo->getCiudad($_SESSION['cliente']);
}



 require_once "../Vistas/ListaPrincipal.phtml";