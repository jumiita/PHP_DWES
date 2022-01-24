<?php

include_once "pelicula.php";
include_once  "staff.php";
include_once  "multimedia.php";
include_once  "usuarios.php";
include_once "comentarios.php";
include_once  "innerjoin.php";
include_once "puntuacion.php";

class sql extends mysqli{

    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "IMDB";

    public function default(){
        $this->local();
    }

    public function local(){
        parent::__construct($this->hostname,$this->username,$this->password,$this->database);

        if (mysqli_connect_error()){
            die("ERROR DATABASE".mysqli_connect_error());
        }

    }

    public function get_img_video($id){
        $sql = "select * from imagen where id=".$id;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new imagen($result["id"],$result["url"],$result["yt"]);
        return $return;

    }

    /** Hacemos un select según id */
    public function get_staff($id){
        $sql = "select * from staff where id=".$id;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new staff($result["id"],$result["director"],$result["protagonista"],$result["guion"],$result["reparto_principal"]);
        return $return;

    }
    public function get_pelicula(){
        $sql = "select * from pelicula";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return []= new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        }
        return $return;
    }
    public function get_pelicula_by_id($id){
        $sql = "select * from pelicula where id=".$id;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        return $return;
    }

    public function get_order_by_AZ(){
        $sql = "SELECT * FROM pelicula ORDER BY titulo ASC;";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return []= new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        }
        return $return;
    }

    public function get_order_by_genero(){
        $sql = "SELECT * FROM `pelicula` ORDER BY `genero` ASC;";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return []= new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        }
        return $return;
    }

    public function get_order_by_puntuacion(){
        $sql = "SELECT * FROM `pelicula` ORDER by `puntuacion` ASC;";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return []= new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        }
        return $return;
    }

///////////////////////////////////////////////////////////////////////////////////////////////
/// OJO CUIDADO QUE A VECES NO USAS ARRAYS Y A VECES SI; FALLO MUY COMUN !
    public function buscar_pelicula($palabra){
        $sql = "SELECT * FROM `pelicula` WHERE titulo like '%".$palabra."%';";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return []= new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        }
        return $return;
    }

    public function comprobar_login($email, $password){
        //para comparar la contraseña hacemos este select que compara el email con el email que introducimos.
        $sql= "select * from `usuarios` where email = '".$email."';";
        $this->default();
        $query = $this->query($sql);
        $result = $query->fetch_assoc();
        $this->close();
        //Comprobamos que la contraseña que metemos es igual a la que tenemos en la base de datos
        if (hash_equals(crypt($password,$result['password']),$result['password'])){//password_verify($password,$result['password'])){   hash_equals(crypt($password,$result["password"]),$result["password"])
            return true;
        }else{
            return false;
        }
    }

    public function sacar_id($email)
    {
        //para comparar la contraseña hacemos este select que compara el email con el email que introducimos.
        $sql = "select id from `usuarios` where email = '" . $email . "';";
        $this->default();
        $query = $this->query($sql);
        $result = $query->fetch_assoc();
        $this->close();
        return $result["id"];
    }

    public function mostrar_comentarios($id){
        $sql = "SELECT comentarios.`comentario`,pelicula.`titulo`,usuarios.`nombre`,pelicula.`puntuacion`,pelicula.`id`,comentarios.`puntuacion` as punt
        FROM comentarios as comentarios INNER JOIN usuarios as usuarios on comentarios.idUsuario = usuarios.id 
            INNER JOIN pelicula as pelicula on comentarios.idPelicula = pelicula.id WHERE pelicula.id = ".$id.";";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $return = array();
        while ($result = $query->fetch_assoc()) {
            $return []= new innerjoin($result["comentario"], $result["titulo"], $result["nombre"], $result["puntuacion"], $result["id"],$result["punt"]);
        }
        return $return;
    }

    // Funcion que inserta el ususario a la tabla la cual recibe por parametro los datos del formulario
    public function crear_usuario($email, $nombre, $contrasenia){
        //Variable que coge los datos del formulario y hace la consulta.
        $sql= "insert into `usuarios` (email, nombre, password) values ('".$email."','".$nombre."','". $contrasenia."');";
        //Hace la conexión
        $this->default();
        //Creamos la condicion, si la consulta es diferente a la consulta
        // que hemos creado en la linea 123 imprima un alerta de js
        if (!mysqli_query($this,$sql)){
            //Imprimimos el alert
            echo '<script>alert("Email ya registrado, introduce otro email");
            </script>';header("Location:login.php");
        } else{
            echo '<script>alert("Te has registrado");
                    </script>';header("Location:main.php");
        }
        //Cerramos la consulta.
        $this->close();
    }

    public function insertar_comentario($comentario, $id,$idUser,$puntuacion){
         $sql = "INSERT INTO `comentarios`( `comentario`, `idPelicula`, `idUsuario`,`puntuacion`) VALUES ('$comentario',$id,$idUser,$puntuacion);";
         $this->default();
         $this->query($sql);
         $this->close();
    }
    public function mostrar_nombre($id){
        $sql = "SELECT nombre FROM `usuarios` WHERE id=$id;";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        return $query->fetch_assoc();
    }
}

?>