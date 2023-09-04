<?php
require_once 'config/db.php';
$db = Database::connect();
?>
<?php require_once 'autoload.php'; ?>

<?php require_once 'pages/header.php'; ?>

<?php

if (@isset($_GET['controller']) && @class_exists($_GET['controller'] . 'Controller')) {

    $nombre_controller = $_GET['controller'] . 'Controller';

    $controlador = new $nombre_controller();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } else {
        require_once 'views/Error/pagefailed.php';
    }
} else {
    require_once 'views/Error/pagefailed.php';
}

?>

<!-- 
<section class='mb-5 container'>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://via.placeholder.com/1080x350
" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="http://via.placeholder.com/1080x350
" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="http://via.placeholder.com/1080x350
" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section> -->

<?php require_once 'pages/footer.php'; ?>