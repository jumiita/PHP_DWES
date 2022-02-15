<?php

include_once "../Entidades/ciudad.php";
include_once "../Entidades/habitaciones.php";
include_once "../Entidades/hotel.php";
include_once "../Entidades/imagen.php";
include_once "../Entidades/reservas.php";
include_once "../Entidades/usuarios.php";
include_once "../DB/dbo.php";

class modeloReservas
{
    private dbo $db;

    public function __construct()
    {
        $this->db = new dbo();
    }

    public function comprobarBien()
    {
        $sql = "SELECT `checkin`,`checkout` FROM `reservas`;";

        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function setReserva($checkin,$checkout,$id_cliente,$id_habitacion){
        $sql = "INSERT INTO `reservas`( `checkin`, `checkout`, `id_cliente`, `id_habitacion`) VALUES ('".$checkin."','".$checkout."',".$id_cliente.",".$id_habitacion.");";
        $this->db->default();
        $this->db->query($sql);
        $this->db->close();
    }

}

// DateTime::createFromFormat("Y-m-d", $result["checkin"])
//    $sql = "SELECT reservas.estado as estado, \n"
//            . "habitaciones.precio as precio, \n"
//            . "usuarios.email as email \n"
//            . "	from reservas\n"
//            . "    INNER JOIN habitaciones on \n"
//            . "     reservas.id_habitacion = habitaciones.id_habitacion\n"
//            . "    INNER JOIN usuarios on \n"
//            . "   reservas.id_cliente =  usuarios.id_cliente;";