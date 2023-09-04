<?php

require_once 'models/Usuario.php';

class UsuarioController
{

    public function index()
    {
        echo 'Controlador Usuarios, Accion INDEX';
    }

    public function register()
    {
        $usuario = new Usuario();

        $save = $usuario->save();

        if ($save) {
            $_SESSION['register'] = 'complete';
        } else {
            $_SESSION['register'] = 'failed';
        }

        header('Location: www.google.com');
    }
}
