<?php

class usuarios
{

    private $id;
    private $email;
    private $nombre;
    private $password;

    /**
     * @param $id
     * @param $email
     * @param $nombre
     * @param $password
     */
    public function __construct($id, $email, $nombre, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->password = $password;
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
    public function getEmail()
    {
        return $this->email;
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
    public function getPassword()
    {
        return $this->password;
    }

}