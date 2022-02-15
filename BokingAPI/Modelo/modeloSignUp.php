<?php

include_once "../DB/dbo.php";
include_once "../Entidades/usuarios.php";


class modeloSignUp
{
    private dbo $db;

    public function __construct()
    {
        $this->db = new dbo();
    }

    public function checkUserExists($mail): bool
    {
        $sql = "SELECT * FROM `usuarios` WHERE `email` = '".$mail."';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function introducirUsuario($mail, $password,$name,$telefono): bool
    {
        $sql = "INSERT INTO `usuarios`( `email`, `password`, `nombre`, `telefono`) 
        VALUES ('".$mail."','".$password."','" . $name."', ".$telefono.");";
        $this->db->default();
        $this->db->query($sql);
        if ($this->db->insert_id > 0) {
            return true;
            $this->db->close();
        }
        return false;
        $this->db->close();
    }
}