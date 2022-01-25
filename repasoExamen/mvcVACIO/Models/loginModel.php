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

    function set_registro($user,$pass)
    {
        $sql = "INSERT INTO `users`( `mail`, `password`) VALUES ('" . $user . "','" . $pass . "');";
        $this->db->default();
        $this->db->query($sql);
        if ($this->db->insert_id > 0) {
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
    }

    function checkUserExists($mail): bool
    {
        $sql = "SELECT * FROM users WHERE mail = '" . $mail . "';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function get_usuario($mail,$password): users
    {
        $sql = "SELECT * FROM `users` WHERE `mail` = '".$mail."';";
        $this->db->default();
        $query = $this->db->query($sql);
        $result = $query->fetch_assoc();
        $this->db->close();
        if (hash_equals(crypt($password,$result['password']),$result['password'])){//password_verify($password,$result['password'])){   hash_equals(crypt($password,$result["password"]),$result["password"])
            return true;
        }else{
            return false;
        }
    }

}