<?php require_once 'views/header.php' ?>
<section class='container mb-5' style="min-height: 75vh">

    <a href="./index.php" class='btn btn-theme-grey rounded-0 mb-2 text-white'>Volver a inicio</a>

    <header class="row mb-3 text-center">
        <div class="col-12">
            <h2>Ajustes de usuario</h2>
        </div>
    </header>

    <div class="row mb-3">

        <form action="./index.php?controller=usuario&action=ajustes" method="POST" class="mb-2">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="emailHelp"
                    value="<?= $database_user->nombre ?>">
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellido</label>
                <input type="text" name="apellidos" class="form-control" id="apellidos" aria-describedby="emailHelp"
                    value="<?= $database_user->apellidos ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                    value="<?= $database_user->email ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name='password' class="form-control" id="password">
                <div id="passwordHelp" class="form-text">Dejar vacio en caso de no querer actualizar.</div>
            </div>

            <button type="submit" class="btn btn-secondary text-white">Aplicar cambios</button>
        </form>


    </div>

</section>
<?php require_once 'views/footer.php' ?>