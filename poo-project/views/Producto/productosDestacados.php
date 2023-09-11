<?php require_once 'views/header.php' ?>
<section class='container mb-5'>

    <header class="row mb-3">
        <div class="col-12">
            <h2>Productos destacados</h2>
        </div>
    </header>

    <div class="row">

        <?php while ($producto = $productos->fetchObject()): ?>
            <div class="col-12 mb-3 product-card">
                <div class="d-flex flex-column flex-lg-row bg-primary text-white" style="min-height:200px">
                    <img src="./uploads/images/<?= $producto->imagen?>
                    " class="img-fluid p-3" style="max-height: 200px; object-fit: contain; background-color: #fff;" alt="...">
                    <div class="p-3">
                        <h5 class="card-title" title="<?=$producto->nombre?>"><?=substr($producto->nombre, 0, 30)?>...</h5>
                        <p class="card-text" title="<?=$producto->descripcion?>"><?=substr($producto->descripcion, 0, 40)?>...</p>
                        <p class="card-text fs-3">$<?=$producto->precio?></p>
                        <a href="#" class="btn btn-secondary text-white rounded-0"><i class="fa-solid fa-shopping-cart me-2"></i>Agregar al carrito</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>

</section>
<?php require_once 'views/footer.php' ?>