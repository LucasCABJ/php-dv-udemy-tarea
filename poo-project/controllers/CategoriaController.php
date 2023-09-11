<?php

require_once "models/Categoria.php";

class CategoriaController
{

    public function index()
    {
        echo 'Controlador Categoria, Accion INDEX';
    }

    static function getAll() {
        return Categoria::getAll();
    }
}
