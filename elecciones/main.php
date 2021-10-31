<?php

include ("partidos.php");
include ("votos.php");
include ("resultados.php");

$api_url="https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$resultad = json_decode(file_get_contents($api_url . "results"), true);
$api_url= "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$districts = json_decode(file_get_contents($api_url . "districts"), true);
$api_url="https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$parties = json_decode(file_get_contents($api_url . "parties"), true);

//var_dump($districts);
//var_dump($parties);

//function getSortedDistricts($districts){
//    for ($i = 0; $i< count($districts);$i++){
//        for ($j =0; $j< count($districts);$j++){
//        if ($districts[$i]["id"] > $districts[$j]["id"] ){
//            $aux = $districts[$i]["id"] ;
//            $districts[$i]["id"] =$districts[$j]["id"] ;
//            $districts[$j]["id"] = $aux;
//        }
//        }
//    }
//    return $districts;
//}
//echo "<pre>";



function getObjctDistricts($districts){
    $objetoDistritos[] = array();
    for ($i = 0; $i< count($districts);$i++) {
        $objetoDistritos[$i] = new votos($districts[$i]["id"], $districts[$i]["name"], $districts[$i]["delegates"]);
    }
    return $objetoDistritos;
}
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
//var_dump(getObjctResultados($resultad));

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
//var_dump(getmapVotos($objctResultados));

?>



