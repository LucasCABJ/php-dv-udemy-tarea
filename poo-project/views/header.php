<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luvo | Tienda Oficial</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/notifications.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
        <script>
            registerSucess();
        </script>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <script>
            registerFailed();
        </script>
    <?php elseif (isset($_SESSION['login']) && $_SESSION['login'] == 'failed') : ?>
        <script>
            loginFailed();
        </script>
    <?php elseif (isset($_SESSION['user_update']) && $_SESSION['user_update'] == 'success') : ?>
        <script>
            userUpdateSuccess();
        </script>
    <?php elseif (isset($_SESSION['user_update']) && $_SESSION['user_update'] == 'failed') : ?>
        <script>
            userUpdateFailed();
        </script>
    <?php endif; ?>
    <?php unset($_SESSION['register']); ?>
    <?php unset($_SESSION['login']); ?>
    <?php unset($_SESSION['user_update']); ?>
    <!-- LOGIN MODAL -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Iniciar Sesion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./?controller=Usuario&action=login" method="POST" class="mb-2">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" name='password' class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Acceder</button>
                    </form>
                    <button class="btn btn-outline-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">No tienes cuenta? Registrate</button>
                </div>
            </div>
        </div>
    </div>
    <!-- REGISTER MODAL -->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Registrarse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./?controller=usuario&action=register" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Registrarme</button>
                    </form>
                    <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Volver atras</button>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url; ?>">
                <h1>Luvo</h1>
            </a>
            <div class='d-flex'>
                <?php if (isset($_SESSION['userfirstname'])) : ?>
                    <div class="dropdown d-block d-lg-none me-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['userfirstname']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Mi carrito</a></li>
                            <?php if (isset($_SESSION['usuario_role']) && $_SESSION['usuario_role'] == 'admin') : ?>
                                <li><a class="dropdown-item" href="./index.php?controller=producto&action=administrar">Administrar Productos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="#">Ajustes de cuenta</a></li>
                            <li><a class="dropdown-item text-danger" href="./?controller=usuario&action=logout">Cerrar Sesion</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="login-register d-block d-lg-none">
                        <button class="btn btn-secondary me-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Acceder</button>
                    </div>
                <?php endif; ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Remeras</a></li>
                            <li><a class="dropdown-item" href="#">Buzos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Jeans</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex mb-3 mb-lg-0 me-lg-2" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <?php if (isset($_SESSION['userfirstname'])) : ?>
                    <div class="dropdown d-none d-lg-block">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['userfirstname']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Mi carrito</a></li>
                            <li><a class="dropdown-item" href="./?controller=usuario&action=ajustes">Ajustes de cuenta</a></li>
                            <?php if (isset($_SESSION['usuario_role']) && $_SESSION['usuario_role'] == 'admin') : ?>
                                <li><a class="dropdown-item" href="./index.php?controller=producto&action=administrar">Administrar Productos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger" href="./?controller=usuario&action=logout">Cerrar Sesion</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <div class="login-register d-none d-lg-block">
                        <button class="btn btn-secondary me-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Acceder</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>