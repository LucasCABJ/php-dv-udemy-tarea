<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luvo | Tienda Oficial</title>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="./assets/fontawesome-free-6.4.2-web/css/all.min.css">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" href="./assets/css/extra.css">
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/notifications.js"></script>
    <!-- SWEET ALERT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
        <script>
            registerSucess();
        </script>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
        <script>
            registerFailed();
        </script>
    <?php elseif (isset($_SESSION['login']) && $_SESSION['login'] == 'failed'): ?>
        <script>
            loginFailed();
        </script>
    <?php elseif (isset($_SESSION['user_update']) && $_SESSION['user_update'] == 'success'): ?>
        <script>
            userUpdateSuccess();
        </script>
    <?php elseif (isset($_SESSION['user_update']) && $_SESSION['user_update'] == 'failed'): ?>
        <script>
            userUpdateFailed();
        </script>
    <?php elseif (isset($_SESSION['product_add']) && $_SESSION['product_add'] == 'success'): ?>
        <script>
            productAddSuccess();
        </script>
    <?php elseif (isset($_SESSION['product_add']) && $_SESSION['product_add'] == 'failed'): ?>
        <script>
            productAddFailed();
        </script>
    <?php endif; ?>
    <?php unset($_SESSION['register']); ?>
    <?php unset($_SESSION['login']); ?>
    <?php unset($_SESSION['user_update']); ?>
    <?php unset($_SESSION['product_add']); ?>
    <!-- LOGIN MODAL -->
    <div class="modal fade text-white" id="exampleModalToggle" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-theme="dark">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Iniciar Sesion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./?controller=Usuario&action=login" method="POST" class="mb-2">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control rounded-0" id="loginEmail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Contraseña</label>
                            <input type="password" name='password' class="form-control rounded-0" id="loginPassword">
                        </div>
                        <button type="submit" class="btn btn-secondary text-white rounded-0">Acceder</button>
                        <button class="btn btn-theme-grey btn-hover-white rounded-0"
                            data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" type="button">No tienes cuenta?
                            Registrate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- REGISTER MODAL -->
    <div class="modal fade text-white" id="exampleModalToggle2" aria-hidden="true"
        aria-labelledby="exampleModalToggleLabel2" tabindex="-1" data-bs-theme="dark">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Registrarse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./?controller=usuario&action=register" method="POST">
                        <div class="mb-3">
                            <label for="registerNombre" class="form-label rounded-0">Nombre</label>
                            <input type="text" name="nombre" class="form-control rounded-0" id="registerNombre"
                                aria-describedby="registerNombreHelp">
                        </div>
                        <div class="mb-3">
                            <label for="registerApellido" class="form-label rounded-0">Apellido</label>
                            <input type="text" name="apellido" class="form-control rounded-0" id="registerApellido"
                                aria-describedby="registerApellidoHelp">
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label rounded-0">Email</label>
                            <input type="email" name="email" class="form-control rounded-0" id="registerEmail"
                                aria-describedby="registerEmailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label rounded-0">Contraseña</label>
                            <input type="password" name="password" class="form-control rounded-0"
                                id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-secondary text-white rounded-0">Registrarme</button>
                        <button type="button" class="btn btn-theme-grey btn-hover-white rounded-0"
                            data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Volver
                            atras</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-primary mb-5" data-bs-theme="dark">
        <div class="container-fluid mx-lg-5">
            <a class="navbar-brand" href="<?= base_url; ?>">
                <h1>Luvo</h1>
            </a>
            <div class='d-flex'>
                <?php if (isset($_SESSION['userfirstname'])): ?>
                    <div class="dropdown d-block d-lg-none me-2">
                        <button class="btn rounded-0 btn-secondary text-white dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user me-2"></i><?= $_SESSION['userfirstname']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Mi carrito</a></li>
                            <?php if (isset($_SESSION['usuario_role']) && $_SESSION['usuario_role'] == 'admin'): ?>
                                <li><a class="dropdown-item"
                                        href="./index.php?controller=producto&action=administrar">Administrar Productos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="#">Ajustes de cuenta</a></li>
                            <li><a class="dropdown-item text-danger" href="./?controller=usuario&action=logout">Cerrar
                                    Sesion</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="login-register d-block d-lg-none">
                        <button class="btn btn-secondary rounded-0 text-white me-2" data-bs-target="#exampleModalToggle"
                            data-bs-toggle="modal"><i class="fa-solid fa-right-to-bracket me-2"></i>Acceder</button>
                    </div>
                <?php endif; ?>

                <button class="navbar-toggler rounded-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-home me-2"></i>Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-book me-2"></i>Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <?php $categorias = CategoriaController::getAll() ?>
                            <?php while ($categoria = $categorias->fetchObject()): ?>
                                <li><a class="dropdown-item" href="#"><?= $categoria->nombre ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex mb-3 mb-lg-0 me-lg-2" role="search">
                    <input class="form-control rounded-0" type="search" placeholder="Buscar..." aria-label="Search"
                        id="searchBtn">
                    <button class="btn btn-theme-grey btn-hover-white rounded-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <?php if (isset($_SESSION['userfirstname'])): ?>
                    <div class="dropdown d-none d-lg-block">
                        <button class="btn btn-secondary rounded-0 text-white dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user me-2"></i><?= $_SESSION['userfirstname']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Mi carrito</a></li>
                            <li><a class="dropdown-item" href="./?controller=usuario&action=ajustes">Ajustes de cuenta</a>
                            </li>
                            <?php if (isset($_SESSION['usuario_role']) && $_SESSION['usuario_role'] == 'admin'): ?>
                                <li><a class="dropdown-item"
                                        href="./index.php?controller=producto&action=administrar">Administrar Productos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger" href="./?controller=usuario&action=logout">Cerrar
                                    Sesion</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="login-register d-none d-lg-block">
                        <button class="btn btn-secondary text-white me-2 rounded-0" data-bs-target="#exampleModalToggle"
                            data-bs-toggle="modal"><i class="fa-solid fa-right-to-bracket me-2"></i>Acceder</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>