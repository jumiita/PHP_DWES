<?php

include_once "../Entidades/users.php";
include_once "../Entidades/countries.php";
include_once "../Entidades/cities.php";
include_once "../Entidades/neighborhoods.php";
include_once "../Entidades/states.php";
include_once "../Entidades/properties.php";
include_once  "../Entidades/multimedias.php";
require_once "../DBO/dbo.php";

class modeloLogin
{

    public $dbo;

    public function __construct()
    {
        $this->dbo = new dbo();
    }

    public function comprobarUsuario($mail,$password){
        $sql = "SELECT * FROM users WHERE mail = '" . $mail . "';";
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        if ($result = $query->fetch_assoc()){
            if (crypt($password,$result['password']) == $result['password']){
                return new users($result['id'],$result['mail'],$result['password']);
            }
        }
        return new users(0, "-","-");
    }

}