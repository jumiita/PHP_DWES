<?php

include_once "../Entities/usuarios.php";
include_once "../Entities/comentarios.php";
include_once "../Entities/pelicula.php";
include_once "../Entities/multimedia.php";
include_once "../Entities/staff.php";
include_once "../DB/dbo.php";


class loginModelo
{

    private dbo $dbo;

    public function __construct(){
        $this->dbo = new dbo();
    }

    public function comprobarUsuario($email,$password)
    {
        $sql = "SELECT * FROM `usuarios` WHERE `email`= '" . $email . "';";
        $this->dbo->default();
        $query = $this->dbo->query($sql);
        $this->dbo->close();
        if ($result = $query->fetch_assoc()) {
            if (crypt($password, $result['password']) == $result['password']) {
                return new usuarios($result['id'], $result['email'], $result['nombre'], $result['password']);
            }
        }
        return new usuarios(0,"","","");
    }
}