<?php
session_name('usuario');
session_start();
require 'ControlUsuario.php';
$controlUsuario = new ControlUsuario();

$id = $_SESSION['id'];

$aviso = "";
$patronUsuario = "/^\w{3,20}$/";
$patronContra = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,20}$/";
$patronNomYApe = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]{1,20}$/u";
$patronTelefono = "/^[0-9]{9}$/";


// Verificar la acción
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    switch ($accion) {
        case 'cambiar_nickname':
            $nuevo_nickname = $_POST['nuevo_nickname'];
            if (!preg_match($patronUsuario, $nuevo_nickname)) {
                $aviso = "El nombre de usuario solo puede contener caracteres alfanuméricos con un mínimo de 3 y máximo 20 caracteres.";
                header("location: ../vista/vistaPerfilSetNickname.php?aviso=$aviso");
                exit;
            }
            $controlUsuario->actualizarNickname($nuevo_nickname, $id);
            $aviso = "Nickname cambiado correctamente";
            break;
        case 'cambiar_password':
            $nueva_password = $_POST['nueva_password'];
            if (!preg_match($patronContra, $nueva_password)) {
                $aviso = "No es posible establecer esa contraseña.";
                header("location: ../vista/vistaPerfilSetPassword.php?aviso=$aviso");
                exit;
            }
            $contraCifrada = hash("sha256", $nueva_password);
            $controlUsuario->actualizarPassword($contraCifrada, $id);
            $aviso = "Password cambiado correctamente";
            break;
        case 'cambiar_telefono':
            $nuevo_telefono = $_POST['nuevo_telefono'];
            if (!preg_match($patronTelefono, $nuevo_telefono)) {
                $aviso = "El número de teléfono debe de estar formado por 9 caracteres numéricos.";
                header("location: ../vista/vistaPerfilSetTelefono.php?aviso=$aviso");
                exit;
            }
            $controlUsuario->actualizarTelefono($nuevo_telefono, $id);
            $aviso = "Telefono actualizado correctamente";
            break;
        case 'cambiar_domicilio':
            $nuevo_domicilio = $_POST['nuevo_domicilio'];
            $controlUsuario->actualizarDomicilio($nuevo_domicilio, $id);
            $aviso = "Domicilio actualizado correctamente";
            break;
    }
    header("Location: ../vista/usuario.php?aviso=$aviso");
    exit;
}
?>

