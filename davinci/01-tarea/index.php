<?php

require_once('./clases.php');

echo '<h1>Ejercicios facultad</h1>';

echo '<h2>Ejercicio 1:</h2>';

$persona1 = new Persona('Lucas', 'Caraballo', 20);
var_dump($persona1);
var_dump($persona1->isMayorEdad());


$persona2 = new Persona('Teo', 'Vanz', 14);
var_dump($persona2);
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

$vendedor = new Vendedor(2, 'Ezequiel', ['Villa Crespo', 'Almagro', 'Palermo']);

var_dump($vendedor->isTieneBarrio('Villa Crespo'));
var_dump($vendedor->isTieneBarrio('Colegiales'));




?>