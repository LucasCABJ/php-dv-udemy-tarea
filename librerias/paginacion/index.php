<?php

require_once '../vendor/autoload.php';

$db = new mysqli("localhost", 'root', '', 'blog');

$consulta = $db->query('SELECT * FROM entrada;');
$nro_elementos = $consulta->num_rows;
$nro_elementos_por_pagina = 2;

// Crear paginacion
$pagination = new Zebra_Pagination();

// Numero total de elementos a paginar
$pagination->records($nro_elementos);

// Numero de elementos por pagina
$pagination->records_per_page(2);

$page = $pagination->get_page();

echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';

$comienzo_pag = ($page - 1) * $nro_elementos_por_pagina;
$sql = "SELECT * FROM entrada LIMIT $comienzo_pag, $nro_elementos_por_pagina";
$notas = $db->query($sql);

while ($nota = $notas->fetch_object()) {
    echo "<h1>$nota->nombre</h1>";
}

$pagination->render();
