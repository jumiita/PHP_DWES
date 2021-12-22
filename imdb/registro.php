<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completa el registro</title>
</head>
<body>

<h1>Página en mantenimiento disculpe las molestias</h1>

<?php

include_once "sql.php";
$sql = new sql();

if (isset($_POST['registro'])){


$email = $_POST['email'];

    echo "<p>Has introducido este email: <b>". $email."</b></p>";


$usuario = $_POST['usuario'];
    echo "<p>Has introducido este nombre: <b>". $usuario."</b></p>";

//Metemos en una variable password lo que recibe por post del formulario.
    try {
        $password = crypt($_POST['password'], bin2hex(random_bytes(22)));
    } catch (Exception $e) {
        $password = crypt($_POST['password'], "salt");
    }



    //Hacemos un print de la contraseña normal y encriptada para que veamos que lo ha realizado bien.
    echo "<p>Has introducido esta contraseña: <b>". $password."</b></p>";
    //echo "<p>Has introducido esta contraseña: <b>". $password_hash."</b></p>";
}

$introduce = $sql->crear_usuario( $_POST['email'],$_POST['usuario'],$password);

//Para redirigir a una pagina por php es con -> header("Location:main.php");

?>

</body>
</html>
