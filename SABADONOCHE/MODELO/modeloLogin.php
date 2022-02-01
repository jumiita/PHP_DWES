<?php

include_once "../ENTIDADES/countryLanguages.php";
include_once "../ENTIDADES/cities.php";
include_once "../ENTIDADES/users.php";
include_once "../ENTIDADES/countries.php";
include_once "../DBO/dbo.php";

class modeloLogin
{

    private dbo $db;


    public function __construct()
    {
        $this->db = new dbo();
    }
public function comprobarUsuario($mail,$password){

    $sql = "SELECT * FROM `users` WHERE `Mail` = '".$mail."';";
    $this->db->default();
    $query = $this->db->query($sql);
    $this->db->close();
    if ($result = $query->fetch_assoc()) {
        if (crypt($password, $result["Password"]) == $result["Password"]) {
            return  new users($result['Id'],$result['Mail'],$result['Password']);
        }
    }
    return new users(0, "-", "-");
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

}