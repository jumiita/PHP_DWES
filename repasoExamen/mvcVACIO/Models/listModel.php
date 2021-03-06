<?php

include_once "../Entities/country.php";
include_once "../Entities/city.php";
include_once "../Entities/neighborhood.php";
include_once "../Entities/multimedias.php";
include_once "../Entities/state.php";
include_once "../Entities/property.php";
include_once "../DB/dbo.php";
//
class  listModel{

    private dbo $db;

    public function __construct(){
        $this->db = new dbo();
    }

    public function getCity($id): city
    {
    $sql = "select * from cities where id=" .$id;
    $this->db->default();
    $query = $this->db->query($sql);
    $this->db->close();
    $result = $query->fetch_assoc();
        return new city($result['id'],$result['name']);
    }
    public function getCountry($id): country
    {
        $sql = "SELECT * FROM countries WHERE id=".$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new country($result['id'],$result['name']);
    }
    public function getState($id): state
    {
        $sql = "select * from state where id=" .$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new state($result['id'],$result['name']);
    }
    public function getNeighborhood($id): neighborhood
    {
        $sql = "select * from neighborhoods where id=" .$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new neighborhood($result['id'],$result['name']);
    }
    public function get_properties(): array
    {
        $sql = "SELECT * FROM properties;";
        $this->db->default();
        $query =  $this->db->query($sql);
        $this->db->close();
        $return = array();
        while($result = $query->fetch_assoc()){
            $return[] = new property($result["id"],$this->getCountry($result["countryId"]),$this->getState($result['stateId']),
                $this->getCity($result['cityId']),$this->getNeighborhood($result['neighborhoodId']),$result['zipcode'],
                $result['latitude'],$result['longitude'], $result['date'],$result['description'],$result['bathrooms'],$result['floor'],$result['surface'],$result['price'],$this->get_imagen($result["id"]));
        }
        return $return;
    }
    function get_imagen($propertyId): array
    {
        $sql = "SELECT * FROM `multimedias` WHERE propertyId =".$propertyId;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while($result = $query->fetch_assoc()){
            $return[] = new multimedias($result['id'],$result['propertyId'],$result['url']);
        }
        return $return;
    }

}