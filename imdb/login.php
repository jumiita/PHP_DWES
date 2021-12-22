<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro IMDB</title>
    <style>
        .login {
            margin-left: 40%;
            margin-top: 10%;
            text-align: center;
            background: -webkit-gradient(linear, left top, left bottom, from(gold), to(orange));
            border-radius: 8px;
            border: solid black 2px;
            width: 350px;
            height: auto;
            padding: 1%;
        }
    </style>
</head>
<body>

<form class="login" method="post" action="registro.php" name="login">
    <h1>Registro en IMDB de bajo presupuesto</h1>

    <div class="formulario">
        <div class="rellena">
            <label>Email</label>  <br>
            <input type="email" name="email" required/>
        </div>
        <br>
        <div class="rellena">
            <label>Nombre de usuario</label>  <br>
            <input type="text" name="usuario" required/>
        </div>
        <br>
        <div class="rellena">
            <label>Contraseña</label>  <br>
            <input type="password" name="password" required/>
        </div>
        <br>
        <button type="submit" name="registro" value="registro">Enviar registro</button>
        <div class="olvido">
            <p>¿Te has olvidado de la contraseña? <a href="registro.php">click aquí</a></p>
            <p>Puedes ver el contenido sin registro,<a href="main.php"> vuelve a la página principal</a></p>
        </div>
    </div>

</form>
</body>
</html>
