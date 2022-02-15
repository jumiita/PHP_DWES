<?php

class ciudad
{

    public $nombre;
    public  $id;

    /**
     * @param $nombre
     * @param $id
     */
    public function __construct($nombre, $id)
    {
        $this->nombre = $nombre;
        $this->id = $id;
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
    public function getId()
    {
        return $this->id;
    }


}