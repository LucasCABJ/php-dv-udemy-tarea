<?php require_once 'views/header.php' ?>
<section class='container mb-5' style="min-height: 75vh">

    <a href="./index.php"
        class='btn btn-theme-grey rounded-0 mb-2 text-white'>Volver a inicio</a>

    <header class="row mb-3">
        <div class="col-12">
            <h2 class='text-center'>Administrar Productos</h2>
        </div>
    </header>

    <a href="./index.php?controller=producto&action=agregar" class='btn btn-secondary rounded-0 mb-2 text-white'>Agregar
        Producto</a>

    <table class="table" style="">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $productos = ProductoController::getAll(); ?>
            <?php while ($producto = $productos->fetchObject()): ?>
                <tr>
                    <th scope="row">
                        <?= $producto->producto_id ?>
                    </th>
                    <td>
                        <?= $producto->nombre ?>
                    </td>
                    <td>
                        $
                        <?= $producto->precio ?>
                    </td>
                    <td>
                        <?= $producto->stock ?>
                    </td>
                    <td>
                        <a href="#" class="btn rounded-0 btn-theme-grey">Editar</a>
                        <a href="#" class="btn rounded-0 btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>

        </tbody>
    </table>

    </article>

</section>
<?php require_once 'views/footer.php' ?>