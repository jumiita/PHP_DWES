<?php

class votos
{

    private $id;
    private $nombre;
    private $delegados;

    /**
     * @param $id
     * @param $nombre
     * @param $delegados
     */
    public function __construct($id, $nombre, $delegados)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->delegados = $delegados;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
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
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDelegados()
    {
        return $this->delegados;
    }

    /**
     * @param mixed $delegados
     */
    public function setDelegados($delegados)
    {
        $this->delegados = $delegados;
    }

}

?>