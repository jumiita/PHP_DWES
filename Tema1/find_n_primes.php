<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="get" action="find_n_primes.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    function getDivisors($num)
    {

        $divisores = array();
        // Con este bucle lo que hacemos es comprobar que el número que introduce el usuario da resto 0, si es así lo introduce en un array.

        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {

                //Aqui creamos el array
                $divisores[] = $i;
            }

        }
        //retornamos el array para la siguiente función.
        return $divisores;
    }

    function isPrimeNum($num)
    {

        if (count(getDivisors($num)) == 2) {
            return true;
        }

        return false;

    }

    if (isset($_GET["num"])) {
        $num = intval($_GET["num"]);
        $i = 0;
        $primes = array();
        while (count($primes) < $num) {
            $i++;
            if (isPrimeNum($num)) {
                $primes[] = $i;
            }
        }
        echo "el primer" . $num . " Los numerosprimos son: ";
        foreach ($primes as $prime) {
            echo ". " . $prime . "<br>";
        }

    }
    ?>
</div>
</body>
</html>