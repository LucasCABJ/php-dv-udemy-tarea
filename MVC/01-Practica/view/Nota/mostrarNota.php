<?php while($nota = $notas->fetch_object())?>

<div class="card">
    <h3><?=$nota->getTitulo();?></h3>
    <h4><?=$nota->getFecha();?></h4>
    <p><?=$nota->getContenido();?></p>
</div>