<?php

class Usuario
{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL, '$this->nombre', '$this->apellidos', '$this->email', '$this->password',
        'user',  NULL);";
        $save = $this->db->query($sql);

        if ($save) {
            return true;
        } else {
            return false;
        }
    }
}
