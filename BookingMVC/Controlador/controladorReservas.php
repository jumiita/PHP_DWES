<?php

include_once "../Modelo/modeloReservas.php";

$modelo = new modeloReservas();
session_start();

if (isset($_POST['checkin']) && isset($_POST['checkout'])){
    $comprobar = $modelo->comprobarBien($_POST['checkin'],$_POST['checkout']);
    if ($comprobar==true){
        $reserva = $modelo->setReserva($_SESSION['cliente'] );
    }


}





require_once "../Vistas/reservasVista.phtml";