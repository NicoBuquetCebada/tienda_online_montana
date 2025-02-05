<?php
session_name('usuario');
session_start();

unset(
    $_SESSION['id'],
    $_SESSION['nombre'],
    $_SESSION['apellido'],
    $_SESSION['nickname'],
    $_SESSION['password'],
    $_SESSION['telefono'],
    $_SESSION['domicilio']
);

header("location: ../vista/login.php");
//session_unset(); creo que esta función haría la misma función
?>
