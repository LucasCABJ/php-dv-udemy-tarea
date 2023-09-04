<?php

var_dump($_POST);

if (isset($_POST)) {

    // $email = isset($_POST['email']) ? mysqli_real_escape_string(trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? trim($_POST['password']) : false;

    var_dump($email);
    var_dump($password);
}
