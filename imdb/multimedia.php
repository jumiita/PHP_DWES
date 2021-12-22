<?php

include_once "sql.php";
include_once  "staff.php";
include_once "pelicula.php";
include_once "usuarios.php";

class multimedia
{
    private int $id;
    private string $url;
    private string $yt;

    /**
     * @param int $id
     * @param string $url
     * @param string $yt
     */


    public function __construct(int $id, string $url, string $yt)
    {
        $this->id = $id;
        $this->url = $url;
        $this->yt = $yt;
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getYt(): string
    {
        return $this->yt;
    }



}