<?php

include_once "../Entities/country.php";
include_once "../Entities/city.php";
include_once "../Entities/neighborhoods.php";
include_once "../Entities/multimedias.php";
include_once "../Entities/states.php";
include_once  "../Entities/property.php";
include_once  "../DB/dbo.php";

class  listModel{

    private dbo $db;

    public function __construct()
    {
        $this->db = new dbo();
    }
    public function get_properties(){
        $sql = "SELECT * FROM properties;";
        $this->db->default();
        $query =  $this->query($sql);
        $this->close();
        $return = array();
        while($result = $query->fetch_assoc()){
            $return[] = new property($result["id"],$this->getCountry($result["contryId"]),$this->getState($result['stateId']),
                $this->getCity($result['cityId']),$this->getNeighborhood($result['neighborhood']),$result['zipcode'],
                $result['latitude'],$result['date'],$result['description'],$result['bathrooms'],$result['floor'],$result['surface'],$result['price']);
        }
        return $return;
    }

}