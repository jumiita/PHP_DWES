<?php
include_once "sql.php";
include_once "pelicula.php";
include_once  "multimedia.php";
include_once  "staff.php";

class innerjoin
{
    private  string $comentario;
    private  string $titulo;
    private  string $nombre;
    private  string $puntuacion;
    private int $id;
    private int $puntuacioon;

    /**
     * @param string $comentario
     * @param string $titulo
     * @param string $nombre
     * @param string $puntuacion
     * @param int $id
     * @param int $puntuacioon;
     */
    public function __construct(string $comentario, string $titulo, string $nombre, string $puntuacion,int $id,int $puntuacioon)
    {
        $this->comentario = $comentario;
        $this->titulo = $titulo;
        $this->nombre = $nombre;
        $this->puntuacion = $puntuacion;
        $this->id = $id;
        $this->puntuacioon= $puntuacioon;
    }

    /**
     * @return int
     */
    public function getPuntuacioon(): int
    {
        return $this->puntuacioon;
    }

    /**
     * @return string
     */
    public function getComentario(): string
    {
        return $this->comentario;
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
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    public function getPuntuacion(): string
    {
        return $this->puntuacion;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}