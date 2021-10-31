<?php

// TODO
// Crear las clases episodios, caracteres y localización y que los arrays de ordenación
// y mapeados esten en esas clases.

include("caracter.php");
include("episodio.php");
include("locations.php");

$seed = 0000; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted

$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);
$characters = json_decode(file_get_contents($api_url . "characters"), true);

//Con una clase creamos los atributos de una futura persona "una" por eso cuando creamos el
// objeto "persona" solo hay una entonces, creamos un array para poder almacenar mas de una persona.

function creationsCharacters($characters)
{

    for ($i = 0; $i < count($characters); $i++) {
        $charactersOb[$i] = new caracter($characters[$i]["id"], $characters[$i]["name"], $characters[$i]["status"],
            $characters[$i]["species"], $characters[$i]["type"], $characters[$i]["gender"], $characters[$i]["origin"],
            $characters[$i]["location"], $characters[$i]["image"], $characters[$i]["created"], $characters[$i]["episodes"]);
    }
    return $charactersOb;
}

function creacionEpisodios($episodes)
{
    $epnames = Array();

    for ($j = 0; $j < count($episodes); $j++) {
        $episodios[$j] = new episodio($episodes[$j]["id"], $episodes[$j]["name"], $episodes[$j]["episode"], $episodes[$j]["characters"]);
    }
    return $episodios;
}

function creacionLocalizacion($locations)
{
    for ($i = 0; $i < count($locations); $i++) {
        $locationsOb[$i] = new locations($locations[$i]["id"], $locations[$i]["name"],
            $locations[$i]["type"], $locations[$i]["dimension"], $locations[$i]["created"], $locations[$i]["residents"]);
    }
    return $locationsOb;
}

function mapeado($charactersOb, $episodios, $locationsOb)
{
    for ($i = 0; $i < count($charactersOb); $i++) {

        for ($j = 0; $j < count($locationsOb);$j++){
            if ($charactersOb[$i]->getOrigin() == $locationsOb[$j]->getId()&& $charactersOb[$i]->getOrigin() != "0") {
                $charactersOb[$i]->setOrigin($locationsOb[$j]->getName());
            } elseif ($charactersOb[$i]->getOrigin() =="0"){
                $charactersOb[$i]->setOrigin("Unknown");
            }
        }

      for ($j = 0; $j < count($locationsOb);$j++){
          if ($charactersOb[$i]->getLocation() == $locationsOb[$j]->getId()&& $charactersOb[$i]->getLocation() != "0") {
              $locationsOb[$i]->setOrigin($locationsOb[$j]->getName());
          } else if ($charactersOb[$i]->getLocation() == "0") {
                $charactersOb[$i]->getLocation("Unknown");
            }
      }

        for ($j = 0; $j < count($episodios); $j++) {
            for ($k = 0; $k < count($charactersOb[$i]->getEpisodes()); $k++) {
                if (($charactersOb[$i]->getEpisodes()[$k] == intval($episodios[$j]->getId())) && $charactersOb[$i]->getEpisodes()[$k] !== 0) {
                    $epnames[$k] = $episodios[$j]->getName();

                } else if ($charactersOb[$i]->getEpisodes()[$k] == 0) {
                    $epnames[$k] = "unknown";
                }
      }
            }
            $charactersOb[$i]->setEpisodes($epnames);
  }

    return $charactersOb;
}



function getSortedCharactersById($characters)
{
    $count = 0;
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if (intval($characters[$i]["id"]) < intval($characters[$j]["id"])) {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
            $count++;
            echo ($count) . ": (" . implode(",", array_column($characters, "id")) . ");<br>";
        }
    }
    return $characters;
}

function getSortedCharactersByOrigin($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ($characters[$i]["origin"] < $characters[$j]["origin"]) {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByStatus($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ($characters[$i]["status"] == "Alive" && $characters[$j]["status"] != "Alive") {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }

    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ($characters[$i]["status"] == "Dead" && $characters[$j]["status"] == "unknown") {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}


function mapCharacters($characters)
{
    global $sortedLocations;
    global $sortedEpisodes;
    for ($i = 0; $i < count($characters); $i++) {

        if ($characters[$i]["location"] == 0) {
            $characters[$i]["location"] = "Unknown";
        } else {
            $characters[$i]["location"] = $sortedLocations[$characters[$i]["location"] - 1]["name"];
        }

        for ($j = 0; $j < count($sortedLocations); $j++) {
            if ($characters[$i]["origin"] == intval($sortedLocations[$j]["id"])) {
                $characters[$i]["origin"] = $sortedLocations[$j]["name"];
            } elseif ($characters[$i]["origin"] == 0) {
                $characters[$i]["origin"] = "Unknown";
            }
        }

            }
        

    return $characters;
}

//NOTE: Function to render each character card HTML. Don't edit.
function renderCard($character)
{
    $ch = curl_init('https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?data=render');
    $data = array("character" => $character);
    $postData = json_encode($data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//NOTE: $sortingCriteria receive the sorting criteria of the form. Don't edit
$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $characters = getSortedCharactersById($characters);
            break;
        case "origin":
            $characters = getSortedCharactersByOrigin($characters);
            break;
        case "status":
            $characters = getSortedCharactersByStatus($characters);
            break;
    }
}

//NOTE: Save function returns to variables and then you can use it as globals if needed. Don't edit.
$sortedLocations = getSortedLocationsById($locations);
$sortedEpisodes = getSortedEpisodesById($episodes);
$mappedCharacters = mapCharacters($characters);
?>

<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="rickandmorty.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                foreach ($mappedCharacters as $character) {
                    echo renderCard($character);
                }
                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>