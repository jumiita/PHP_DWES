<?php
class staff{
    private $id;
    private $director;
    private $protagonista;
    private $guion;
    private $reparto_principal;

    /**
     * @param $id
     * @param $director
     * @param $protagonista
     * @param $guion
     * @param $reparto_principal
     */
    public function __construct($id, $director, $protagonista, $guion, $reparto_principal)
    {
        $this->id = $id;
        $this->director = $director;
        $this->protagonista = $protagonista;
        $this->guion = $guion;
        $this->reparto_principal = $reparto_principal;
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
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @return mixed
     */
    public function getProtagonista()
    {
        return $this->protagonista;
    }

    /**
     * @return mixed
     */
    public function getGuion()
    {
        return $this->guion;
    }

    /**
     * @return mixed
     */
    public function getRepartoPrincipal()
    {
        return $this->reparto_principal;
    }

}