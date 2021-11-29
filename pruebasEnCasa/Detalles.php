
<?php
$conexion = mysqli_connect("localhost", "root", "", "jardineria");

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($conexion) . PHP_EOL;

mysqli_close($conexion);

?>





<html>
<header>
    <title>Venta y alquiler de inmuebles</title>
</header>
<body>
<?php
    $arr = [1,2,3,4,5];

    for ($i = 0; $i < count($arr); $i++) {
        echo '<p>casa '.$arr[$i].'</p>';
        echo '<a href="loco2.php?id='.$arr[$i].'">aqui</a><br><br>';
    }
?>
</body>
</html>
<html>
<head>
    <title>
        loco2
    </title>
</head>