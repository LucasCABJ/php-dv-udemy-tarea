<?php

class UsuarioController {

    public function create() {

        require_once 'models/Usuario.php';

        $usuario = new Usuario('Lucas', 'Caraballo');

        require_once 'view/Usuario/mostrarUsuario.php';
    }

}



?>