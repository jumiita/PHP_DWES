<?php

class multimediaa
{

    private int $id;
    private string $imagen;
    private int $id_hotel;

    /**
     * @param int $id
     * @param string $imagen
     * * @param int $id_hotel
     */
    public function __construct(int $id, string $imagen, int $id_hotel)
    {
        $this->id = $id;
        $this->imagen = $imagen;
        $this->id_hotel = $id_hotel;
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
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * @return int
     */
    public function getIdHotel(): int
    {
        return $this->id_hotel;
    }



}