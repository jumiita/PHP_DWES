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

    public function insertUser($Mail,$password){

        $sql = "INSERT INTO `users`( `Mail`, `Password`) VALUES ('".$Mail."','".$password."');";
        $this->db->default();

        if ($this->db->query($sql)) {
            $id = $this->db->insert_id;
            $this->db->close();
            return $id;
        }
        $this->db->close();
        return 0;
    }

    public function checkUserExists($mail): bool
    {
        $sql = "SELECT * FROM `users` WHERE `Mail` = '".$mail."';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }
}