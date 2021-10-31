<?php

$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);

function mapCities()
{

    global $cities;
    global $countries;
    for ($i = 0; $i < count($cities); $i++) {
        for ($j = 0; $j < count($countries); $j++) {
            if ($cities[$i]["CountryCode"] == $countries[$j]["Code"]) {

                $cities[$i]["CountryName"] = $countries[$j]["Name"];
            }
        }

    }
    return $cities;
}

function mapCountries()
{
    global $countries;
    global $cities;
    for ($i = 0; $i < count($cities); $i++) {
        for ($j = 0; $j < count($countries); $j++) {
            if ($cities[$i]["CountryCode"] == $countries[$j]["Code"]) {
                $countries[$j]["Name"] = $cities[$i]["CountryName"];
            }
        }
    }
    return $countries;
}
echo "<pre>";

var_dump(mapCities());
var_dump(mapCountries());