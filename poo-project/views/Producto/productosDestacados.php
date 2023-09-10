<?php require_once 'views/header.php' ?>
<section class='container mb-5'>

    <header class="row mb-3">
        <div class="col-12">
            <h2>Productos destacados</h2>
        </div>
    </header>

    <div class="row">

        <?php while ($producto = $productos->fetchObject()): ?>
            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="card bg-primary text-white">
                    <img src="http://via.placeholder.com/500x500
                    " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?=$producto->nombre?></h5>
                        <p class="card-text"><?=$producto->descripcion?></p>
                        <p class="card-text">$<?=$producto->precio?></p>
                        <a href="#" class="btn btn-secondary text-white rounded-0">Agregar al carrito</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>

</section>
<?php require_once 'views/footer.php' ?>