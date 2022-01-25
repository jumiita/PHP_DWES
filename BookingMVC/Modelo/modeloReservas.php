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

    public function comprobarBien($estado,$id_habitacion)
    {
        $sql = "SELECT * FROM `reservas` WHERE estado = '" . $estado . "' && id_habitacion = " . $id_habitacion . ";";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return[] = new reservas($result['id_reservas'],
                DateTime::createFromFormat("Y-m-d", $result["checkin"]),
                DateTime::createFromFormat("Y-m-d", $result["checkout"]),
                $result['estado'], $result['id_cliente'], $result['id_habitacion']);
        }
        return $return;
    }

    public function comprobarReserva($chekin,$chckout){

        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()){
            $habitaciones = new habitaciones($result['precio']);
            $usuarios = new usuarios($result['email']);
            $reservas = new reservas($habitaciones,$usuarios,$result['id_reservas'],DateTime::createFromFormat("Y-m-d", $result["checkin"]),DateTime::createFromFormat("Y-m-d", $result["checkout"]),
                $result['estado'],$result['id_cliente'],$result['id_habitacion']);
            $reserva[] = $reservas;
        }
         return $reserva;
    }

    public function setReserva($checkin,$checkout,$id_cliente){
     //   $sql = "INSERT INTO `reservas`( `checkin`, `checkout`, `estado`, `id_cliente`, `id_habitacion`)
// VALUES (\'2022-01-25\',\'2022-01-30\',\'Tomada\',2,1);";

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