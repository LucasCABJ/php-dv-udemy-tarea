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

    public function modify()
    {

        // $user = new Usuario(
        //     $database_user->nombre,
        //     $database_user->apellidos,
        //     $database_user->email,
        //     $database_user->password
        // );

        // $user->id = $database_user->usuario_id;
        // $user->rol = $database_user->rol;
        // $user->imagen = $database_user->imagen;
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
                password = :password
            WHERE usuario_id = :id;
        ");
        $stm->bindValue(':nombre', $this->nombre);
        $stm->bindValue(':apellidos', $this->apellidos);
        $stm->bindValue(':email', $this->email);
        $stm->bindValue(':password', $this->password);
        $stm->bindValue(':id', $this->id);

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
            $stm->execute();

            if ($stm->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    static function verifyUser($email, $password)
    {
        $db = Database::connect();
        $stm = $db->prepare("
            SELECT * FROM usuarios
            WHERE email = :email;
        ");
        $stm->bindValue(':email', $email);

        try {
            $stm->execute();

            if ($stm->rowCount() > 0) {

                $record = $stm->fetchObject();
                $valid_password = password_verify($password, $record->password);

                if ($valid_password) {
                    return $record;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    static function getUserById($id)
    {
        $db = Database::connect();
        $stm = $db->prepare("
            SELECT * FROM usuarios
            WHERE usuario_id = :id;
        ");
        $stm->bindValue(':id', $id);

        try {
            $stm->execute();

            if ($stm->rowCount() > 0) {

                return $stm->fetchObject();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
