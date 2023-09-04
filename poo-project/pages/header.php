<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luvo | Tienda Oficial</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src='./assets/js/bootstrap.bundle.min.js'></script>
</head>

<body>

    <!-- LOGIN MODAL -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Iniciar Sesion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="pages/login.php" method="POST" class="mb-2">
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
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellido</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Volver atras</button>
                        <button type="submit" class="btn btn-primary">Registrarme</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h1>Luvo</h1>
            </a>
            <div class='d-flex'>
                <div class="login-register d-lg-none">
                    <button class="btn btn-secondary me-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Acceder</button>
                    <!-- <a href="#" class="btn btn-success" type="submit">Iniciar Sesion</a>
                    <a href="#" class="btn btn-secondary me-2" type="submit">Registrarse</a> -->
                </div>

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
                <div class="login-register">
                    <button class="btn btn-secondary d-none d-lg-inline-block" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Acceder</button>
                    <!-- <a href="#" class="btn btn-secondary d-none d-lg-inline-block" type="submit">Registrarse</a> -->
                </div>
            </div>
        </div>
    </nav>