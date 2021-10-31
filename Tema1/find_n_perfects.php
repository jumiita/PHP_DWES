<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="find_n_perfects.php">
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

        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0 && $i != $num) {

                //Aqui creamos el array
                $divisores[] = $i;
            }

        }
        //retornamos el array para la siguiente función.
        return $divisores;
    }

    function isPerfectNum($num){

        if ($num == array_sum(getDivisors($num))  ) {
            return true;
        } else {

            return false;
        }
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        $perfect = array();
         $i = 0;
        while(count($perfect) <$num){
            $i++;
            if(isPerfectNum($i)){
                $perfect[] = $i;
            }
        }

        echo "el " . $num . " es perfecto y los numeros perfectos son: <br> ";
        foreach ($perfect as $valor) {
            echo "- " . $valor . "<br>";

        }

    }
    ?>
</div>
</body>
</html>