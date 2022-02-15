<?php
include_once "../Entidades/ciudad.php";
include_once "../Entidades/habitaciones.php";
include_once "../Entidades/hotel.php";
include_once "../Entidades/imagen.php";
include_once "../Entidades/reservas.php";
include_once "../Entidades/usuarios.php";
include_once "../DB/dbo.php";

class modeloListaPrincipal{

    private dbo $db;


    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getHoteles(){
        $sql = "SELECT * FROM `hotel`;";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()){
            $return [] = new hotel($result['id_hotel'],$result['nombre'],$result['estado'],
                $result['descripcion'],$result['zona'],
                $this->getCiudad($result['ciudad_id']),$result['puntuacion'],
                $this->getImagen($result['id_hotel']));
        }
        return $return;
    }

    public function getImagen($id)
    {

        $sql = "SELECT * FROM `imagen` WHERE id_hotel=" . $id . ";";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return [] =new imagen($result['id'], $result['id_hotel'], $result['url']);
    }
    return $return;
    }

    public function getCiudad($id): ciudad
    {

        $sql = "SELECT * FROM `ciudad` WHERE `id` =".$id.";";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new ciudad($result['id'],$result['nombre']);
    }

    public function getHabitaciones(): array
    {

        $sql = "SELECT * FROM `habitaciones`;";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return [] = new habitaciones($result['id'],
                $result['precio'], $result['num_camas'], $result['num_pers'], $result['id_hotel']);
        }
        return $return;
    }

    public function getReservas($id)
    {

        $sql = "SELECT * FROM `reservas`;";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return [] = new reservas($result['id_reservas'],
                $result['checkin'], $result['checkout'], $result['estado'],
                $result['id_cliente'],$result['id_habitacion']);
        }
        return $return;
    }


}