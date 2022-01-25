<?php

class usuarios
{

    protected $id_cliente;
    protected $email;
    protected $password;
    protected $nombre;
    protected $telefono;

    /**
     * @param $id_cliente
     * @param $email
     * @param $password
     * @param $nombre
     * @param $telefono
     */
    public function __construct($id_cliente, $email, $password, $nombre, $telefono)
    {
        $this->id_cliente = $id_cliente;
        $this->email = $email;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
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
    public function getTelefono()
    {
        return $this->telefono;
    }


}