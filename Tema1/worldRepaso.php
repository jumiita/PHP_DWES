
<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=world");
$world = json_decode($contents, true);

function getUnsortedCities($world)
{
    //TODO: Return an array of cities without any kind of sort.
    //NOTES 1: You receive a world multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    for ($i = 0; $i < count($world); $i++) {
        for ($j = 0; $j < count($world[$i]['Cities']); $j++) {

            $ciudades[] = $world[$i]["Cities"][$j];
        }
    }
    return $ciudades;
}

function getSortedCitiesByPopulation($cities)
{
    //TODO: Return an array of cities sorted by it's population (ascending order).
    //NOTES 1: You receive a cities multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.
    $cities = getUnsortedCities($cities);
    $ordenado = array();
    for ($i = 0 ; $i <count($cities);$i++){
        for ($j = 0 ; $j < count($cities); $j++){
            if ($cities[$i]["Population"] < $cities[$j]["Population"]){
                $ordenado = $cities[$i];
                $cities[$i] = $cities[$j];
                $cities[$j] = $ordenado;
            }
        }

}
return $cities;
}

?>
<html lang="es">
<head>
    <title>Cities of the world</title>
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
        <th colspan="6">Cities of the world (<?php //TODO: Logic to print the number of cities.
            //
            echo count($world);
            // ?>)
        </th>
    </tr>
    <tr>
        <th colspan="3">Unsorted cities</th>
        <th colspan="3">Sorted cities</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
        <th>ID</th>
        <th>Name</th>
        <th>Population</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $desordenado = getUnsortedCities($world);
    $ordenado = getSortedCitiesByPopulation($world);
    for ($i = 0; $i < count($world); $i++) {


        echo "<tr>";
        echo "<td>";
        echo $desordenado[$i]["ID"];
        echo "</td>";
        echo $desordenado[$i]["Name"];
        echo "</td>";
        echo "<td>";
        echo $desordenado[$i]["Population"];
        echo "</td>";
        echo "<td>";
        echo $ordenado[$i]["ID"];
        echo "</td>";
        echo $ordenado[$i]["Name"];
        echo "</td>";
        echo "<td>";
        echo $ordenado[$i]["Population"];
        echo "</td>";
        echo "</tr>";
    }
    //TODO: Logic to print the table body.
    ?>
    </tbody>
</table>
</body>
</html>