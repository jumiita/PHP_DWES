<?php

include_once "../Modelo/modeloListaPrincipal.php";

$modelo = new modeloListaPrincipal();

$hoteles = $modelo->getHoteles();
session_start();
require_once "../Vistas/ListaPrincipal.phtml";