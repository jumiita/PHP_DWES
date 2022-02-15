<?php

class dbo extends mysqli
{
    public string $hostname = "localhost";
    public string $database = "examen2";
    public string $username = "root";
    public string $password = "";

    public function default(){
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database, );
        if (mysqli_connect_error()){
            die("Error en la base datos".mysqli_connect_error());
        }
    }

}