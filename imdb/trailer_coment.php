<?php

include_once "sql.php";
$sql = new sql();
//Damos a variables que creamos los getters que nos hacen falta pasando por parametro lo que necesitamos en el main.
$titulo = $sql->get_pelicula_by_id($_GET["id"]);
$multi = $sql->get_img_video($_GET["id"]);
$staff =$sql->get_staff($_GET["id"]);
$peli = $sql->get_pelicula();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trailer_coment.css">
    <title>Document</title>
</head>
<body>

<div class="contenedor">
    <div class="izquierda"><p>La Portada de la película</p><br><img src="<?php echo   $multi->getUrl();?>">
    </div>
    <div style="text-align:center;" ><?php echo   $multi->getYt();?></div>
    <div class="atras"><a href="main.php"><i class="fas fa-arrow-left" ></i></a></div>
    <br>
    <div class="letras">
        <p class="ptr">Titulo: </p>
        <p><?php echo $titulo->getTitulo(); ?></p>
        <p class="ptr"> Protagonista es: </p>
        <p><?php echo $staff->getProtagonista(); ?></p>
        <p class="ptr"> El director de la película es: </p>
        <p><?php echo $staff->getDirector(); ?></p>
        <p class="ptr"> El reparto de la película es: </p>
        <p><?php  echo $staff->getRepartoPrincipal(); ?></p>
        <p class="ptr"> El guion de la película es: </p>
        <p><?php echo $staff->getGuion(); ?></p>
        <p class="ptr"> Descripción: </p>
        <p><?php echo $sql->get_pelicula_by_id($_GET["id"])->getDescripcion(); ?></p>

    </div>
</div>

<h1>ESTO es una PRUEBA DE QUE FUNCIONA COMO QUIERO</h1>

</body>
</html>

