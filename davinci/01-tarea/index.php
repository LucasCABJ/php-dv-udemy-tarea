<?php

require_once('./clases.php');

echo '<h1>Ejercicios facultad</h1>';

echo '<h2>Ejercicio 1:</h2>';


$persona1 = new Persona('Lucas', 'Caraballo', 20);
echo '<p>var_dump de Persona:</p>';
var_dump($persona1);
echo '<p>var_dump de Persona->isMayorEdad():</p>';
var_dump($persona1->isMayorEdad());


$persona2 = new Persona('Teo', 'Vanz', 14);
echo '<p>var_dump de Persona:</p>';
var_dump($persona2);
echo '<p>var_dump de Persona->isMayorEdad():</p>';
var_dump($persona2->isMayorEdad());

echo '<h2>Ejercicio 2:</h2>';

$evento = new Evento('Taller de programacion NGS', true);
var_dump($evento->addInvitado($persona1));
var_dump($evento->addInvitado($persona2));
var_dump($evento);

echo '<h2>Ejercicio 3:</h2>';

$auto = new Auto(4);
var_dump($auto);
$moto = new Moto();
var_dump($moto);
$camion = new Camion(8);
var_dump($camion);

echo '<h2>Ejercicio 4:</h2>';

$vendedor = new Vendedor(1, 'Ezequiel', ['Villa Crespo', 'Almagro', 'Palermo']);

echo '<p>var_dump de Vendedor->isTieneBarrio():</p>';
var_dump($vendedor->isTieneBarrio('Villa Crespo'));
echo '<p>var_dump de Vendedor->isTieneBarrio():</p>';
var_dump($vendedor->isTieneBarrio('Colegiales'));

echo '<h2>Ejercicio 5:</h2>';

$lista_vendedores = [
    new Vendedor(1, 'Gonzalo', array('Villa Crespo', 'Caballito', 'Almagro')),
    new Vendedor(2, 'Ezequiel', array('Villa Crespo', 'Almagro', 'Palermo')),
    new Vendedor(3, 'Valeria', array('San Telmo', 'Boca', 'San Telmo')),
    new Vendedor(4, 'Gastón', array('Liniers', 'Flores', 'Villa Lugano')),
    new Vendedor(5, 'Ornella', array('Colegiales', 'Chacarita', 'Paternal'))
];

echo '<p>var_dump de metodo getByCodigo con parametro id=7:</p>';
var_dump(VendedorBuscador::getByCodigo($lista_vendedores, 7));
echo '<p>var_dump de metodo getByCodigo con parametro id=3:</p>';
var_dump(VendedorBuscador::getByCodigo($lista_vendedores, 3));

echo '<p>var_dump de metodo countByBarrio con parametro Villa Crespo:</p>';
var_dump(VendedorBuscador::countByBarrio($lista_vendedores, 'Villa Crespo'));
echo '<p>var_dump de metodo countByBarrio con parametro Liniers:</p>';
var_dump(VendedorBuscador::countByBarrio($lista_vendedores, 'Liniers'));
echo '<p>var_dump de metodo countByBarrio con parametro Belgrano:</p>';
var_dump(VendedorBuscador::countByBarrio($lista_vendedores, 'Belgrano'));


?>