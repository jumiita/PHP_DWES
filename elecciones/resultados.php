<?php
//En esta clase creamos los resultados politicos donde creamos los atributos,
// getter y setters donde llamaremos o meteremos la info necesaria.
class resultados
{
private $district;
private $party;
private $votes;

// podria estar bien tener un identificador "id" y "escaños"

    /**
     * @param $district
     * @param $party
     * @param $votes
     */
    //Creamos un constructyor donde metemos los atributos como parametros
    public function __construct($district, $party, $votes)
    {
        $this->district = $district;
        $this->party = $party;
        $this->votes = $votes;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getParty()
    {
        return $this->party;
    }

    /**
     * @param mixed $party
     */
    public function setParty($party)
    {
        $this->party = $party;
    }

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }


}