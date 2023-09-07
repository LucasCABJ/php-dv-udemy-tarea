<?php
session_start();
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'autoload.php';

class App
{

    function __construct()
    {
        if (isset($_GET['controller']) && class_exists($_GET['controller'] . 'Controller')) {

            $nombre_controller = $_GET['controller'] . 'Controller';

            $controlador = new $nombre_controller();

            if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                $action = $_GET['action'];
                $controlador->$action();
            } else {
                require_once 'views/Error/pagefailed.php';
            }
        } else {
            $controlador = new ProductoController();
            $controlador->index();
        }
    }
}
