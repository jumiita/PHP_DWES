<?php

include_once "sql.php";
include_once "pelicula.php";
include_once  "multimedia.php";
include_once  "staff.php";

class comentarios
{
    private int $id;
    private string $comentario;
    private string $idPelicula;
    private string $idUsuario;

    /**
     * @param int $id
     * @param string $comentario
     * @param string $idPelicula
     * @param string $idUsuario
     */
    public function __construct(int $id, string $comentario, string $idPelicula, string $idUsuario)
    {
        $this->id = $id;
        $this->comentario = $comentario;
        $this->idPelicula = $idPelicula;
        $this->idUsuario = $idUsuario;
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
    public function getComentario(): string
    {
        return $this->comentario;
    }

    /**
     * @return string
     */
    public function getIdPelicula(): string
    {
        return $this->idPelicula;
    }

    /**
     * @return string
     */
    public function getIdUsuario(): string
    {
        return $this->idUsuario;
    }


}