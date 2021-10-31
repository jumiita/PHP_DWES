<?php

class locations
{

    private $id;
    private $name;
    private $type;
    private $dimensio;
    private $created;
    private  $residents;

    /**
     * @param $id
     * @param $name
     * @param $type
     * @param $dimensio
     * @param $created
     * @param $residents
     */
    public function __construct($id, $name, $type, $dimensio, $created, $residents)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->dimensio = $dimensio;
        $this->created = $created;
        $this->residents = $residents;
    }


    /**
     * @return mixed
     */
    public function getResidents()
    {
        return $this->residents;
    }

    /**
     * @param mixed $residents
     * @return locations
     */
    public function setResidents($residents)
    {
        $this->residents = $residents;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return locations
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return locations
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return locations
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDimensio()
    {
        return $this->dimensio;
    }

    /**
     * @param mixed $dimensio
     * @return locations
     */
    public function setDimensio($dimensio)
    {
        $this->dimensio = $dimensio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return locations
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }



}