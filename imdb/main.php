<?php

include_once "pelicula.php";
include_once "staff.php";
include_once "multimedia.php";
include_once "sql.php";
include_once "usuarios.php";

//Creamos el objeto de la clase de MySQL el cual hace la conexión y las consultas que necesitemos.
$sql = new sql();
//  creamos las variables y les damos el valor con los getters que necesitamos.
$peli = $sql->get_pelicula();
$orden = $sql->get_order_by_AZ();
$genero = $sql->get_order_by_genero();
$puntuacion = $sql->get_order_by_puntuacion();
//Formulario para el inicio de sesion
session_start();
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
}
if (isset($_POST['entrar'])) {
    if ($sql->comprobar_login($_POST['email'], $_POST['pass']) == true) {
        $_SESSION['login'] = true;
        $_SESSION["userId"] = $sql->sacar_id($_POST['email']);
        $cambioWeb = "video.php";
        //header("Location:main.php");
    } else {
        $cambioWeb = "trailer_coment.php";
    }
}
?>
<html>
<head>
    <title>SUPER IMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mainEstilo.css">
</head>
<body>

<div class="foater">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid"></div>
    </nav>
    <h1 class="cabecera">IMDB con bajo presupuesto</h1>
    <form class="d-flex" action="main.php">
        <select class="form" aria-label="Sorting criteria" name="eleccion" onchange="this.form.submit()">
            <option selected="" value="unsorted">elige una opción</option>
            <option value="ordena">Ordenar A-Z</option>
            <option value="genero">Genero</option>
            <option value="puntuacion">Puntuación</option>
        </select>
    </form>
    <form class="logueate" action="main.php" method="post">
        <label>Correo</label>
        <input type="email" value="email" name="email" placeholder="correo" required>
        <label>Contraseña</label>
        <input type="password" value="pass" name="pass" placeholder="contaseña" required>
        <button type="submit" value="entrar" name="entrar">ENTRA!</button>
    </form>
    <form class="buscador" action="main.php" method="post">
        <label>
            <input type="text" name="busca">
        </label>
        <button type="submit" value="enviar" name="enviar">enviar</button>
    </form>
    <a class="registro" href="login.php">Registrate</a>
    <a href="?logout=true">Cerrar Sesión</a>
    <p><?php if (isset($_SESSION["userId"])) {
            echo " Estas Loguead@: " .$sql->mostrar_nombre($_SESSION["userId"])["nombre"];
        } else {
            echo "NO estas loguead@";
        } ?></p>
</div>
<div class="col-md-4">

    <?php

    //Formulario para el buscador de peliculas.
    if (isset($_POST["enviar"])) {
        $nuevo = $_POST["busca"];
        $peli = $sql->buscar_pelicula($nuevo);
    }
    // Comprobamos que elección se ha hecho para filtrar la busqueda según la elección.
    if (isset($_GET["eleccion"])) {
        if ($_GET["eleccion"] == "ordena") {
            $peli = $sql->get_order_by_AZ();
        } elseif ($_GET["eleccion"] == "genero") {
            $peli = $sql->get_order_by_genero();
        } elseif ($_GET["eleccion"] == "puntuacion") {
            $peli = $sql->get_order_by_puntuacion();
        } elseif ($_GET["eleccion"] == "unsorted") {
            $peli = $sql->get_pelicula();
        }
        //Hacemos un bucle para que nos imprima lo que deseamos en este caos las "cartas" de peliculas tipo IMDB.
    }
    //echo "<h1>".$_SESSION['userId']."AAAAAAAA</h1>";
    foreach ($peli as $pel) { ?><?php //if ($_SESSION['login']== true){echo "video.php"; }else{echo "trailer_coment.php";}
        ?>

        <div class="card1"><a href="video.php?id=<?php echo $pel->getIdMultimedia()->getId(); ?>"><img class="pelicula"
                                                                                                       src="<?php echo $pel->getIdMultimedia()->getUrl(); ?> "></a>
            <div class="card-body">
                <h5 class="title"> <?php echo $pel->getTitulo() ?> </h5>
                <div class="GENERO"><label for="exampleInputEmail1" class="form-label"
                                           style="margin-bottom: 0;"><strong>Genero:</strong></label>
                    <div id="emailHelp" class="form-text" style="margin-top:0;"><?php echo $pel->getGenero(); ?></div>
                </div>
                <div class="PUNTUACION"><label for="exampleInputEmail1" class="form-label"><strong>Puntuación:</strong></label>
                    <div id="emailHelp" class="form-text"> <?php for ($i = 0; $i < $pel->getPuntuacion(); $i++) {
                            echo '<img class="star" src="./img/star.png" >';
                        }; ?></div>
                </div>
                <div class="mb-3"><label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Descripción:</strong></label>
                    <div id="emailHelp" class="form-text"
                         style="margin-top:0;"><?php echo $pel->getDescripcion() ?> </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                </div>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>