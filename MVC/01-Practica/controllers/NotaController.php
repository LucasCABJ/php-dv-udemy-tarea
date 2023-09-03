<?php

class NotaController {

    private $db = Database::conectar();
    
    public function crearNota() {
        $query = "INSERT INTO entrada VALUES (NULL, 'Nota desde MVC', 'Lorem', CURDATE(), 1, 1)";

        $this->db->query($query);
    }

    public function mostrarNotas() {

        $notas = $this->db->query("SELECT * FROM entrada"); 

        require_once('view/Nota/mostrarNota.php');
    }
}