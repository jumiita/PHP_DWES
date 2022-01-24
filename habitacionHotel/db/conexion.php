<?php

class conexion extends mysqli
{

    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "hoteles";

    public function default()
    {
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {
            die("ERROR DATABASE" . mysqli_connect_error());
        }

    }
}


?>