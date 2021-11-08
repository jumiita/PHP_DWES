<?php
//En esta clase creamos las provincias politicos donde creamos los atributos,
// getter y setters donde llamaremos o meteremos la info necesaria.
class provincias
{

    private $id;
    private $nombre;
    private $delegados;

    /**
     * @param $id
     * @param $nombre
     * @param $delegados
     */
    //Creamos un constructyor donde metemos los atributos como parametros
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