<?php

include ("partidos.php");
include("provincias.php");
include ("resultados.php");

$api_url="https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$resultad = json_decode(file_get_contents($api_url . "results"), true);
$api_url= "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$districts = json_decode(file_get_contents($api_url . "districts"), true);
$api_url="https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$parties = json_decode(file_get_contents($api_url . "parties"), true);



function getObjctDistricts($districts){
    $objetoDistritos[] = array();
    for ($i = 0; $i< count($districts);$i++) {
        $objetoDistritos[$i] = new provincias($districts[$i]["id"], $districts[$i]["name"], $districts[$i]["delegates"]);
    }
    return $objetoDistritos;
}
//echo "<pre>";
//var_dump(getObjctDistricts($districts));




function getObjctParties($parties){
    $Objetopartidos[] = array();
    for ($i =0; $i < count($parties);$i++){
        $Objetopartidos[$i] =  new partidos($parties[$i]["id"],$parties[$i]["name"],$parties[$i]["acronym"],$parties[$i]["logo"]);
    }
    return$Objetopartidos;
}
//var_dump(getObjctParties($parties));



function getObjctResultados($resultad){
    $objctResultados[] = array();
    for ($i = 0 ; $i < count($resultad);$i++){
        $objctResultados[$i] =  new resultados($resultad[$i]["district"],$resultad[$i]["party"],$resultad[$i]["votes"]);
    }
    return$objctResultados;
}

$objctResultados = getObjctResultados($resultad);
$objetoDistritos = getObjctDistricts($districts);
$objetoPartidos = getObjctParties($parties);

//echo "<pre>";
//var_dump(getmapVotos($objctResultados));


function getresult($objctResultados){
    $provin = array();
    for ($i = 0 ; $i < count($objctResultados);$i++){
        if (isset($_POST["district"])) {
            if ($objctResultados[$i]->getDistrict()==$_POST["district"]) {
                $provin[$i] = $objctResultados[$i];
            }
        }
    }
return $provin;
}


//echo "<pre>";
//var_dump(getresult($objctResultados));



function getmapVotos($objctResultados){
    for ($i= 0;$i <count($objctResultados);$i++){
        for ($j =0;$j <count($objctResultados);$j++){
           if($objctResultados[$i]->getVotes()> $objctResultados[$j]->getVotes()){
               $aux = $objctResultados[$i];
               $objctResultados[$i] = $objctResultados[$j];
               $objctResultados[$j] = $aux;
           }
            }
        }
    return $objctResultados;
}

//echo "<pre>";
//var_dump(getmapNombres($objctResultados));

//Ordena Alfabeticamente pero lo que nos interesa que nos da los distritos juntos por ejemplo "todo madrid, todo avila"
function getmapNombres($objctResultados){
    for ($i= 0;$i <count($objctResultados);$i++){
        for ($j =0;$j <count($objctResultados);$j++){
            if($objctResultados[$i]->getDistrict()> $objctResultados[$j]->getDistrict()){
                $aux = $objctResultados[$i];
                $objctResultados[$i] = $objctResultados[$j];
                $objctResultados[$j] = $aux;
            }
        }
    }
    return $objctResultados;
}
$ordenadoDis = getmapNombres($objctResultados);

function losVotos($ordenadoDis){
    for ($i = 0 ; $i < count($ordenadoDis);$i++){

    }
}

?>

<html lang="es">
<head>
    <title>Election Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 12px;
            padding-right: 12px;
        }
    </style>
</head>
<body>
<form action="main.php" method="post">
    <select name=district">
        <option value=''>Selecciona una circumscripción</option>
        <option  value='Madrid'>Madrid</option>
        <option  value='2'>Barcelona</option>
        <option  value='3'>València</option>
        <option  value='4'>Alacant</option>
        <option  value='5'>Sevilla</option>
        <option  value='6'>Málaga</option>
        <option  value='7'>Murcia</option>
        <option  value='8'>Cádiz</option>
        <option  value='9'>Illes Balears</option>
        <option  value='10'>A Coruña</option>
        <option  value='11'>Las Palmas</option>
        <option  value='12'>Bizkaia</option>
        <option  value='13'>Asturias</option>
        <option  value='14'>Granada</option>
        <option  value='15'>Pontevedra</option>
        <option  value='16'>Santa Cruz de Tenerife</option>
        <option  value='17'>Zaragoza</option>
        <option  value='18'>Almería</option>
        <option  value='19'>Badajoz</option>
        <option  value='20'>Córdoba</option>
        <option  value='21'>Girona</option>
        <option  value='22'>Gipuzkoa</option>
        <option  value='23'>Tarragona</option>
        <option  value='24'>Toledo</option>
        <option  value='25'>Cantabria</option>
        <option  value='26'>Castelló</option>
        <option  value='27'>Ciudad Real</option>
        <option  value='28'>Huelva</option>
        <option  value='29'>Jaén</option>
        <option  value='30'>Navarra</option>
        <option  value='31'>Valladolid</option>
        <option  value='32'>Araba</option>
        <option  value='33'>Albacete</option>
        <option  value='34'>Burgos</option>
        <option  value='35'>Cáceres</option>
        <option  value='36'>León</option>
        <option  value='37'>Lleida</option>
        <option  value='38'>Lugo</option>
        <option  value='39'>Ourense</option>
        <option  value='40'>La Rioja</option>
        <option  value='41'>Salamanca</option>
        <option  value='42'>Ávila</option>
        <option  value='43'>Cuenca</option>
        <option  value='44'>Guadalajara</option>
        <option  value='45'>Huesca</option>
        <option  value='46'>Palencia</option>
        <option  value='47'>Segovia</option>
        <option  value='48'>Teruel</option>
        <option  value='49'>Zamora</option>
        <option  value='50'>Soria</option>
        <option  value='51'>Ceuta</option>
        <option  value='52'>Melilla</option>
    </select>
    <input type="submit" value="Filtra"/>
</form>
<table>
</table>
</body>

