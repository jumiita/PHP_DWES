<?php
include("caracter.php");
include ("episodio.php");
include ("locations.php");
include ("rickandMorty.php");

function create_districts_table(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "provincias";
    // Creamos la conexion en base a las variables que hemos creado anteriormente.
    $conn = mysqli_connect($servername, $username, $password,$dbname);

    // Aquí creamos la tabla  con los elementos que llevara dentro.
    //$sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";
    $sql = "create table provincias (id int,nombre varchar(255), delegados int) ";

    //Con esta variable hacemos la conexion y la introduccion de datos en forma de query.
    $conn->query($sql);


//Importante siempre cerrar la conexión, que se hace con esta sentencia.
    mysqli_close($conn);
}
function create_resultados_table(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resultados";
    // Creamos la conexion en base a las variables que hemos creado anteriormente.
    $conn = mysqli_connect($servername, $username, $password,$dbname);

    // Aquí creamos la tabla  con los elementos que llevara dentro.
    //$sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";
    $sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";

    //Con esta variable hacemos la conexion y la introduccion de datos en forma de query.
    $conn->query($sql);


    //Importante siempre cerrar la conexión, que se hace con esta sentencia.
    mysqli_close($conn);
}

function create_partidos_table(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "partidos";
    // Creamos la conexion en base a las variables que hemos creado anteriormente.
    $conn = mysqli_connect($servername, $username, $password,$dbname);

    // Aquí creamos la tabla  con los elementos que llevara dentro.
    //$sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";
    $sql = "create table partidos (id int,name varchar(255), acronym varchar(50), logo varchar(255)) ";

    //Con esta variable hacemos la conexion y la introduccion de datos en forma de query.
    $conn->query($sql);


    //Importante siempre cerrar la conexión, que se hace con esta sentencia.
    mysqli_close($conn);
}

function insert_districts_records($records){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "provincias";
    // Creamos la conexion en base a las variables que hemos creado anteriormente.
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    // Aquí creamos la tabla  con los elementos que llevara dentro.
    //$sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";
    $sql="";
    foreach ($records as $record){
        $sql .= "INSERT INTO provincias (id, nombre, delegados) VALUES ($record->getId(), $record->getNombre(), $record->getDelegates());";
    }
    //Con esta variable hacemos la conexion y la introduccion de datos en forma de query.
    $conn->query($sql);

//Importante siempre cerrar la conexión, que se hace con esta sentencia.
    mysqli_close($conn);
}

function insert_partidos_records($records){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "partidos";
    // Creamos la conexion en base a las variables que hemos creado anteriormente.
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    // Aquí creamos la tabla  con los elementos que llevara dentro.
    //$sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";
    $sql="";
    foreach ($records as $record){
        $sql .= "INSERT INTO partidos (id, name, acronym, logo) VALUES ($record->getId(), $record->getName(), $record->getAcronym(),$record->getLogo());";
    }
    //Con esta variable hacemos la conexion y la introduccion de datos en forma de query.
    $conn->query($sql);
//Importante siempre cerrar la conexión, que se hace con esta sentencia.
    mysqli_close($conn);
}

function insert_resultados_records($records){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "resultados";
    // Creamos la conexion en base a las variables que hemos creado anteriormente.
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    // Aquí creamos la tabla  con los elementos que llevara dentro.
    //$sql = "create table resultados (distrito varchar(255),partido varchar(255), votos int) ";
    $sql="";
    foreach ($records as $record){
        $sql .= "INSERT INTO resultados (district, party, votes) VALUES ($record->getDistrict(), $record->getParty(), $record->getVotes());";
    }
    //Con esta variable hacemos la conexion y la introduccion de datos en forma de query.
    $conn->query($sql);


//Importante siempre cerrar la conexión, que se hace con esta sentencia.
    mysqli_close($conn);
}


?>