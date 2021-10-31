<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){

    for ($i = 1; $i < count($elephants); $i++) {
        for ($j = 1; $j < count($elephants); $j++) {
            if ($elephants[$j - 1]['number'] > $elephants[$j]['number'] && $elephants[$j]['number'] !== null) {
                $numMenor = $elephants[$j - 1];
                $numMayor = $elephants[$j];
                $elephants[$j - 1] = $numMayor;
                $elephants[$j] = $numMenor;
            }
        }
    }
    //$arrayNuevo = $elephants;
    return $elephants;
    //$arrayNuevo;

}

function getSortedElephantsByBirth($elephants)
{

    for ($i = 1; $i < count($elephants); $i++) {
        for ($j = 1; $j < count($elephants); $j++) {
            if ($elephants[$j - 1]['dod'] > $elephants[$j]['dod'] && $elephants[$j]['dod'] !== null) {
                $numMenor = $elephants[$j - 1];
                $numMayor = $elephants[$j];
                $elephants[$j - 1] = $numMayor;
                $elephants[$j] = $numMenor;
            }
        }
    }
  // $arrayNuevo = $elephants;
  // return $arrayNuevo;
    return $elephants;

}

function getSortedElephantsByHavingImage($elephants){

    $sinImg = "https://elephant-api.herokuapp.com/pictures/missing.jpg";
    for ($i = 1; $i < count($elephants); $i++) {
        for ($j = 1; $j < count($elephants); $j++) {
            if ($elephants[$j - 1]["img"] == $sinImg && $elephants[$j]["img"] != $sinImg) {
                $numMenor = $elephants[$j - 1];
                $numMayor = $elephants[$j];
                $elephants[$j - 1] = $numMayor;
                $elephants[$j] = $numMenor;
            }
        }
    }
   // $arrayNuevo = $elephants;
   // return $arrayNuevo;
    return $elephants;

}

if (isset($_GET["sortingCriteria"])) {
    $opcion = strval($_GET["sortingCriteria"]);

    if ($opcion == "number") {
        getSortedElephantsByNumber($elephants);
    } elseif ($opcion == "birth") {
        getSortedElephantsByBirth($elephants);
    } elseif ($opcion == "image") {
        getSortedElephantsByHavingImage($elephants);
    }
}

?>

<html lang="es">
<head>
    <title>Elephants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>


    <style>
        :root {
            --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

        body {
            background: #111 !important;
        }

        .card {
            background: #222;
            border: 1px solid #dd2476;
            color: rgba(250, 250, 250, 0.8);
            margin-bottom: 2rem;
        }

        .custom .btn {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            border-image-source: var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
        }

        .custom .btn:hover, .btn:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: #fff !important;
            border: 5px solid #fff !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: underline;
        }

        img {
            max-height: 220px;
            height: auto; /* for IE 8 */
            overflow: hidden;
            min-height: 220px;
        }

        .card-text {
            max-height: 100px;
            height: auto; /* for IE 8 */
            overflow: hidden;
            min-height: 100px;
        }

        .custom {
            padding-top: 100px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="elephants-multifiler.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Sorting criteria</option>
                    <option value="number">Number</option>
                    <option value="birth">Year of birth</option>
                    <option value="image">Having image</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<div class="container mx-auto mt-4 custom">
    <div class="row">

        <?php


        foreach ($elephants as $elephant){

            echo "<div class='col-md-4'>";
            echo "<div class='card' style='width: 18rem'>";
            echo "<img src='".$elephant["image"]."' class='card-img-top'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$elephant["number"]." - ".$elephant["name"]."</h5>";
            echo "<h6 class='card-subtitle mb-2 text-muted'>Subespecies: ".$elephant["species"]."</h6>";
            echo "<h6 class='card-subtitle mb-2 text-muted'>Year of birth: ".$elephant["dod"]."</h6>";
            echo "<p class='card-text'>".$elephant["note"]."</p>";
            echo "<a href='".$elephant["wikilink"]."' class='btn mr-2' target='_blank'><i class='fas fa-link'></i> Visit elephant</a>";
            echo "<i class='fas fa-link'></i></a></div></div></div>";
        }
        ?>

    </div>
</div>
</body>
</html>