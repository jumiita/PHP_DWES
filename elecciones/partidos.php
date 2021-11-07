<?php
//En esta clase creamos los partidos politicos donde creamos los atributos,
// getter y setters donde llamaremos o meteremos la info necesaria.
class partidos
{
private $id;
private $name;
private $acronym;
private $logo;

    /**
     * @param $id
     * @param $name
     * @param $acronym
     * @param $logo
     */
    //Creamos un constructyor donde metemos los atributos como parametros
    public function __construct($id, $name, $acronym, $logo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->acronym = $acronym;
        $this->logo = $logo;
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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setNombre($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAcronym()
    {
        return $this->acronym;
    }

    /**
     * @param mixed $acronym
     */
    public function setAcronym($acronym)
    {
        $this->acronym = $acronym;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

}

?>