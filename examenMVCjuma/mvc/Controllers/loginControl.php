<?php
include "../Models/loginModelo.php";

$modelo = new loginModelo();

if (isset($_POST['email']) && isset($_POST['password'])){
     $comprobar = $modelo->comprobarUsuario($_POST['email'],$_POST['password']);
session_start();
$_SESSION['user'] =$comprobar;
header("Location: ../Controllers/listaControl.php");

}

require_once "../Views/loginVista.phtml";