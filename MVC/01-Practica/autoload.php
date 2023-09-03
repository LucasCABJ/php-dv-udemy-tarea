<?php

function cargarControllers($controller) {
    include_once 'controllers/'.$controller.'.php';
} 

spl_autoload_register("cargarControllers");