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

function getObjctParties($parties){
    $Objetopartidos[] = array();
    for ($i =0; $i < count($parties);$i++){
        $Objetopartidos[$i] =  new partidos($parties[$i]["id"],$parties[$i]["name"],$parties[$i]["acronym"],$parties[$i]["logo"]);
    }
    return$Objetopartidos;
}

function getObjctResultados($resultad){
    //$objctResultados[] = array();
    //for ($i = 0 ; $i < count($resultad);$i++){
    //    $objctResultados[$i] =  new resultados($resultad[$i]["district"],$resultad[$i]["party"],$resultad[$i]["votes"]);
    //}
    //return$objctResultados;

    //////////////////////////////////////////////////////////////////////

    $objctResultados[] = array();
    $count = 0;
    foreach($resultad as $objeto){
        $objctResultados[$count] =  new resultados($objeto["district"],$objeto["party"],$objeto["votes"]);
        $count++;
    }

    return$objctResultados;
}

$objctResultados = getObjctResultados($resultad);
$objetoDistritos = getObjctDistricts($districts);
$objetoPartidos = getObjctParties($parties);

function abro_tabla(){
    echo "<table>";
        echo "<tbody>";
            echo "<tr>";
                echo "<th>Circumscripción</th>";
                echo "<th>Partido</th>";
                echo "<th>Votos</th>";
                echo "<th>Escaños</th>";
            echo "</tr>";
}

function cierro_tabla(){
        echo "</tbody>";
    echo "</table>";
}

function get_id_district_selected($objetoDistritos){
    $distric_selected = '';
    foreach($objetoDistritos as $distrito) {
        // Recorremos los distritos en busca de el id seleccionado.
        if($distrito->getId() == $_POST['district']){
            $distric_selected = $distrito->getNombre();
        }
    }
    return $distric_selected;
}

function print_td_by_district_selected($objctResultados, $distric_selected){
    foreach($objctResultados as $resultado) {
        // Obtenemos tantas row como resultados encontremos en los distritos
        if($resultado->getDistrict() == $distric_selected){
            echo "<tr>";
                echo "<td>".$resultado->getDistrict()."</td>";
                echo "<td>".$resultado->getParty()."</td>";
                echo "<td>".$resultado->getVotes()."</td>";
                echo "<td>10</td>";
            echo "</tr>";
        }
    }
}

$seleccion = get_id_district_selected($objetoDistritos) ;

function get_votos_by_result($objctResultados,$seleccion){
    // Creamos un array vacio donde meteremos los votos según la selcción que cogemos.
    $totalVotos[]= array();
        $count = 0;
        //recoremos el array de resultados para que meta en el array todos los votos siempre y cuando el nombre del distrito es igual a la selección.
    foreach ($objctResultados as $resultado) {
        if ($resultado->getDistrict() == $seleccion) {
            $totalVotos[$count] = $resultado->getvotes();
            $count++;
        }
    }
    //////////////////////////////////////////////////
    //////////////// CALCULAR LOS VOTOS //////////////
    //////////////////////////////////////////////////
    print_r($totalVotos);
    }

//$objctResultados[] = array();
//    $count = 0;
//    foreach($resultad as $objeto){
//        $objctResultados[$count] =  new resultados($objeto["district"],$objeto["party"],$objeto["votes"]);
//        $count++;
//    }
//
//    return$objctResultados;
//}

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
      <select name="district">
        <option value="">Selecciona una circumscripción</option>
        <option value="1">Madrid</option>
        <option value="2">Barcelona</option>
        <option value="3">València</option>
        <option value="4">Alacant</option>
        <option value="5">Sevilla</option>
        <option value="6">Málaga</option>
        <option value="7">Murcia</option>
        <option value="8">Cádiz</option>
        <option value="9">Illes Balears</option>
        <option value="10">A Coruña</option>
        <option value="11">Las Palmas</option>
        <option value="12">Bizkaia</option>
        <option value="13">Asturias</option>
        <option value="14">Granada</option>
        <option value="15">Pontevedra</option>
        <option value="16">Santa Cruz de Tenerife</option>
        <option value="17">Zaragoza</option>
        <option value="18">Almería</option>
        <option value="19">Badajoz</option>
        <option value="20">Córdoba</option>
        <option value="21">Girona</option>
        <option value="22">Gipuzkoa</option>
        <option value="23">Tarragona</option>
        <option value="24">Toledo</option>
        <option value="25">Cantabria</option>
        <option value="26">Castelló</option>
        <option value="27">Ciudad Real</option>
        <option value="28">Huelva</option>
        <option value="29">Jaén</option>
        <option value="30">Navarra</option>
        <option value="31">Valladolid</option>
        <option value="32">Araba</option>
        <option value="33">Albacete</option>
        <option value="34">Burgos</option>
        <option value="35">Cáceres</option>
        <option value="36">León</option>
        <option value="37">Lleida</option>
        <option value="38">Lugo</option>
        <option value="39">Ourense</option>
        <option value="40">La Rioja</option>
        <option value="41">Salamanca</option>
        <option value="42">Ávila</option>
        <option value="43">Cuenca</option>
        <option value="44">Guadalajara</option>
        <option value="45">Huesca</option>
        <option value="46">Palencia</option>
        <option value="47">Segovia</option>
        <option value="48">Teruel</option>
        <option value="49">Zamora</option>
        <option value="50">Soria</option>
        <option value="51">Ceuta</option>
        <option value="52">Melilla</option>
      </select>
      <input type="submit" value="Filtra"/>
    </form>
    <?php
    if(isset($_POST['district'])) {
    
        $distric_selected = get_id_district_selected($objetoDistritos);
        abro_tabla();

        print_td_by_district_selected($objctResultados, $distric_selected);

        cierro_tabla();
        get_votos_by_result($objctResultados,$seleccion);
    }
    ?>

</body>





    