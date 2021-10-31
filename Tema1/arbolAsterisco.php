<!DOCTYPE html>
<html>
<head>
    <title>Árbol de asteriscos</title>
</head>
<body>
<h1>Árbol de asteriscos</h1>
<p>El arbol a continuación</p>
<div style="text-align: center;">

    <?php
    /*
     *Este ejercicio consiste en crear un triangulo/arbol de asteriscos con bucles anindados.
     */

    //Aquí con estos bucles hacemos una "linea" vertical y una horizontal"
    for ($i = 0; $i <= 24; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            // Aquí lo que hacemos con la variable asterisco es transformar de entero a cadena.
            $asterisco = strval($i);
            echo $asterisco = "*";

        }
        echo "<br>";
    }

    ?>
</div>
</body>
</html>

