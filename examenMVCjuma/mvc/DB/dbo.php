<?php

class dbo extends mysqli{
    private string $username = "root";
    private string $hostname = "localhost";
    private string $database = "IMDB";
    private string $password = "";

    public function default()
    {
        $this->local();
    }

    public function local(){
        parent::__construct($this->hostname,$this->username,$this->password,$this->database);
        if (mysqli_connect_error()){
            die("Error base de datos:".mysqli_connect_error());
        }
    }
}