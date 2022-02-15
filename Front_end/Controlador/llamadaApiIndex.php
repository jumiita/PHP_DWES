<?php

$hoteles = json_decode(file_get_contents("http://localhost/jFernandezTema2/BokingAPI/Controlador/controladorApi.php"));


require_once "../indexApi.phtml";
