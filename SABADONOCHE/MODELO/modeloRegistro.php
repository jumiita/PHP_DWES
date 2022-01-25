<?php

include_once "../ENTIDADES/countryLanguages.php";
include_once "../ENTIDADES/cities.php";
include_once "../ENTIDADES/users.php";
include_once "../ENTIDADES/countries.php";
include_once "../DBO/dbo.php";
class modeloRegistro
{
    private dbo $db;


    public function __construct()
    {
        $this->db = new dbo();
    }

    public function insertUser($Mail,$password){

        $sql = "INSERT INTO `users`( `Mail`, `Password`) VALUES ('".$Mail."','".$password."');";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $query->fetch_assoc();
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function checkUserExists($mail): bool
    {
        $sql = "SELECT * FROM `users` WHERE `email` = '".$mail."';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }
}