<?php
//Incluimos las otras clases que hemos creado para que funcionen
include("partidos.php");
include("provincias.php");
include("resultados.php");
include("ley_dhont.php");
//Recibimos de la api las arrays de resultados, distritos y partidos.

$api_url="https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
$resultad = json_decode(file_get_contents($api_url . "results"), true);
$districts = json_decode(file_get_contents($api_url . "districts"), true);
$parties = json_decode(file_get_contents($api_url . "parties"), true);

//Creamos el array de objetos en base al json.
function getObjctDistricts(){
    //Creamos la variable global para poder usarla dentro de la función.
    global $districts;
    //Creamos un array nuevo donde meteremos los objetos.
    $objetoDistritos[] = array();
    //Un contador donde iremos iterando el array
    $count = 0;
    //En el foreach usamos el array de json para meterlos en el array de objetos que hemos creado anteriormente
    foreach ($districts as $distritos){
        $objetoDistritos[$count] = new provincias($distritos["id"], $distritos["name"], $distritos["delegates"]);
    }
    return $objetoDistritos;
}
//Creamos el array de objetos en base al json.
function getObjctParties(){
    global $parties;
    $Objetopartidos[] = array();
    $count = 0;
    foreach ($parties as $partido){
        $Objetopartidos[$count] =  new partidos($partido["id"],$partido["name"],$partido["acronym"],$partido["logo"]);
    }
    return$Objetopartidos;
}
//Creamos el array de objetos en base al json.
function getObjctResultados(){
    global $resultad;
    $objctResultados[] = array();
    $count = 0;
    foreach($resultad as $objeto){
        $objctResultados[$count] =  new resultados($objeto["district"],$objeto["party"],$objeto["votes"]);
        $count++;
    }
    return$objctResultados;
}
// Esta función nos creara la cabecera de la tabla, me parece muy util crear solo las cabeceras
// porque como hay que usarla en varias "opciones" nos vendra mejor para que el código sea más legible y más fácil de usar o refactorizar
function abro_tabla(){
    echo "<table class='table table-striped'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th scope='col'>Circumscripción</th>";
            echo "<th scope='col'>Partido</th>";
            echo "<th scope='col'>Votos</th>";
            echo "<th scope='col'>Escaños</th>";
        echo "</tr>";
    echo "</thead>";
}

//Como la anterior función nos creara solo el final de la tabla "el cierre"
function cierro_tabla(){
        echo "</tbody>";
    echo "</table>";
}

//Aquí sacaremos el "nombre" que necesitamos en base a la elección del usuario en el main.
function get_name_object_selected_by_id($objetos, $id){
    //creamos la selección vacia que rellenaremos según la elección
    $object_name_selected = '';
    // un bucle que recore los objetos
    foreach($objetos as $object) {
        //Creamos la condición la cual usaremos la variable que recibimos por parametro y que sea igual al id de los objetos que tenemos y si se cumple que de el nombre.
        if($object->getId() == $id){
            $object_name_selected = $object->getNombre();
        }
    }
    return $object_name_selected;
}

//La función más importante ya que recibimos por parametros las tres arrays
function get_all_data($objetoDistritos, $objctResultados, $objetoPartidos){
    //Creamos el array donde meteremos los datos.
    $data[] = array();
    foreach($objetoDistritos as $distrito){
        //Creamos la variable con el objeto del nombre del distrito
        $distrito_name = $distrito->getNombre();
        //Creamos el objeto de la ley dhont (clase que hemos importado arriba)
        $dhondt = new Dhondt;
        //Asignamos en dhont el numero de delegados que tenemos en el array de distrito
        $dhondt->delegates = $distrito->getDelegados();
        ////Asignamos también los votos en blanco (Que no se usa en esta
        ///  aplicación pero hay que tenerlo en cuenta ya que es una variante que existe)
        ///  También te digo que es una función que me he basado ya hecha en internet
        ///  y si lo quitaba se liaba la de dios.. Para que mentir
        $dhondt->votosEnBlanco = 0;
        // Aquí se hace el cribado del 3% que nos sirve para hacer el reparto de votos.
        $dhondt->min = 3;

        //Bucle de resultados
        foreach($objctResultados as $resultado){
            //Condición donde mapeamos que el nombre sea igual a los distritos.
            if($distrito->getNombre() == $resultado->getDistrict()){
                //Creamos las variables vacias donde meteremos las cosas más adelante
                $img = '';
                $acronym = '';
                //Otro bucle donde mapeamos  nombre de partidos con nombre de resultados.
                foreach($objetoPartidos as $partido) {
                    if($partido->getNombre() == $resultado->getParty()){
                        //Damos valor a las variables que habiamos creado anteriormente
                        $img = $partido->getLogo();
                        $acronym = $partido->getAcronym();
                        $id = $partido->getId();
                    }
                }
                $party = $resultado->getParty();
                $votos = $resultado->getVotes();
                //metemos las variables que usamos en la función en la clase "ley_dhont"
                $dhondt->anyandirPartido($id, $img, $acronym, $distrito_name, $party, $votos);
            }
        }
        //Se hace el calculo de los votos en la función de process
        $dhondt->proceso();
        // metemos en el array data la función donde retornamos el array.
        $data[] = $dhondt->getParties();
    }

    return $data;
}

//Aquí es donde le damos forma, donde printamos toto(no se puede poner to-do que se cree que falta algo por hacer..)
// lo que hemos hecho anteriormente.
function print_table($all_date,$key,$object_selected_name){
    foreach($all_date as $arrays){
        foreach($arrays as $data){
            if($data[$key] == $object_selected_name){
                echo "<tr>";
                    echo "<td>".$data['district']."</td>";
                    echo "<td>";
                        echo "<strong><img src='".$data['img']."' alt='logo' height='25px'> ".$data['acronym']."</strong> - ".$data['ent'];
                    echo "</td>";
                    echo "<td>".$data['votes']."</td>";
                    echo "<td>".$data['seats']."</td>";
                echo "</tr>";
            }
        }
    }
}

//Printamos la tabla de los datos generales.

function print_table_general($all_date){
    //Creamos un array donde meteremos la información más abajo.
    $parties_data[] = array();
    foreach($all_date as $arrays){
        //Creamos la condición en la que se sumaran los votos y los delegados en base al array de la función de la anterior,
        // se entra en este if si el array tiene votos sino va al "else" de abajo, es decir si ya existe el partido se suma sino lo crea.
        foreach($arrays as $data){
            if (isset($parties_data[$data['id']]['votes'])){
                $parties_data[$data['id']] = array(
                    "img"=> $data['img'],
                    "acronym"=> $data['acronym'],
                    "ent"=> $data['ent'], 
                    "votes"=> $parties_data[$data['id']]['votes'] + $data['votes'],
                    'seats' => $parties_data[$data['id']]['seats'] + $data['seats']
                );
            }else{
                $parties_data[$data['id']] = array(
                    "img"=> $data['img'],
                    "acronym"=> $data['acronym'],
                    "ent"=> $data['ent'], 
                    "votes"=> $data['votes'],
                    'seats' => $data['seats']
                );
            }            
        }
    }
    //Aquí pintamos la tabla con los datos "actualizados"
    foreach($parties_data as $data){
        if (isset($data['ent'])){
            echo "<tr>";
                echo "<td>General</td>";
                echo "<td>";
                    echo "<strong><img src='".$data['img']."' alt='logo' height='25px'> ".$data['acronym']."</strong> - ".$data['ent'];
                echo "</td>";
                echo "<td>".$data['votes']."</td>";
                echo "<td>".$data['seats']."</td>";
            echo "</tr>";
        }
        
    }
}

?>