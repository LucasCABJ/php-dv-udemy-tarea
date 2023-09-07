<?php

class Usuario
{
    private $data;

    public function __construct($nombre, $apellidos, $email, $password)
    {
        $this->data = array(
            "id" => null,
            "nombre" => $nombre,
            "apellidos" => $apellidos,
            "email" => $email,
            "password" => $password,
            "rol" => null,
            "imagen" => null
        );
    }

    public function save()
    {
        if ($this->id == null) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }

    function insert()
    {
        $db = Database::connect();
        $stm = $db->prepare("
            INSERT INTO usuarios VALUES(
                NULL,
                :nombre,
                :apellidos,
                :email,
                :password,
                'user',
                NULL
            );
        ");
        $stm->bindValue(':nombre', $this->nombre);
        $stm->bindValue(':apellidos', $this->apellidos);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':password', $this->password);

        try {
            $success = $stm->execute();

            if ($success) {
                $this->id = $db->lastInsertId();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    function update()
    {
        $db = Database::connect();
        $stm = $db->prepare("
            UPDATE usuarios SET
                nombre = :nombre,
                apellidos = :apellidos,
                email = :email,
                password = :password,
                rol = 'user'
            );
        ");
        $stm->bindValue(':nombre', $this->nombre);
        $stm->bindValue(':apellidos', $this->apellidos);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':password', $this->password);

        try {
            $success = $stm->execute();

            if ($success) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    function __get($name)
    {
        return $this->data[$name];
    }

    function __set($name, $value)
    {
        return $this->data[$name] = $value;
    }

    static function searchByEmail($email)
    {
        $db = Database::connect();
        $stm = $db->prepare("
            SELECT * FROM usuarios
            WHERE email = :email;
        ");
        $stm->bindValue(':email', $email);

        try {
            $success = $stm->execute();

            if ($stm->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
