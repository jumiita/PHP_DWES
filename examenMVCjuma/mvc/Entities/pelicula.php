<?php

class pelicula
{
private $id;
private $idMultimedia;
private $titulo;
private $genero;
private $puntuacion;
private $idStaff;
private $descripcion;

    /**
     * @param $id
     * @param $idMultimedia
     * @param $titulo
     * @param $genero
     * @param $puntuacion
     * @param $idStaff
     * @param $descripcion
     */
    public function __construct($id, $idMultimedia, $titulo, $genero, $puntuacion, $idStaff, $descripcion)
    {
        $this->id = $id;
        $this->idMultimedia = $idMultimedia;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->puntuacion = $puntuacion;
        $this->idStaff = $idStaff;
        $this->descripcion = $descripcion;
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
    public function getIdMultimedia()
    {
        return $this->idMultimedia;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @return mixed
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * @return mixed
     */
    public function getIdStaff()
    {
        return $this->idStaff;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }


}