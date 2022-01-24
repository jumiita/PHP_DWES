<?php

class sqlJuma extends mysqli {
    private string $hostname = 'localhost';
    private string $username = "root";
    private string $password = "";
    private string $database = "jumaWeb";

    public function default(){
        $this->local();
    }

    public function local(){
        parent::__construct($this->hostname,$this->this->username,$this->password,$this->database);

        if (mysqli_connect_error()){
            die("ERROR DATABASE".mysqli_connect_error());
        }
    }
    public function creacion_tabla(){
        $sql = "CREATE TABLE if not exists usuarios(id int auto_increment, usuario varchar(100),email varchar(120),password varchar(60));";
        $this->default();
        $this->query($sql);
        $this->close();
    }

}