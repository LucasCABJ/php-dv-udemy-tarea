<?php
require_once './models/Usuario.php';

class UsuarioController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        // echo 'Controlador Usuarios, Accion INDEX';
    }

    public function logout()
    {
        session_unset();
        header('Location:./');
        die();
    }

    public function login()
    {
        if (isset($_POST)) {

            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : false;

            if (!empty($email) && !empty($password)) {
            } else {
                $_SESSION['login'] = 'failed';
            }
        } else {
            $_SESSION['login'] = 'failed';
        }
    }

    public function register()
    {

        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : false;

            if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($password)) {

                $usuario = new Usuario($nombre, $apellido, $email, $password);

                $save = $usuario->save();

                if ($save) {
                    $_SESSION['register'] = 'complete';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        header('Location:./');
        die();
    }
}
