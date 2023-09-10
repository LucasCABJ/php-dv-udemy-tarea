<?php

class Database
{

    public static function connect()
    {
        $db = new PDO('mysql:host=localhost;dbname=tienda', 'test', '');
        return $db;
    }
}
