<?php


include_once "sql.php";
include_once "pelicula.php";
include_once  "multimedia.php";
include_once "usuarios.php";

class staff
{

    private int $id;
    private string $director;
    private string $protagonista;
    private string $guion;
    private string $reparto_principal;

    /**
     * @param int $id
     * @param string $director
     * @param string $protagonista
     * @param string $guion
     * @param string $reparto_principal
     */
    public function __construct(int $id, string $director, string $protagonista, string $guion, string $reparto_principal)
    {
        $this->id = $id;
        $this->director = $director;
        $this->protagonista = $protagonista;
        $this->guion = $guion;
        $this->reparto_principal = $reparto_principal;
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
    public function getDirector(): string
    {
        return $this->director;
    }

    /**
     * @return string
     */
    public function getProtagonista(): string
    {
        return $this->protagonista;
    }

    /**
     * @return string
     */
    public function getGuion(): string
    {
        return $this->guion;
    }

    /**
     * @return string
     */
    public function getRepartoPrincipal(): string
    {
        return $this->reparto_principal;
    }
}