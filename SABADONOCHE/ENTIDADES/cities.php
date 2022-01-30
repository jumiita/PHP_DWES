<?php

class cities
{
protected $ID;
protected $Name;
protected $CountryCode;

    /**
     * @param $ID
     * @param $Name
     * @param $CountryCode
     */
    public function __construct($ID, $Name, $CountryCode)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->CountryCode = $CountryCode;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->CountryCode;
    }


}