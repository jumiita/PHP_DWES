<?php

include_once "../Entities/usuarios.php";
include_once "../Entities/comentarios.php";
include_once "../Entities/pelicula.php";
include_once "../Entities/multimedia.php";
include_once "../Entities/staff.php";
include_once "../DB/dbo.php";

class registroModelo
{
    private dbo $dbo;

    public function __construct(){
        $this->dbo = new dbo();
    }

    public function insertarUsuario($email,$nombre,$password){
        $sql = "INSERT INTO `usuarios`( `email`, `nombre`, `password`) VALUES ('".$email."','".$nombre."','".$password."');";
        $this->dbo->default();
        $this->dbo->query($sql);
        $this->dbo->close();
        if ($this->db->insert_id > 0) {
            return true;
            $this->db->close();
        }
        return false;
        $this->db->close();
    }

    public function comprobarUsuario($email){
        $sql = "SELECT * FROM `usuarios` WHERE `email`= '".$email."';";
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        //return new usuarios($query['id'],$query['email'],$query['nombre'],$query['password']);
        if ($query->num_rows == 0){
            return false;
        }
        return true;
    }
}