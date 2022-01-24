<?php

include_once "../entidades/ciudad.php";
include_once  "../entidades/hotel.php";
include_once "../entidades/imagen.php";
include_once  "../db/conexion.php";


class imagenesModelo
{

    private conexion $db;


    public function __construct()
    {
        $this->db = new conexion();
    }
    public  function  get_imagenes($id){
        $sql = "SELECT * FROM `imagen` WHERE `id_hotel` =".$id;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()){
            $return [] = new imagen($result['id'],$result['imagen'],$result['id_hotel']);
        }
        return $return;
    }
}

?>