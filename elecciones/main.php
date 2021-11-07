<?php
include("funciones.php");
?>

//En esta clase main he decidido dejar solo el html para no saturar ya que como consejo de un compañero de trabajo.
//En el main anterior llegue a las 450 lineas y era muy lioso cada vez que llamas a una funcion o si te falla algo..
<html lang="es">
<head>
    <title>Election Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="funcionesParaFormularios.js"></script>
    <style>body {
            margin: 20px
        }
        select {
            margin-bottom: 10px;
        }
        .form-group.district
        , .form-group.party{
            display: none;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="form-group general">
        <select class="form-control" name="first_filter" id="first_filter">
            <option value="" selected >Seleccionar filtrado</option>
            <option value="global">Resultados generales</option>
            <option value="districts" >Filtrar por provincia</option>
            <option value="parties" >Filtrar por partido</option>
        </select>
    </div>
    <div class="form-group district">
        <select class="form-control" name="district_filter" id="district_filter">
            <option value=''>Selecciona una circumscripción</option>
            <option  value='1'>Madrid</option>
            <option  value='2'>Barcelona</option>
            <option  value='3'>València</option>
            <option  value='4'>Alacant</option>
            <option  value='5'>Sevilla</option>
            <option  value='6'>Málaga</option>
            <option  value='7'>Murcia</option>
            <option  value='8'>Cádiz</option>
            <option  value='9'>Illes Balears</option>
            <option  value='10'>A Coruña</option>
            <option  value='11'>Las Palmas</option>
            <option  value='12'>Bizkaia</option>
            <option  value='13'>Asturias</option>
            <option  value='14'>Granada</option>
            <option  value='15'>Pontevedra</option>
            <option  value='16'>Santa Cruz de Tenerife</option>
            <option  value='17'>Zaragoza</option>
            <option  value='18'>Almería</option>
            <option  value='19'>Badajoz</option>
            <option  value='20'>Córdoba</option>
            <option  value='21'>Girona</option>
            <option  value='22'>Gipuzkoa</option>
            <option  value='23'>Tarragona</option>
            <option  value='24'>Toledo</option>
            <option  value='25'>Cantabria</option>
            <option  value='26'>Castelló</option>
            <option  value='27'>Ciudad Real</option>
            <option  value='28'>Huelva</option>
            <option  value='29'>Jaén</option>
            <option  value='30'>Navarra</option>
            <option  value='31'>Valladolid</option>
            <option  value='32'>Araba</option>
            <option  value='33'>Albacete</option>
            <option  value='34'>Burgos</option>
            <option  value='35'>Cáceres</option>
            <option  value='36'>León</option>
            <option  value='37'>Lleida</option>
            <option  value='38'>Lugo</option>
            <option  value='39'>Ourense</option>
            <option  value='40'>La Rioja</option>
            <option  value='41'>Salamanca</option>
            <option  value='42'>Ávila</option>
            <option  value='43'>Cuenca</option>
            <option  value='44'>Guadalajara</option>
            <option  value='45'>Huesca</option>
            <option  value='46'>Palencia</option>
            <option  value='47'>Segovia</option>
            <option  value='48'>Teruel</option>
            <option  value='49'>Zamora</option>
            <option  value='50'>Soria</option>
            <option  value='51'>Ceuta</option>
            <option  value='52'>Melilla</option>
        </select>
    </div>
    <div class="form-group party">
        <select class="form-control" name="party_filter" id="party_filter">
            <option value=''>Selecciona un partido</option>
            <option  value='1'>PARTIDO SOCIALISTA OBRERO ESPAÑOL</option>
            <option  value='2'>PARTIDO POPULAR</option>
            <option  value='3'>VOX</option>
            <option  value='4'>UNIDAS PODEMOS</option>
            <option  value='5'>CIUDADANOS-PARTIDO DE LA CIUDADANÍA</option>
            <option  value='6'>ESQUERRA REPUBLICANA DE CATALUNYA-SOBIRANISTES</option>
            <option  value='7'>EN COMÚ PODEM-GUANYEM EL CANVI</option>
            <option  value='8'>JUNTS PER CATALUNYA-JUNTS</option>
            <option  value='9'>EUZKO ALDERDI JELTZALEA-PARTIDO NACIONALISTA VASCO</option>
            <option  value='10'>MÁS PAÍS-EQUO</option>
            <option  value='11'>EUSKAL HERRIA BILDU</option>
            <option  value='12'>CANDIDATURA D'UNITAT POPULAR-PER LA RUPTURA</option>
            <option  value='13'>PARTIDO ANIMALISTA CONTRA EL MALTRATO ANIMAL</option>
            <option  value='14'>EN COMÚN-UNIDAS PODEMOS</option>
            <option  value='15'>MÉS COMPROMÍS</option>
            <option  value='16'>COALICIÓN CANARIA-NUEVA CANARIAS</option>
            <option  value='17'>BLOQUE NACIONALISTA GALEGO</option>
            <option  value='18'>NAVARRA SUMA</option>
            <option  value='19'>PARTIDO REGIONALISTA DE CANTABRIA</option>
            <option  value='20'>MÁS PAÍS</option>
            <option  value='21'>RECORTES CERO-GRUPO VERDE</option>
            <option  value='22'>POR UN MUNDO MÁS JUSTO</option>
            <option  value='23'>MÁS PAÍS-CHUNTA ARAGONESISTA-EQUO</option>
            <option  value='24'>AGRUPACIÓN DE ELECTORES TERUEL EXISTE</option>
            <option  value='25'>MÉS ESQUERRA</option>
            <option  value='26'>ANDALUCÍA POR SÍ</option>
            <option  value='27'>PARTIDO COMUNISTA DE LOS PUEBLOS DE ESPAÑA</option>
            <option  value='28'>PARTIDO COMUNISTA DE LOS TRABAJADORES DE ESPAÑA</option>
            <option  value='29'>GEROA BAI</option>
            <option  value='30'>UNIÓN DEL PUEBLO LEONÉS</option>
            <option  value='31'>PARTIDO COMUNISTA OBRERO ESPAÑOL</option>
            <option  value='32'>COALICIÓN POR MELILLA</option>
            <option  value='33'>ESCAÑOS EN BLANCO</option>
            <option  value='34'>ESQUERRA REPUBLICANA DEL PAÍS VALENCIÀ</option>
            <option  value='35'>POR ÁVILA</option>
            <option  value='36'>AVANT ADELANTE LOS VERDES</option>
            <option  value='37'>LOS VERDES</option>
            <option  value='38'>PARTIDO HUMANISTA</option>
            <option  value='39'>INICIATIVA FEMINISTA</option>
            <option  value='40'>SOM VALENCIANS EN MOVIMENT</option>
            <option  value='41'>SOMOS REGIÓN</option>
            <option  value='42'>IZQUIERDA EN POSITIVO</option>
            <option  value='43'>AHORA CANARIAS: Alternativa Nacionalista Canaria (ANC) y Unidad del Pueblo</option>
            <option  value='44'>CONTIGO SOMOS DEMOCRACIA</option>
            <option  value='45'>CHUNTA ARAGONESISTA</option>
            <option  value='46'>PLATAFORMA DEL PUEBLO SORIANO</option>
            <option  value='47'>EXTREMADURA UNIDA</option>
            <option  value='48'>PARTIDO DEMÓCRATA SOCIAL JUBILADOS EUROPEOS</option>
            <option  value='49'>PARTIDO LIBERTARIO</option>
            <option  value='50'>MOVIMIENTO ARAGONES SOCIAL</option>
            <option  value='51'>UNIDOS Actuando por la Democracia</option>
            <option  value='52'>PARTIDO REGIONALISTA DEL PAÍS LEONÉS</option>
            <option  value='53'>ANDECHA ASTUR</option>
            <option  value='54'>MOVIMIENTO POR LA DIGNIDAD Y LA CIUDADANÍA DE CEUTA</option>
            <option  value='55'>PUYALON</option>
            <option  value='56'>FALANGE ESPAÑOLA DE LAS JONS</option>
            <option  value='57'>AUNA COMUNITAT VALENCIANA</option>
            <option  value='58'>UNIÓN REGIONALISTA DE CASTILLA Y LEÓN</option>
            <option  value='59'>CONVERGENCIA ANDALUZA</option>
            <option  value='60'>FEDERACIÓN DE LOS INDEPENDIENTES DE ARAGÓN</option>
            <option  value='61'>PARTIDO DE ACCIÓN SOLIDARIA EUROPEA</option>
            <option  value='62'>PARTIDO REPUBLICANO INDEPENDIENTE SOLIDARIO ANDALUZ</option>
            <option  value='63'>CENTRADOS</option>
            <option  value='64'>DEMOCRACIA PLURAL</option>
            <option  value='65'>IZQUIERDA ANTICAPITALISTA REVOLUCIONARIA</option>
            <option  value='66'>CONVERXENCIA 21</option>
            <option  value='67'>UNIÓN DE TODOS</option>
        </select>
    </div>

</body>

<div id="tabla_calculos"></div>