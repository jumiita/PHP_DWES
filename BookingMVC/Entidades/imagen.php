<?php

class imagen
{
    protected $id;
    protected $id_hotel;
    protected $url;

    /**
     * @param $id
     * @param $id_hotel
     * @param $url
     */
    public function __construct($id, $id_hotel, $url)
    {
        $this->id = $id;
        $this->id_hotel = $id_hotel;
        $this->url = $url;
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
    public function getIdHotel()
    {
        return $this->id_hotel;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


}