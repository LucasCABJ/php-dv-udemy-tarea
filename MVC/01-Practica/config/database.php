<?php

class Database {
    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "blog");

        return $conexion;
    }
}