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

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Luvo</a>
            <div class='d-flex'>
                <div class="login-register d-lg-none">
                    <button class="btn btn-success" type="submit">Iniciar Sesion</button>
                    <button class="btn btn-secondary me-2" type="submit">Registrarse</button>
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
                    <button class="btn btn-success me-lg-1 mb-2 mb-lg-0 d-none d-lg-inline-block" type="submit">Iniciar Sesion</button>
                    <button class="btn btn-secondary d-none d-lg-inline-block" type="submit">Registrarse</button>
                </div>
            </div>
        </div>
    </nav>

    <section class='container mb-5'>

        <header class="row mb-3">
            <div class="col-12">
                <h2>Productos destacados</h2>
            </div>
        </header>

        <div class="row" style='gap: 10px'>
            <div class="card col-3">
                <img src="./assets/img/remera-01.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-3">
                <img src="./assets/img/remera-01.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-3">
                <img src="./assets/img/remera-01.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card col-3">
                <img src="./assets/img/remera-01.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </section>

    <footer class='d-flex justify-content-center align-items-center p-5 bg-dark'>

        <p class='text-secondary m-0'>Developed by Lucas Caraballo &copy; 2023</p>

    </footer>

</body>

</html>