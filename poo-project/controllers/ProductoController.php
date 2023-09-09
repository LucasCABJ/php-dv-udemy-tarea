<?php
require_once './models/Producto.php';

class ProductoController
{

    public function index()
    {
        require_once 'views/Producto/productosDestacados.php';
    }

    public function administrar()
    {

        if (!isset($_SESSION['usuario_role']) || $_SESSION['usuario_role'] != 'admin') {
            header('Location:./index.php');
        }

        require_once 'views/Producto/administrar.php';
    }

    public function agregar()
    {

        if (!isset($_SESSION['usuario_role']) || $_SESSION['usuario_role'] != 'admin') {
            header('Location:./index.php');
        }

        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : false;
            $categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : false;
            $precio = isset($_POST['precio']) ? trim($_POST['precio']) : false;
            $stock = isset($_POST['stock']) ? trim($_POST['stock']) : false;

            if (!empty($nombre) && !empty($descripcion) && !empty($categoria) && !empty($precio) && !empty($stock)) {

                $producto = new Producto($categoria, $nombre, $descripcion, $precio, $stock);
                var_dump($producto);
                $producto->save();
            }
        }

        require_once 'views/Producto/agregar.php';
    }
}
