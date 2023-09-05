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

    public function search()
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email';";
        $save = $this->db->query($sql);
        if ($save != false and $save->num_rows == 1) {
            return mysqli_fetch_object($save);
        } else {
            return false;
        }
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id 
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre 
     * @return self
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos 
     * @return self
     */
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email 
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password 
     * @return self
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol 
     * @return self
     */
    public function setRol($rol): self
    {
        $this->rol = $rol;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen 
     * @return self
     */
    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db 
     * @return self
     */
    public function setDb($db): self
    {
        $this->db = $db;
        return $this;
    }
}
