<?php

class Producto
{

    private $data;

    function __construct($categoria_id, $nombre, $descripcion, $precio, $stock)
    {
        $this->data = array(
            "producto_id" => null,
            "categoria_id" => $categoria_id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock,
            "ofertas" => null,
            "fecha" => null,
            "imagen" => null
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
            INSERT INTO productos VALUES(
                NULL,
                :categoria_id,
                :nombre,
                :descripcion,
                :precio,
                :stock,
                null,
                NULL
            );
        ");

        $stm->bindValue(':categoria_id', $this->categoria_id);
        $stm->bindValue(':nombre', $this->nombre);
        $stm->bindValue(':descripcion', $this->descripcion);
        $stm->bindValue(':precio', $this->precio);
        $stm->bindValue(':stock', $this->stock);

        try {
            $success = $stm->execute();

            if ($success) {
                $this->producto_id = $db->lastInsertId();
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
            UPDATE productos SET
                nombre = :nombre,
                descripcion = :descripcion,
                stock = :stock
            WHERE producto_id = :id;
        ");
        $stm->bindValue(':id', $this->producto_id);
        $stm->bindValue(':categoria_id', $this->categoria);
        $stm->bindValue(':nombre', $this->nombre);
        $stm->bindValue(':descripcion', $this->descripcion);
        $stm->bindValue(':stock', $this->stock);

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
}
