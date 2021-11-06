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

//$seleccion = get_id_district_selected($objetoDistritos) ;

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


?>


<html lang="es">
<head>
    <title>Election Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/ammap.js"></script>
    <script type="text/javascript" charset="UTF-8" src="scripts/spainProvincesLow.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        select {
            margin-bottom: 10px;
        }

        body {
            margin: 20px
        }
    </style>
    <script type="text/javascript">
        var map = AmCharts.makeChart("map", {
            "type": "map",
            "pathToImages": "http://www.amcharts.com/lib/3/images/",
            "addClassNames": true,
            "fontSize": 15,
            "color": "#FFFFFF",
            "projection": "mercator",
            "backgroundAlpha": 1,
            "backgroundColor": "rgba(80,80,80,1)",
            "dataProvider": {
                "map": "spainProvincesLow",
                "getAreasFromMap": true,
                "areas": [
                ]
            },
            "balloon": {
                "horizontalPadding": 15,
                "borderAlpha": 0,
                "borderThickness": 1,
                "verticalPadding": 15
            },
            "areasSettings": {
                "color": "rgba(129,129,129,1)",
                "outlineColor": "rgba(80,80,80,1)",
                "rollOverOutlineColor": "rgba(80,80,80,1)",
                "rollOverBrightness": 20,
                "selectedBrightness": 20,
                "selectable": true,
                "unlistedAreasAlpha": 0,
                "unlistedAreasOutlineAlpha": 0
            },
            "imagesSettings": {
                "alpha": 1,
                "color": "rgba(129,129,129,1)",
                "outlineAlpha": 0,
                "rollOverOutlineAlpha": 0,
                "outlineColor": "rgba(80,80,80,1)",
                "rollOverBrightness": 20,
                "selectedBrightness": 20,
                "selectable": true
            },
            "linesSettings": {
                "color": "rgba(129,129,129,1)",
                "selectable": true,
                "rollOverBrightness": 20,
                "selectedBrightness": 20
            },
            "zoomControl": {
                "zoomControlEnabled": true,
                "homeButtonEnabled": false,
                "panControlEnabled": false,
                "right": 38,
                "bottom": 30,
                "minZoomLevel": 0.25,
                "gridHeight": 100,
                "gridAlpha": 0.1,
                "gridBackgroundAlpha": 0,
                "gridColor": "#FFFFFF",
                "draggerAlpha": 1,
                "buttonCornerRadius": 2
            }
        });

        map.addListener("clickMapObject", function (event) {
            $(location).attr('href', "?filterBy=districts&district=" + event.mapObject.id);
        });

        function filterTypeChange() {
            var filterType = document.getElementById("filterBy").value;
            if (filterType == "districts") {
                $("#filterDistrict").removeClass("d-none").addClass("d-block");
                $("#filterParty").removeClass("d-block").addClass("d-none");
            } else if (filterType == "parties") {
                $("#filterParty").removeClass("d-none").addClass("d-block");
                $("#filterDistrict").removeClass("d-block").addClass("d-none");
            } else if (filterType == "") {
                $("#filterParty").removeClass("d-block").addClass("d-none");
                $("#filterDistrict").removeClass("d-block").addClass("d-none");
                $(location).attr('href', "map.php");
            } else if (filterType == "global") {
                $("#filterParty").removeClass("d-block").addClass("d-none");
                $("#filterDistrict").removeClass("d-block").addClass("d-none");
                filter();
            }
        }

        function filter() {
            $("#filterForm").submit();
        }
    </script>
</head>
<body>

<?php

