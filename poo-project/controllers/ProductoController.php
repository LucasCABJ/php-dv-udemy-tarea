<?php
require_once './models/Producto.php';

class ProductoController
{

    public function index()
    {
        $productos = Producto::getAll();

        require_once 'views/Producto/productosDestacados.php';
    }

    static function getAll()
    {
        $productos = Producto::getAll();
        return $productos;
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
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if (!empty($nombre) && !empty($descripcion) && !empty($categoria) && !empty($precio) && !empty($stock)) {

                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == "image/jpeg" || $mimetype == "image/jpg" || $mimetype == "image/png" || $mimetype == "image/gif") {

                    if(!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);

                    $producto = new Producto($categoria, $nombre, $descripcion, $precio, $stock, $filename);

                    $success = $producto->save();

                    if ($success) {
                        $_SESSION['product_add'] = "success";
                    } else {
                        $_SESSION['product_add'] = "failed";
                    }
                } else {
                    $_SESSION['product_add'] = "failed";
                }
            }
        }

        require_once 'views/Producto/agregar.php';
    }
}