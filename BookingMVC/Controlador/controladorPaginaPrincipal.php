<?php

include_once "../Modelo/modeloListaPrincipal.php";

$modelo = new modeloListaPrincipal();
//session_start();

$hoteles = $modelo->getHoteles();


if (session_start() == false){
    $ciudad = $modelo->getCiudad($_SESSION['cliente']);
}


 require_once "../Vistas/ListaPrincipal.phtml";