?>
<form action="pruebas.php" method="get" id="filterForm">
    <div class="form-group">
        <select class="form-control" name="filterBy" id="filterBy" onchange="filterTypeChange()">
            <option value="">Seleccionar filtrado</option>
            <option value="global" >Resultados generales</option>
            <option value="districts" >Filtrar por provincia
            </option>
            <option value="parties" >Filtrar por partido</option>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control d-none" name="district"
                id="filterDistrict" onchange="filter()">
            <option value=''>Selecciona una circumscripción</option>
            <option  value='1'>Madrid</option>
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
    </div>
    <div class="form-group">
        <select class="form-control d-none" name="party" id="filterParty"
                onchange="filter()">
            <option value=''>Selecciona un partido</option>
            <option  value='1'>PARTIDO SOCIALISTA OBRERO ESPAÑOL</option>
            <option  value='2'>PARTIDO POPULAR</option>
            <option  value='3'>VOX</option>
            <option  value='4'>UNIDAS PODEMOS</option>
            <option  value='5'>CIUDADANOS-PARTIDO DE LA CIUDADANÍA</option>
            <option  value='6'>ESQUERRA REPUBLICANA DE CATALUNYA-SOBIRANISTES</option>
            <option  value='7'>EN COMÚ PODEM-GUANYEM EL CANVI</option>
            <option  value='8'>JUNTS PER CATALUNYA-JUNTS</option>
            <option  value='9'>EUZKO ALDERDI JELTZALEA-PARTIDO NACIONALISTA VASCO</option>
            <option  value='10'>MÁS PAÍS-EQUO</option>
            <option  value='11'>EUSKAL HERRIA BILDU</option>
            <option  value='12'>CANDIDATURA D'UNITAT POPULAR-PER LA RUPTURA</option>
            <option  value='13'>PARTIDO ANIMALISTA CONTRA EL MALTRATO ANIMAL</option>
            <option  value='14'>EN COMÚN-UNIDAS PODEMOS</option>
            <option  value='15'>MÉS COMPROMÍS</option>
            <option  value='16'>COALICIÓN CANARIA-NUEVA CANARIAS</option>
            <option  value='17'>BLOQUE NACIONALISTA GALEGO</option>
            <option  value='18'>NAVARRA SUMA</option>
            <option  value='19'>PARTIDO REGIONALISTA DE CANTABRIA</option>
            <option  value='20'>MÁS PAÍS</option>
            <option  value='21'>RECORTES CERO-GRUPO VERDE</option>
            <option  value='22'>POR UN MUNDO MÁS JUSTO</option>
            <option  value='23'>MÁS PAÍS-CHUNTA ARAGONESISTA-EQUO</option>
            <option  value='24'>AGRUPACIÓN DE ELECTORES TERUEL EXISTE</option>
            <option  value='25'>MÉS ESQUERRA</option>
            <option  value='26'>ANDALUCÍA POR SÍ</option>
            <option  value='27'>PARTIDO COMUNISTA DE LOS PUEBLOS DE ESPAÑA</option>
            <option  value='28'>PARTIDO COMUNISTA DE LOS TRABAJADORES DE ESPAÑA</option>
            <option  value='29'>GEROA BAI</option>
            <option  value='30'>UNIÓN DEL PUEBLO LEONÉS</option>
            <option  value='31'>PARTIDO COMUNISTA OBRERO ESPAÑOL</option>
            <option  value='32'>COALICIÓN POR MELILLA</option>
            <option  value='33'>ESCAÑOS EN BLANCO</option>
            <option  value='34'>ESQUERRA REPUBLICANA DEL PAÍS VALENCIÀ</option>
            <option  value='35'>POR ÁVILA</option>
            <option  value='36'>AVANT ADELANTE LOS VERDES</option>
            <option  value='37'>LOS VERDES</option>
            <option  value='38'>PARTIDO HUMANISTA</option>
            <option  value='39'>INICIATIVA FEMINISTA</option>
            <option  value='40'>SOM VALENCIANS EN MOVIMENT</option>
            <option  value='41'>SOMOS REGIÓN</option>
            <option  value='42'>IZQUIERDA EN POSITIVO</option>
            <option  value='43'>AHORA CANARIAS: Alternativa Nacionalista Canaria (ANC) y Unidad del Pueblo</option>
            <option  value='44'>CONTIGO SOMOS DEMOCRACIA</option>
            <option  value='45'>CHUNTA ARAGONESISTA</option>
            <option  value='46'>PLATAFORMA DEL PUEBLO SORIANO</option>
            <option  value='47'>EXTREMADURA UNIDA</option>
            <option  value='48'>PARTIDO DEMÓCRATA SOCIAL JUBILADOS EUROPEOS</option>
            <option  value='49'>PARTIDO LIBERTARIO</option>
            <option  value='50'>MOVIMIENTO ARAGONES SOCIAL</option>
            <option  value='51'>UNIDOS Actuando por la Democracia</option>
            <option  value='52'>PARTIDO REGIONALISTA DEL PAÍS LEONÉS</option>
            <option  value='53'>ANDECHA ASTUR</option>
            <option  value='54'>MOVIMIENTO POR LA DIGNIDAD Y LA CIUDADANÍA DE CEUTA</option>
            <option  value='55'>PUYALON</option>
            <option  value='56'>FALANGE ESPAÑOLA DE LAS JONS</option>
            <option  value='57'>AUNA COMUNITAT VALENCIANA</option>
            <option  value='58'>UNIÓN REGIONALISTA DE CASTILLA Y LEÓN</option>
            <option  value='59'>CONVERGENCIA ANDALUZA</option>
            <option  value='60'>FEDERACIÓN DE LOS INDEPENDIENTES DE ARAGÓN</option>
            <option  value='61'>PARTIDO DE ACCIÓN SOLIDARIA EUROPEA</option>
            <option  value='62'>PARTIDO REPUBLICANO INDEPENDIENTE SOLIDARIO ANDALUZ</option>
            <option  value='63'>CENTRADOS</option>
            <option  value='64'>DEMOCRACIA PLURAL</option>
            <option  value='65'>IZQUIERDA ANTICAPITALISTA REVOLUCIONARIA</option>
            <option  value='66'>CONVERXENCIA 21</option>
            <option  value='67'>UNIÓN DE TODOS</option>
        </select>
    </div>
    <input class="d-none" type="submit" value="Filtra"/>
</form>


</body>

<?php
    if(isset($_POST['district'])) {


        $distric_selected = get_id_district_selected($objetoDistritos);
        abro_tabla();

        print_td_by_district_selected($objctResultados, $distric_selected);

        cierro_tabla();
       // get_votos_by_result($objctResultados,$seleccion);

        // crivado_votos_tresPorciento($objctResultados);
    }


    if(isset($_GET['filterBy'])) {

        eleccion_del_segundo_formulario($objctResultados,$objetoDistritos);

    }


    ?>





    