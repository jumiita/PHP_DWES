<?php

include_once "../MODELO/modeloPaginaPrincipal.php";

session_start();
$modelo = new modeloPaginaPrincipal();

$ciudades = $modelo->getCountries();

$jugador = $modelo->getCountryUserId($_SESSION['login']->getId());
$fuerza = 0;

require_once "../VISTA/vistaPAginaPrincipal.phtml";