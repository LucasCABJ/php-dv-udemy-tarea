<?php

class Categoria
{

    private $data;

    function __construct($nombre)
    {
        $this->data = array(
            "categoria_id" => null,
            "nombre" => $nombre,
        );
    }

    function __get($name)
    {
        return $this->data[$name];
    }

    function __set($name, $value)
    {
        return $this->data[$name] = $value;
    }

    public function save()
    {
        if ($this->producto_id == null) {
            return $this->insert();
        } else {
            return $this->update();
        }
    }

    function insert()
    {
        $db = Database::connect();
        $stm = $db->prepare("
            INSERT INTO categorias VALUES(
                NULL,
                :nombre
            );
        ");

        $stm->bindValue(':nombre', $this->nombre);

        try {
            $success = $stm->execute();

            if ($success) {
                $this->categoria_id = $db->lastInsertId();
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
            UPDATE categorias SET
                nombre = :nombre,
            WHERE categoria_id = :id;
        ");
        $stm->bindValue(':id', $this->producto_id);
        $stm->bindValue(':categoria_id', $this->categoria_id);

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

    static function getAll() {
        $db = Database::connect();
        $stm = $db->prepare("
            SELECT * FROM categorias ORDER BY nombre;
        ");
        $stm->execute();

        return $stm;
    }
}
