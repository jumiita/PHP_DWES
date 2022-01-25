<?php

include_once "../Models/singUpModel.php;";

$property = new singUpModel();
$property->getproperty_deprecated($id);
$property->buyProperty($propertyId);
$property->sellProperty($propertyId);



require_once "../Views/listaEditableVista.phtml";