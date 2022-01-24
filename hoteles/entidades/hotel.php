<?php
include_once "imagen.php";

class hotel
{

    private int $id;
    private int $ciudad_id;
    private array $multimedias;
    private string $nombre;
    private int $puntuacion;
    private string $regimen;
    private string $zona;
    private string $descripcion;

    /**
     * @param int $id
     * @param int $ciudad_id
     * @param imagen $multimedias
     * @param string $nombre
     * @param int $puntuacion
     * @param string $regimen
     * @param string $zona
     * @param string $descripcion
     */
    public function __construct(int $id, int $ciudad_id, array $multimedias, string $nombre, int $puntuacion, string $regimen, string $zona, string $descripcion)
    {
        $this->id = $id;
        $this->ciudad_id = $ciudad_id;
        $this->multimedias = $multimedias;
        $this->nombre = $nombre;
        $this->puntuacion = $puntuacion;
        $this->regimen = $regimen;
        $this->zona = $zona;
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCiudadId(): int
    {
        return $this->ciudad_id;
    }

    /**
     * @return multimedias
     */
    public function getMultimedias(): array
    {
        return $this->multimedias;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return int
     */
    public function getPuntuacion(): int
    {
        return $this->puntuacion;
    }

    /**
     * @return string
     */
    public function getRegimen(): string
    {
        return $this->regimen;
    }

    /**
     * @return string
     */
    public function getZona(): string
    {
        return $this->zona;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }


}