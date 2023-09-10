<?php require_once 'views/header.php' ?>
<section class='container mb-5'>

    <header class="row mb-3">
        <div class="col-12">
            <h2 class='text-center'>Agregar Producto</h2>
        </div>
    </header>

    <article>

        <form action="./index.php?controller=producto&action=agregar" method="POST" class="mb-2">
            <div class="mb-3">
                <label for="nombre" class="form-label">Imagen del producto</label>
                <input type="file" name="imagen" class="form-control" id="imagen" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" id="descripcion" rows="3" name="descripcion" style="resize: none;"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" id="categoria" aria-label="Default select example">
                    <option selected disabled>--Elegir categoria--</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control" id="precio" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" aria-describedby="emailHelp" required>
            </div>

            <button type="submit" class="btn btn-secondary text-white">Agregar Producto</button>
        </form>


    </article>

</section>
<?php require_once 'views/footer.php' ?>