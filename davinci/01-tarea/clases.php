<?php

class Persona {

    private $nombre;
    private $apellidos;
    private $edad;

    public function __construct($nombre, $apellidos, $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function isMayorEdad() {
        return $this->edad >= 18;
    }

}

class Evento {

    private $nombre;
    private $is_mayor_edad; 
    private $invitados = array();

    public function __construct($nombre, $is_mayor_edad){
        $this->nombre = $nombre;
        $this->is_mayor_edad = $is_mayor_edad;
    }

    public function addInvitado(Persona $persona) {

        if($this->is_mayor_edad && $persona->isMayorEdad()) {
            array_push($this->invitados, $persona);
            return true;
        } elseif (!$this->is_mayor_edad) {
            array_push($this->invitados, $persona);
            return true;
        }
        return false;
    }

}

class Vehiculo {

    private $cant_puertas;
    private $cant_ruedas;

    public function __construct($cant_puertas, $cant_ruedas) {
        $this->cant_puertas = $cant_puertas;
        $this->cant_ruedas = $cant_ruedas;
    }

}

class Moto extends Vehiculo {

    public function __construct() {
        parent::__construct(0, 2);
    }

}

class Auto extends Vehiculo {

    public function __construct($cant_puertas) {
        parent::__construct($cant_puertas, 4);
    }

}

class Camion extends Vehiculo {

    public function __construct($cant_ruedas) {
        parent::__construct(2, $cant_ruedas);
    }

}

class Vendedor {

    private $id;
    private $nombre;
    private $barrios;

    public function __construct($id, $nombre, $barrios) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->barrios = $barrios;
    }

    public function getBarrios() {
        return $this->barrios;
    }
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function isTieneBarrio($barrio) {
        return in_array($barrio, $this->barrios);
    }

}

class VendedorBuscador {

    public static function getByCodigo($vendedores, $id) {

        foreach($vendedores as $vendedor) {

            if($vendedor->getId() == $id) {
                return $vendedor;
            }

        }

        return null;

    }

    public static function countByBarrio($vendedores, $barrio) {

        $contador = 0;

        foreach($vendedores as $vendedor) {

            foreach($vendedor->getBarrios() as $b) {
                
                if ($b == $barrio) {
                    $contador++;
                }

            }

        }

        return $contador;

    }

}





?>