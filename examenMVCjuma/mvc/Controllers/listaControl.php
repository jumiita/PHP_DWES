<?php
include_once "../Models/listaPeliculasModelo.php";

$modelo = new listaPeliculasModelo();
session_start();

$lista = $modelo->getPeliculas();

require_once "../Views/listaPeliculasVista.phtml";