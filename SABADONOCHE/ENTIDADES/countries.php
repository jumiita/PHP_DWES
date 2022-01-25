<?php

class countries
{

    protected $Code;
    protected $Name;
    protected $Population;
    protected $GNP;
    protected $Capital;
    protected $UserId;

    /**
     * @param $Code
     * @param $Name
     * @param $Population
     * @param $GNP
     * @param $Capital
     * @param $UserId
     */
    public function __construct($Code, $Name, $Population, $GNP, $Capital, $UserId)
    {
        $this->Code = $Code;
        $this->Name = $Name;
        $this->Population = $Population;
        $this->GNP = $GNP;
        $this->Capital = $Capital;
        $this->UserId = $UserId;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->Code;
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
    public function getPopulation()
    {
        return $this->Population;
    }

    /**
     * @return mixed
     */
    public function getGNP()
    {
        return $this->GNP;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->Capital;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }

}