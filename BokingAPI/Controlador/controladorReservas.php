<?php

include_once "../Modelo/modeloReservas.php";

$modelo = new modeloReservas();
session_start();

if (isset($_POST['checkin']) && isset($_POST['checkout'])) {
    if ($comprobar = $modelo->comprobarBien($_SESSION['cliente'])) {
        die("Estos días ya los tenemos ocupados pruba otras fechas");
    } else {
        $reserva = $modelo->setReserva($_POST['checkin'], $_POST['checkout'],
            $_SESSION['cliente'], $_GET['id']);
        echo "<script>alert('Tu reserva se ha realizado, mira tu correo electronico')</script>";
        header("Location: ../Controlador/controladorPaginaPrincipal.php");
    }

}
echo "<script>alert('Tu reserva NO se ha realizado, vuelve a probar')</script>";


require_once "../Vistas/reservasVista.phtml";