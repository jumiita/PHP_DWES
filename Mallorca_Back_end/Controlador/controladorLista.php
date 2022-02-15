<?php

require_once "../Modelos/modeloLista.php";

$modelo = new modeloLista();

$properties = $modelo->getProperty();

$return = array(
    "properties" => $modelo->getProperty(),
    "selectedPropertyId" => "",
    "selectedProperty"=> "",
    "selectedLatitud"=> 39,650112,
    "selectedLongitud"=>2.932662,
    "zoom"=>10
);
if (isset($_GET["propertyId"])) {
    $selectedProperty = $modelo->getPropertyById($_GET["propertyId"]);
    $return = array(
        "properties" => $modelo->getProperty(),
        "selectedPropertyId" => $_GET["propertyId"],
        "selectedProperty" => $selectedProperty,
        "selectedLatitude" => $selectedProperty->getLatitude(),
        "selectedLongitude" => $selectedProperty->getLongitude(),
        "zoom" => 15);
}

var_dump($return);
echo json_encode($return);

