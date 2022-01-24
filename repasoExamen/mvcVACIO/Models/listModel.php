<?php

include_once "../Entities/country.php";
include_once "../Entities/city.php";
include_once "../Entities/neighborhood.php";
include_once "../Entities/multimedias.php";
include_once "../Entities/states.php";
include_once "../Entities/property.php";
include_once "../DB/dbo.php";
//
class  listModel{

    private dbo $db;

    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getCity($id){
    $sql = "select * from cities where id=" .$id;
    $this->db->default();
    $query = $this->db->query($sql);
    $this->db->close();
    $result = $query->fetch_assoc();
        return new city($result['id'],$result['name']);
    }
    public function getCountry($id){
        $id = 724;
        $sql = "SELECT * FROM countries WHERE id=".$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new country($result['id'],$result['name']);
    }
    public function getState($id){
        $sql = "select * from states where id=" .$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new states($result['id'],$result['name']);
    }
    public function getNeighborhood($id){
        $id = 1021;
        $sql = "select * from neighborhoods where id=" .$id;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return new neighborhood($result['id'],$result['name']);
    }
    public function get_properties(){
        $sql = "SELECT * FROM properties;";
        $this->db->default();
        $query =  $this->db->query($sql);
        $this->db->close();
        $return = array();
        while($result = $query->fetch_assoc()){
            $return[] = new property($result["id"],$this->getCountry($result["contryId"]),$this->getState($result['stateId']),
                $this->getCity($result['cityId']),$this->getNeighborhood($result['neighborhoodId']),$result['zipcode'],
                $result['latitude'],$result['longitude'],$result['date'],$result['description'],$result['bathrooms'],$result['floor'],$result['surface'],$result['price']);
        }
        return $return;
    }

}