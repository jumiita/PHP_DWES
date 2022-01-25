<?php

include_once "../MODELO/modeloPaginaPrincipal.php";
session_start();
$modelo = new modeloPaginaPrincipal();

 $modelo->getCountrys($_SESSION['login']);

$ciudades = $modelo->getCountries();
$jugador = $modelo->getCountryUserId($_SESSION['login']);

require_once "../VISTA/vistaPAginaPrincipal.phtml";