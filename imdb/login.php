<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro IMDB</title>
    <style>
        .login{
            text-align: center;
            background-color: aquamarine;
            border: solid black 2px;
            margin: 3%;
            width: 350px;
            height: auto;
            padding: 1%;
        }
    </style>
</head>
<body>
<form class="login" method="post" action="" name="login">
    <h1>Registro en IMDB</h1>
    <div class="formulario">
        <label>Nombre de usuario</label>
        <input type="text" name="usuario" required />
    </div>
    <br>
    <div>
        <label>Email</label>
        <input type="email" name="email" required />
    </div>
    <br>
    <div>
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <br>
    <button type="submit" name="registro" value="registro">Enviar registro</button>
    <div class="olvido">
        <p>¿Te has olvidado de la contraseña? <a href="registro.php">click aquí</a></p>
        <p>Puedes ver el contenido sin registro,<a href="main.php"> vuelve a la página principal</a> </p>
    </div>
</form>
</body>
</html>

<?php


?>