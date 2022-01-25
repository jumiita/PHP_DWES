<?php

include_once "../Entities/country.php";
include_once "../Entities/city.php";
include_once "../Entities/neighborhood.php";
include_once "../Entities/multimedias.php";
include_once "../Entities/state.php";
include_once "../Entities/property.php";
include_once "../DB/dbo.php";

class usuarioPropiedadModelo{
    protected dbo $db;
    public function __construct(){
        $this->db = new dbo();
    }
     public function venderPropiedad($propertyId){
        $sql = "UPDATE properties SET userId = NULL WHERE id = " . $propertyId;
        $this->db->default();
        $this->db->query($sql);
        if ($this->db->affected_rows > 0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
     }

}