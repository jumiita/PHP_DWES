<?php

include_once "sql.php";
include_once "pelicula.php";
include_once  "multimedia.php";
include_once  "staff.php";

class usuarios
{

    private int $id;
    private string $email;
    private string $nombre;
    private string $password;

    /**
     * @param int $id
     * @param string $email
     * @param string $nombre
     * @param string $password
     */
    public function __construct(int $id, string $email, string $nombre, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->password = $password;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


}