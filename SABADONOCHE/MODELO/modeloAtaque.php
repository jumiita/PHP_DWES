<?php
include_once "../ENTIDADES/countryLanguages.php";
include_once "../ENTIDADES/cities.php";
include_once "../ENTIDADES/users.php";
include_once "../ENTIDADES/countries.php";
include_once "../DBO/dbo.php";

class modeloAtaque
{

    private dbo $db;


    public function __construct()
    {
        $this->db = new dbo();
    }

    public function AtaqueActualizado($id_user,$codigoCiudad){
        $sql = "UPDATE `countries` SET `UserId`= ".$id_user." WHERE `Code` = '".$codigoCiudad."';";
        $this->db->default();
        $this->db->query($sql);
        $this->db->close();
    }

}