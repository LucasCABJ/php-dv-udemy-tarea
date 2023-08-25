<?php

class Autoo {

    public $color;
    public $marca;
    public $modelo;
    public $velocidad;
    public $caballaje;

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }


}

$nuevo_auto = new Autoo();
var_dump($nuevo_auto->getColor());
$nuevo_auto->setColor('black');
var_dump($nuevo_auto->getColor());









?>