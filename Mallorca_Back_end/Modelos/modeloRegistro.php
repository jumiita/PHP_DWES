<?php

include_once "../Entidades/users.php";
include_once "../Entidades/countries.php";
include_once "../Entidades/cities.php";
include_once "../Entidades/neighborhoods.php";
include_once "../Entidades/states.php";
include_once "../Entidades/properties.php";
include_once  "../Entidades/multimedias.php";
require_once "../DBO/dbo.php";

class modeloRegistro
{

    public $dbo;

    public function __construct(){
        $this->dbo = new dbo();
    }

    public function comprobarUsuario($mail){
        $sql = "SELECT * FROM users WHERE mail = '" . $mail."';";
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        if ($query->num_rows == 0){
            return false;
        } else{
            return true;
        }
    }

    public function insertarUsuario($mail,$password){
        $sql = "INSERT INTO `users`( `mail`, `password`) VALUES ('".$mail."','".$password."');";
        $this->dbo->default();
        $this->dbo->query($sql);
        if ($this->dbo->insert_id > 0) {
            return true;
            $this->dbo->close();
        }
        return false;
        $this->dbo->close();
    }



}