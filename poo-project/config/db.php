<?php

class Database
{

    public static function connect()
    {
        $db = new PDO('mysql:host=localhost;dbname=tienda', 'root', '');
        return $db;
    }
}
