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
        session_destroy();
        header('Location:./');
        die();
    }

    public function login()
    {
        if (isset($_POST)) {


            $email = isset($_POST['email']) ? mysqli_real_escape_string($this->db, $_POST['email']) : false;
            $password = isset($_POST['password']) ? trim($_POST['password']) : false;

            if (!empty($email) && !empty($password)) {

                $usuario = new Usuario();

                $usuario->setPassword($password);
                $usuario->setEmail($email);

                $search = $usuario->search();

                if ($search != false) {

                    $encrypted_password = password_verify($usuario->getPassword(), $search->password);

                    if ($encrypted_password) {

                        $usuario->setNombre($search->nombre);
                        $usuario->setApellidos($search->apellidos);
                        $usuario->setRol($search->rol);
                        $usuario->setImagen($search->imagen);

                        $_SESSION['userfirstname'] = $usuario->getNombre();
                        $_SESSION['useremail'] = $usuario->getEmail();
                    } else {
                        $_SESSION['login'] = 'failed';
                    }
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

            $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($this->db, $_POST['nombre']) : false;
            $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($this->db, $_POST['apellido']) : false;
            $email = isset($_POST['email']) ? mysqli_real_escape_string($this->db, $_POST['email']) : false;
            $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : false;

            if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($password)) {

                $usuario = new Usuario();

                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellido);
                $usuario->setPassword($password);
                $usuario->setEmail($email);

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
