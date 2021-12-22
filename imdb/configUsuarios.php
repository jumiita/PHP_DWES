<?php
include_once "sql.php";


$sql = new sql();

session_start();

//Comprobamos si la sesion esta iniciada sino te devuelve al main.

if (($_SESSION['login']) == true) {

    ?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESION INICIADA</title>
</head>
<body>

<p>Enhorabuena estas en la pagina solo para usuarios con registro.</p>

<h1>LOS FAMOSOS COMENTARIOS </h1>
<form>
    <textarea rows="30"></textarea>
</form>
</body>
</html>
    <?php
}
 else{
    head("Location:main.php");
}

?>