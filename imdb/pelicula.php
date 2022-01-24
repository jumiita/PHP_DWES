<?php

include_once "sql.php";
include_once  "staff.php";
include_once  "multimedia.php";

class pelicula
{

    private string $id;
    private imagen $idMultimedia;
    private string $titulo;
    private string $genero;
    private int $puntuacion;
    private staff $idStaff;
    private string $descripcion;

    /**
     * @param string $id
     * @param imagen $idMultimedia
     * @param string $titulo
     * @param string $genero
     * @param int $puntuacion
     * @param staff $idStaff
     * @param string $descripcion
     */
    public function __construct(string $id, imagen $idMultimedia, string $titulo, string $genero, int $puntuacion, staff $idStaff, string $descripcion)
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return imagen
     */
    public function getIdMultimedia(): imagen
    {
        return $this->idMultimedia;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @return string
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * @return int
     */
    public function getPuntuacion(): int
    {
        return $this->puntuacion;
    }

    /**
     * @return staff
     */
    public function getIdStaff(): staff
    {
        return $this->idStaff;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }


}