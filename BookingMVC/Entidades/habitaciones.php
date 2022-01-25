<?php

class habitaciones
{

    protected $id;
    protected $precio;
    protected $num_camas;
    protected  $num_pers;
    protected  $id_hotel;

    /**
     * @param $id
     * @param $precio
     * @param $num_camas
     * @param $num_pers
     * @param $id_hotel
     */
    public function __construct($id, $precio, $num_camas, $num_pers, $id_hotel)
    {
        $this->id = $id;
        $this->precio = $precio;
        $this->num_camas = $num_camas;
        $this->num_pers = $num_pers;
        $this->id_hotel = $id_hotel;
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
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getNumCamas()
    {
        return $this->num_camas;
    }

    /**
     * @return mixed
     */
    public function getNumPers()
    {
        return $this->num_pers;
    }

    /**
     * @return mixed
     */
    public function getIdHotel()
    {
        return $this->id_hotel;
    }


}