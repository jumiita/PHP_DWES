<?php

include ("jardin.php");

function extraer_query(){

$mysqli = new mysqli("localhost", "root", "", "jardineria");

/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
elseif($resultado = $mysqli->query("SELECT\n"
    . "    clientes.`NombreCliente`\n"
    . "    , clientes.`NombreContacto`\n"
    . "    , clientes.`ApellidoContacto`\n"
    . "    , clientes.`Telefono`\n"
    . "    , empleados.`Nombre`\n"
    . "    , empleados.`Apellido1`\n"
    . "    , empleados.`Apellido2`\n"
    . "    , empleados.`Extension`\n"
    . "FROM Clientes AS clientes\n"
    . "INNER JOIN Empleados AS empleados\n"
    . "ON clientes.CodigoEmpleadoRepVentas = empleados.CodigoEmpleado;", MYSQLI_USE_RESULT)) {
    printf("La selección devolvió %d filas.\n", $resultado->num_rows);

    $userData = array();

    while($r = mysqli_fetch_assoc($resultado)){
        $userData[]=$r;
    }

    $jardineriaa = json_encode($userData);

    /* liberar el conjunto de resultados */
    $resultado->close();
}
return$jardineriaa;
}

function Crear_Objetos_Jardin($jardineriaa){
global $jardineriaa;
    $ObjectJardineria = array();
    $count=0;
    foreach ($jardineriaa as $jardin){
        $ObjectJardineria[$count] = new jardin($jardin["nombreCliente"],$jardin["NombreContacto"],$jardin["ApellidoContacto"],$jardin["Telefono"],$jardin["Nombre"],$jardin["Apellido1"],$jardin["Apellido2"],$jardin["Extension"]);
        $count++;
    }
    return $ObjectJardineria;
}

function abrir_tabla(){
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

function cierro_tabla(){
    echo "</tbody>";
    echo "</table>";
}


$arrayJardin = crear_Objetos_Jardin($jardineriaa);

function get_todos_datos($arrayJardin){

    foreach ($arrayJardin as $jardincito){
    echo "<tr>";
    echo "<td>". $jardincito["nombreCliente"]."</td>";
    echo "<td>". $jardincito["NombreContacto"]."</td>";
    echo "<td>". $jardincito["ApellidoContacto"]."</td>";
    echo "<td>". $jardincito["Telefono"]."</td>";
    echo "<td>". $jardincito["Nombre"]."</td>";
    echo "<td>". $jardincito["Apellido1"]."</td>";
    echo "<td>". $jardincito["Apellido2"]."</td>";
    echo "<td>". $jardincito["Extension"]."</td>";
    echo "</tr>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>examen_ jesus</title>
</head>
<body>
<?php

//var_dump($userData);
abrir_tabla();
get_todos_datos($arrayJardin);
cierro_tabla();

?>
</body>
</html>
