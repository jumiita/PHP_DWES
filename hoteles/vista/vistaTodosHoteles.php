<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de hotel cutre</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <style>
        img {
            width: 160px;
            height: 160px;
        }

        body {
            background-color: darkcyan;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning bg-opacity-50 sticky-top">
    <a class="navbar-brand ">
        <img src="../img/imagenhoteles.png" width="25">
    </a>
    <a class="navbar-brand " href="#">Reserva el Top 10 hoteles</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">

            <li class="nav-item active ">
                <a class="nav-link" href="#">Quienes somos </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Experiencia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../controlador/listaHotel.php">Home</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        </form>
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </div>
</nav>
<h1>Reserva el mejor top 10 hoteles</h1>
<?php
foreach ($hoteles as $hotel) {
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Hotel</h4>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $hotel->getNombre() . ", " . $hotel->getZona(); ?></h6>
            <h3>Descripción</h3>
            <p class="card-text"><?php echo $hotel->getDescripcion(); ?></p>
            <h4>Puntuación</h4>
            <p><?php echo $hotel->getPuntuacion(); ?><i class="fas fa-star"></i></p>
            <a href="../controlador/listaImagenHotel.php?id=<?php echo $hotel->getId(); ?>">
                <img src="<?php echo $hotel->get_imagenes()[1]->getImagen()[1]; ?>"></a>
        </div>
    </div>
<?php } ?>
</body>
</html>