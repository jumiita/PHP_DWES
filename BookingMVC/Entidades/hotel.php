<?php

class hotel
{

    protected  $id_hotel;
    protected  string $nombre;
    protected $estado;
    protected  string $descripcion;
    protected  string $zona;
    protected $ciudad_id;
    protected string $puntuacion;
    protected $imagenes;

    /**
     * @param $id_hotel
     * @param $nombre
     * @param $estado
     * @param $descripcion
     * @param $zona
     * @param $ciudad_id
     * @param $puntuacion
     * @param $imagenes
     */
    public function __construct($id_hotel, $nombre, $estado, $descripcion, $zona, $ciudad_id, $puntuacion, $imagenes)
    {
        $this->id_hotel = $id_hotel;
        $this->nombre = $nombre;
        $this->estado = $estado;
        $this->descripcion = $descripcion;
        $this->zona = $zona;
        $this->ciudad_id = $ciudad_id;
        $this->puntuacion = $puntuacion;
        $this->imagenes = $imagenes;
    }

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->id_hotel;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * @return mixed
     */
    public function getCiudadId()
    {
        return $this->ciudad_id;
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
    public function getImagenes()
    {
        return $this->imagenes;
    }


}