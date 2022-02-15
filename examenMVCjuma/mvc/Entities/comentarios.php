<?php


class comentarios
{
private $id;
private $comentario;
private $idPelicula;
private $idUsuario;
private $puntuacion;

    /**
     * @param $id
     * @param $comentario
     * @param $idPelicula
     * @param $idUsuario
     * @param $puntuacion
     */
    public function __construct($id, $comentario, $idPelicula, $idUsuario, $puntuacion)
    {
        $this->id = $id;
        $this->comentario = $comentario;
        $this->idPelicula = $idPelicula;
        $this->idUsuario = $idUsuario;
        $this->puntuacion = $puntuacion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @return mixed
     */
    public function getIdPelicula()
    {
        return $this->idPelicula;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @return mixed
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }


}