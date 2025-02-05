<?php

require_once 'ControlUsuario.php';

session_name('usuario');
session_start();
if (isset($_POST['loginUsuario']) && isset($_POST['loginContra'])) {
    $loginUsuario = $_POST['loginUsuario'];
    $passwordUsuario = $_POST['loginContra'];
}

$siHayError = false;

if (empty($loginUsuario) || empty($passwordUsuario)) {
    $aviso = "Hay que rellenar todos los campos para Iniciar Sesión";
    header("location: ../vista/login.php?aviso=$aviso");
    exit;
}

$contraCifrada = hash("sha256", $passwordUsuario);
$controlUsuario = new ControlUsuario();
$usuario = $controlUsuario->comprobarUsuario($loginUsuario, $contraCifrada);

if ($controlUsuario->comprobarNickname($loginUsuario)) {
    if ($controlUsuario->comprobarPassword($contraCifrada)) {
        if ($usuario) {
            $_SESSION['id'] = $usuario->getId();
            $_SESSION['nombre'] = $usuario->getNombre();
            $_SESSION['apellido'] = $usuario->getApellido();
            $_SESSION['nickname'] = $usuario->getNickname();
            $_SESSION['password'] = $usuario->getPassword();
            $_SESSION['telefono'] = $usuario->getTelefono();
            $_SESSION['domicilio'] = $usuario->getDomicilio();

            header("location:../vista/index.php");
            //unset($_SESSION['nickname'], $_SESSION['password'], $_SESSION['id']); Simplemente Ejemplo para Hacer en la pagina del botón cerrar sesión.
            exit;
        }
    } else {
        $aviso = "La contraseña introducida es incorrecta";
        header("location: ../vista/login.php?aviso=$aviso");
        exit;
    }
} else {
    $aviso = "El nombre de usuario introducido no está registrado";
    header("location: ../vista/login.php?aviso=$aviso");
    exit;
}
?>
