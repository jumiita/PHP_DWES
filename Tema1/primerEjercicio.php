<html lang="es">
<head>
    <title>Get divisors</title>
</head>
<body>
<form method="post" action="primerEjercicio.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        /*
                El bucle for va añadiendo uno cada pasada y con la condicion,
                 lo que hacemos es comprobar que el numero que ha introducido
                 el usuario se multiplique cada pasada del bucle e imprimiendo
                 por pantalla siempre que sea una division con resto 0.
                */

        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                echo "Divisor " . $i . "<br>";

            }

        }

    }
    ?>
</div>
</body>
</html>