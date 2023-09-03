<?php
require_once 'controllers/NotaController.php';
require_once 'controllers/UsuarioController.php';
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC | Practice</title>
</head>
<body>
    <h1>Test MVC</h1>
    <?php $usuarioController = new UsuarioController();?>
    <?php $usuarioController->create();?>
    <?php $notaController = new notaController();?>
    <?php $notaController->crearNota();?>
    <?php $notaController->mostrarNotas();?>
</body>
</html>