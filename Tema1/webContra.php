<?php
// Abrimos codigo php donde comprobaremos la variable y le pasaremos la  dureza y la compararemos con el color
if (isset($_POST["pass"])) {
    $pass = $_POST["pass"];
    $strong_number = isStrong($pass);
    $color = isColors($strong_number);
    /*pasamos por parametro la "respuesta" es decir la funcion que devuelve el número que queremos*/
   // $pintar = pintar($strong_number);
    echo timeForBreak($pass);
}
?>

<html lang="es">
<head>
    <title>How is my password</title>
    <style>
        div {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body style="background-color:<?php echo $color; ?> ">
<div>
    <form method="post" action="webContra.php">
        <label>
            Number:
            <input type="text" name="pass"/>
        </label>
        <input type="submit"/>
    </form>
</div>
<div>
    <h1> </h1>
    <?php

    //con esta función comprobamos la longitud de la contraseña
    //la funcion "strlen($pass)" comprueba la cantidad de numeros que hay en una contraseña
    function isStrong($pass)
    {
        $result = 4;
        if (strlen($pass) <= 4) {
            $result = 0;
        } else if (strlen($pass) <= 8) {
            $result = 1;
        } else if (strlen($pass) <= 12) {
            $result = 2;
        } else if (strlen($pass) <= 20) {
            $result = 3;
        }
        return $result;
    }

    //con esta función cambiamos el color según la longitud de la contraseña
    function isColors($strong_number)

        //hacemos un switch que cambia el color del body según el número de dureza
    {
        switch ($strong_number) {

            case 0:
                return "red";
                break;
            case 1:
                return "orange";
                break;
            case 2:
                return "greenyellow";
                break;
            case 3:
                return "green";
                break;
            case 4:
                return "skyblue";
                break;
        }

    }

    //con esta función comprobamos si es de las 20 contraseñas mas usadas.
    function getTipical($pass)
    {
        $tipica = array("1234", "123456", "123456789", "12345", "12345678", "111111", "1234567890", "000000", "1234567", "barcelona", "123456a", "666666", "654321", "159159", "123123", "realmadrid", "555555", "mierda", "alejandro", "tequiero", "a123456");
        if (in_array($pass, $tipica)) {
            return true;
        }
        return false;
    }

    function timeForBreak($pass)
    {
        $tiempo = pow(256,strlen($pass));

        if (strlen($pass) == 0) {
            $tiempo = 4;
            return "tu contraseña va a durar: ".$tiempo."segundos";
        } elseif (strlen($pass) ==1){
            $tiempo = 8;
            return "tu contraseña va a durar: ".$tiempo."segundos";
        }elseif (strlen($pass) ==2){
            $tiempo = 12;
            return "tu contraseña va a durar: ".$tiempo."segundos";
        }elseif (strlen($pass) ==3){
            $tiempo = 20;
            return "tu contraseña va a durar: ".$tiempo."segundos";
        }
    }

    ?>

</div>
</body>
</html>
