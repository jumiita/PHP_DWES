<?php

//Hacemos los includes necesarios para tener las conexiones a la base de datos.
include_once "pelicula.php";
include_once "staff.php";
include_once "multimedia.php";
include_once "sql.php";
include_once "usuarios.php";
include_once "comentarios.php";
include_once "innerjoin.php";

$sql = new sql();
//Damos a variables que creamos los getters que nos hacen falta pasando por parametro lo que necesitamos en el main.
$titulo = $sql->get_pelicula_by_id($_GET["id"]);
$multi = $sql->get_img_video($_GET["id"]);
$staff = $sql->get_staff($_GET["id"]);
$peli = $sql->get_pelicula();
//var_dump($comentario);
session_start();
///////////////////////////////////////////////// no puedo cerrar sesión
if (isset($_GET["logout"])) {
    //Elimina las variables de sesion
    session_unset();
    //cierra la sesion.
    session_destroy();
}
if (isset($_POST['entrar'])) {
    if ($sql->comprobar_login($_POST['email'], $_POST['pass']) == true) {
        $_SESSION['login'] = true;
        $_SESSION['userId'] = $sql->sacar_id($_POST['email']);
    }
}
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <script src="https://kit.fontawesome.com/e811398498.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB Trailers</title>
    <link rel="stylesheet" href="videoEstilo.css">
</head>
<header class="flex">
    <h1>Estas en el trailer</h1>
    <ul>
        <li><a href="main.php"> Menu Principal</a></li>
        <li><a href="https://www.aficine.com/cine/ocimaxpalma/">ves al cine</a></li>
        <li><a href="https://jumafernandez.es/contacto/">Contacto</a></li>
        <li><a href="?id=<?php echo $_GET["id"] ?>&logout=true">Cerrar Sesión</a></li>

        <li>
            <form class="logueate" action="video.php?id=<?php echo $_GET["id"] ?>" method="post">
                <label>Correo</label>
                <input type="email" value="email" name="email" required>
                <label>Contraseña</label>
                <input type="password" value="pass" name="pass" required>
                <button type="submit" value="entrar" name="entrar">ENTRA!</button>
            </form>
        </li>
        <li><p><?php if (isset($_SESSION["userId"])) {
                    echo " Estas Loguead@: " . $sql->mostrar_nombre($_SESSION["userId"])["nombre"];
                } else {
                    echo "NO estas loguead@";
                } ?></p></li>
    </ul>
</header>
<body>

<div class="contenedor">
    <div class="izquierda"><p>La Portada de la película</p><br><img src="<?php echo $multi->getUrl(); ?>">
    </div>
    <div style="text-align:center;"><?php echo $multi->getYt(); ?></div>
    <div class="atras"><a href="main.php"><i class="fas fa-arrow-left"></i></a></div>
    <br>
    <div class="letras">
        <p class="ptr">Titulo: </p>
        <p><?php echo $titulo->getTitulo(); ?></p>
        <p class="ptr"> Protagonista es: </p>
        <p><?php echo $staff->getProtagonista(); ?></p>
        <p class="ptr"> El director de la película es: </p>
        <p><?php echo $staff->getDirector(); ?></p>
        <p class="ptr"> El reparto de la película es: </p>
        <p><?php echo $staff->getRepartoPrincipal(); ?></p>
        <p class="ptr"> El guion de la película es: </p>
        <p><?php echo $staff->getGuion(); ?></p>
        <p class="ptr"> Descripción: </p>
        <p><?php echo $sql->get_pelicula_by_id($_GET["id"])->getDescripcion(); ?></p>

    </div>
</div>
<?php
if ($_SESSION['login'] == true) {

    ?>
    <div class="cooment">

        <h2>Comenta la película para que los usuarios registrados vean todas los comentarios.</h2>
        <form name="form1" method="post" action="">
            <label for="textarea"></label>
            <center>
                <p>
                    <textarea name="comentario" cols="80" rows="5" id="textarea" placeholder="inserta un coment o seras the rock"></textarea>
                </p>
                <p>
                        <input type="number" id="tentacles" name="puntua" value="puntua"
                               min="0" max="10" ></p>
                <p>
                    <input type="submit" name="reply" name="comentar" value="comentar" required>
                </p>
            </center>
        </form>

    </div>
    <?php
        if (isset($_POST['comentario']) && isset($_SESSION['userId'])&& $_POST["puntua"] !=""&& $_POST["comentario"] !="") {
            $comenta = $_POST["comentario"];
            $sql->insertar_comentario($comenta, $titulo->getId(), $_SESSION['userId'],$_POST["puntua"]);
        } else if(isset($_POST["puntua"])=="") {
            echo '<script>alert("El campo de la puntuación esta vacío")</script>';
        }else if(isset($_POST["comentario"])=="") {
            echo '<script>alert("El campo de la comentario esta vacío")</script>';
        }
    ?>
    <center>
        <div class="tablita">

            <table>
                <tr class="organiza">
                    <th>Título</th>
                    <th>Comentarios</th>
                    <th>Usuario</th>
                    <th>Puntuación</th>
                    <th>Puntuación según los comentarios</th>
                </tr> <?php $comentarios = $sql->mostrar_comentarios($titulo->getId());
                foreach ($comentarios as $comentario) {
                    ?>
                    <tr>
                        <td> <?php echo $comentario->getTitulo(); ?> </td>
                        <td> <?php echo $comentario->getComentario(); ?> </td>
                        <td> <?php echo $comentario->getNombre(); ?> </td>
                        <td><?php echo $comentario->getPuntuacion(); ?></td>
                        <td><?php if ($comentario->getPuntuacioon() == 0){
                            echo "Sin puntuación";
                            }else {
                                echo $comentario->getPuntuacioon();
                            }?></td>
                    </tr> <?php } ?>
            </table>
        </div>
    </center>
    <?php
} else {
    head("Location:main.php");
}
?>
</body>
</html>
