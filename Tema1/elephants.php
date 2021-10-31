<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants)
{
//TODO: Return an array of elephants sorted by it's number (ascending order).
//NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
//NOTES 2:You CAN'T use any sorting PHP built-in function.


    for ($i = 1; $i < count($elephants); $i++) {
        for ($j = 1; $j < count($elephants); $j++) {
            if ($elephants[$j-1]['number'] > $elephants[$j ]['number'] && $elephants[$j]['number'] !== null) {
                $numMenor = $elephants[$j-1];
                $numMayor = $elephants[$j];
                $elephants[$j-1] = $numMayor;
                $elephants[$j] = $numMenor;
            }
        }
    }
    $arrayNuevo = $elephants;
    return $arrayNuevo;
}

?>

<html lang="es">
<head>
    <title>Elephants</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }

        table {
            border-collapse: collapse;
        }

        thead {
            background-color: aquamarine;
        }

        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="6">Elephants (<?php
            //count(array) te cuenta todos los elementos de la array.
            echo count($elephants);
            ?>)
        </th>
        </th>
    </tr>
    <tr>
        <th colspan="3">Unsorted elephants</th>
        <th colspan="3">Sorted elephants</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //metemos en una variable el array para luego llamar la funcion que nos dara el array ordenado
    $tabla = getSortedElephantsByNumber($elephants);

    for ($i = 0; $i < count($elephants); $i++) {
        echo "<tr>";
        //tabla sin ordenar ya que usamos la variable elefantes que nos da directamente la tabal de json
        echo "<td>" . $elephants[$i]["number"] . "</td>";
        echo "<td>" . $elephants[$i]["name"] . "</td>";
        echo "<td>" . $elephants[$i]["species"] . "</td>";
        //tabla ordenada ya que ponemos la variable "actualizada"
       echo "<td>" . $tabla[$i]["number"] . "</td>";
      echo "<td>" . $tabla[$i]["name"] . "</td>";
      echo "<td>" . $tabla[$i]["species"] . "</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>
</body>
</html>