<?php

class Nota {

    private $titulo;
    private $contenido;
    private $fecha;

    public function __construct($titulo, $contenido, $fecha) {
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->fecha = $fecha;
    }

    public function getTitulo() { return $this->titulo; }
    public function getContenido() { return $this->contenido; }
    public function getFecha() { return $this->fecha; }

}