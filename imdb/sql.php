<?php

include_once "pelicula.php";
include_once  "staff.php";
include_once  "multimedia.php";

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
        //<iframe width="853" height="480" src="https://www.youtube.com/embed/AkhlguVbebU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        $sql = "select * from multimedia where id=".$id;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new multimedia($result["id"],$result["url"],$result["yt"]);
        return $return;

    }

    /** hago pipi */
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



    public function get_buscar($palabra){
        $sql = "SELECT * FROM `pelicula` WHERE titulo like '%$palabra%';";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $return = new pelicula($result["id"], $this->get_img_video($result["idMultimedia"]), $result["titulo"], $result["genero"], $result["puntuacion"], $this->get_staff($result["idStaff"]), $result["descripcion"]);
        return $return;
    }



}

?>