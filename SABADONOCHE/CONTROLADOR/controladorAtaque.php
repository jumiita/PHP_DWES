<?php

include_once "../MODELO/modeloAtaque.php";
session_start();
$modelo = new modeloAtaque();
if ($_GET['FuerzaUsuario'] > $_GET['FuerzaPais']){
    echo "<script>alert('Enhorabuena, has ganado! Crack')</script>";
    $ataque = $modelo->AtaqueActualizado($_SESSION['login']->getId(),$_GET['Code']);

} else{
    echo "<script>alert('No has ganado el ataque, vuelve a probar..')</script>";
}
header("Location: ../CONTROLADOR/controladorPaginaPrincipal.php");
