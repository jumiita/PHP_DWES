<?php

include_once "../Entities/usuarios.php";
include_once "../Entities/comentarios.php";
include_once "../Entities/pelicula.php";
include_once "../Entities/multimedia.php";
include_once "../Entities/staff.php";
include_once "../DB/dbo.php";

class listaPeliculasModelo
{
private dbo $dbo;

public function __construct(){
    $this->dbo = new dbo();
}

public function getPeliculas(){
    $sql = "SELECT * FROM `pelicula`;";
    $this->dbo->default();
    $query = $this->dbo->query($sql);
    $this->dbo->close();
    $return = array();
    while ($result = $query->fetch_assoc()){
        $return [] = new pelicula($result['id'],$result['idMultimedia'],
            $result['titulo'],$result['genero'],$result['puntuacion'],
            $result['idStaff'],$result['descripcion']);
    }
    return $return;
}

}