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

    function ajustes()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location:./');
        }

        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
            $apellidos = isset($_POST['apellidos']) ? trim($_POST['apellidos']) : false;
            $email = isset($_POST['email']) ? trim($_POST['email']) : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;

            if (!empty($nombre) && !empty($apellidos) && !empty($email)) {

                $database_user = Usuario::getUserById($_SESSION['usuario_id']);

                if (empty($password) || $password == '') {
                    $updated_user = new Usuario($nombre, $apellidos, $email, $database_user->password);
                } else {
                    $updated_user = new Usuario($nombre, $apellidos, $email, password_hash($password, PASSWORD_BCRYPT));
                }

                $updated_user->id = $database_user->usuario_id;
                $updated_user->rol = $database_user->rol;
                $updated_user->imagen = $database_user->imagen;

                $success = $updated_user->save();

                // SESSION DATA
                if ($success) {
                    $_SESSION['user_update'] = 'success';
                    $_SESSION['userfirstname'] = $updated_user->nombre;
                    $_SESSION['usuario_role'] = $updated_user->rol;
                } else {
                    $_SESSION['user_update'] = 'failed';
                }
            }
        }

        $database_user = Usuario::getUserById($_SESSION['usuario_id']);

        require_once 'views/Usuario/ajustes.php';
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

            $email = isset($_POST['email']) ? trim($_POST['email']) : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;

            if (!empty($email) && !empty($password)) {
                $user = Usuario::verifyUser($email, $password);
                if ($user) {
                    // USER SESSION DATA
                    $_SESSION['userfirstname'] = $user->nombre;
                    $_SESSION['usuario_id'] = $user->usuario_id;
                    $_SESSION['usuario_role'] = $user->rol;
                } else {
                    $_SESSION['login'] = 'failed';
                }
            } else {
                $_SESSION['login'] = 'failed';
            }
        } else {
            $_SESSION['login'] = 'failed';
        }
        header('Location:./');
        die();
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
