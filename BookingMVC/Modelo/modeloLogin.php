<?php
include_once "../DB/dbo.php";
include_once "../Entidades/usuarios.php";

class modeloLogin
{
    private dbo $db;

    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getUser($mail, $password): usuarios
    {
        $sql = "SELECT * FROM `usuarios` WHERE `email` = '".$mail."';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($result = $query->fetch_assoc()) {
            if (crypt($password, $result["password"]) == $result["password"]) {
                return new usuarios($result["id_cliente"], $result["email"], $result["password"],$result['nombre'],$result['telefono']);
            }
        }
        return new usuarios(0, "-", "-",0);
    }
}

?>