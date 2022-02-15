<?php

include_once "../Entidades/users.php";
include_once "../Entidades/countries.php";
include_once "../Entidades/cities.php";
include_once "../Entidades/neighborhoods.php";
include_once "../Entidades/states.php";
include_once "../Entidades/properties.php";
include_once  "../Entidades/multimedias.php";
require_once "../DBO/dbo.php";

class modeloLista
{

    public $dbo ;

    public function __construct(){
        $this->dbo = new dbo();

    }

    public function getCitiesById($id): cities
    {
        $sql = "SELECT * FROM `cities` WHERE `id` = ".$id.";";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $result = $query->fetch_assoc();
        return  new cities($result['id'],$result['name']);
    }

    public function getCountriesById($id): countries
    {
        $sql = "SELECT * FROM `countries` WHERE id=".$id.";";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $result = $query->fetch_assoc();
        $return =   new countries($result['id'],$result['name']);
        return $return;
    }
    public function getNeighborhoodsById($id): neighborhoods
    {
        $sql = "SELECT * FROM `neighborhoods` WHERE id=".$id.";";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $result = $query->fetch_assoc();
        $return = new neighborhoods($result['id'],$result['name']);
        return $return;
    }

    public function getMultimediasById($propertyId): array
    {
        $sql = "SELECT * FROM `multimedias` WHERE `propertyId` = ".$propertyId.";";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $return = array();
        while ($result = $query->fetch_assoc()){
            $return [] = new multimedias($result['id'],$result['propertyId'],$result['url']);
        }
        return $return;
    }

    public function getStatesbyId($id): states
    {
        $sql = "SELECT * FROM `states` WHERE id=".$id.";";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $result = $query->fetch_assoc();
        return new states($result['id'],$result['name']);
    }

    public function getUserById($id){
        if (!is_null($id)){
            $sql = "SELECT * FROM `users` WHERE `id` =".$id.";";
            $this->dbo->default();
            $query= $this->dbo->query($sql);
            $this->dbo->close();
            $result = $query->fetch_assoc();
            return new users($result['id'],$result['mail'],$result['password']);
        }else{
          return new users(0,"-","-");
        }
    }

    public function getProperty(): array
    {
        $sql = "SELECT * FROM `properties` WHERE userId IS NULL;";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
        $result[] = new properties($result['id'],$this->getCountriesById($result['countryId']),
            $this->getStatesbyId($result['stateId']),$this->getCitiesById($result['cityId']),
            $this->getNeighborhoodsById($result['neighborhoodId']),$result['zipcode'],
            $result['latitude'],$result['longitude'],$result['date'],$result['description'],
            $result['bathrooms'],$result['floor'],$result['rooms'],$result['surface'],
            $result['price'],$this->getUserById($result['userId']),$this->getMultimediasById($result['id']));
        }
        return $return;
    }
    public function getPropertyById($propertyId): array
    {
        $sql = "SELECT * FROM `properties` WHERE `id`=".$propertyId.";";
        $this->dbo->default();
        $query= $this->dbo->query($sql);
        $this->dbo->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $result [] = new properties($result['id'],$this->getCountriesById($result['countryId']),
                $this->getStatesbyId($result['stateId']),$this->getCitiesById($result['cityId']),
                $this->getNeighborhoodsById($result['neighborhoodId']),$result['zipcode'],
                $result['latitude'],$result['longitude'],$result['date'],$result['description'],
                $result['bathrooms'],$result['floor'],$result['rooms'],$result['surface'],
                $result['price'],$this->getUserById($result['userId']),$this->getMultimediasById($result['id']));
        }
        return $return;
    }

}