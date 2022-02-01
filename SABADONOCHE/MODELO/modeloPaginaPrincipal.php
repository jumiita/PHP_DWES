<?php

include_once "../ENTIDADES/countryLanguages.php";
include_once "../ENTIDADES/cities.php";
include_once "../ENTIDADES/users.php";
include_once "../ENTIDADES/countries.php";
include_once "../DBO/dbo.php";

class modeloPaginaPrincipal
{

    private dbo $db;


    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getUserId($id)
    {
        if ($id != null) {
            $sql = "SELECT * FROM `users` WHERE `Id` = " . $id . ";";
            $this->db->default();
            $query = $this->db->query($sql);
            $this->db->close();
            $result = $query->fetch_assoc();
            return new users($result['Id'], $result['Mail'], $result['Password']);
    }
        return new users(0, "", "");
        }


    public function getCountries(){
        $sql = "SELECT * FROM `countries`;";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()){
                $return [] = new countries($result['Code'],$result['Name'],$result['Population'],$result['GNP'],$result['Capital'],$this->getUserId($result['UserId']));
        }
        return $return;
    }

    public function getCountrys($id){
        $sql = "SELECT * FROM `countries` where UserId = ".$id.";";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()){
            $return [] = new countries($result['Code'],$result['Name'],$result['Population'],$result['GNP'],$result['Capital'],$this->getUserId($result['UserId']));
        }
        return $return;
    }


    public function getCountryUserId($id){
        $sql = "SELECT * FROM `countries` WHERE UserId = ".$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return [] = new countries($result['Code'],$result['Name'],$result['Population'],$result['GNP'],$result['Capital'],$this->getUserId($result['UserId']));
        }
    return $return;
    }
    //Aqui nos da un select de toodo random
    public function randomCountryConUser(){
        $sql = "SELECT * FROM countries ORDER BY RAND() LIMIT 1;";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new countries($result['Code'],$result['Name'],$result['Population'],$result['GNP'],$result['Capital'],$result['UserId']);
    }
    //Aqui cogemos un select de countries y le ponemos el codigo random, luego le hacemos un update para que meta el id de usuario y nos cambie el codigo segun el random
    public function randomCity($user_id) {
        $sql = "SELECT Code FROM `countries`;";
        $this->db->default();
        $query = $this->db->query($sql);

        $return = Array();
        while ($result = $query->fetch_assoc()) {
            $return[] = $result["Code"];
        }
        $numero = rand(0, count($return));

        $sql = "UPDATE `countries` SET `UserId`='".$user_id."' WHERE Code = '".$return[$numero]."';";
        $this->db->query($sql);
        $this->db->close();
    }


}