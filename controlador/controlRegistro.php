<?php

require_once 'ControlUsuario.php';
require_once '../modelo/DTOusuario.php';

// Inicializamos variables de aviso
$aviso = "";
$controlRegistro = new ControlUsuario();
// Validamos los campos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $nickname = trim($_POST['nickname']);
    $contra = trim($_POST['contra']);
    $telefono = trim($_POST['telefono']);
    $domicilio = trim($_POST['domicilio']);

    $hayError = false;

    // Validamos si cada campo está vacío ESTO SE PUEDE JUNTAR EN UNA SOLA CONDICION, TE PONGO UN EJEMPLO EN LA PRIMERA
    if (empty($nombre) || empty($apellido)) {
        $aviso = "Todos los campos son obligatorios.";
        $hayError = true;
    } else if (empty($nickname)) {
        $aviso = "Todos los campos son obligatorios.";
        $hayError = true;
    } else if (empty($contra)) {
        $aviso = "Todos los campos son obligatorios.";
        $hayError = true;
    } else if (empty($telefono)) {
        $aviso = "Todos los campos son obligatorios.";
        $hayError = true;
    } else if (empty($domicilio)) {
        $aviso= "Todos los campos son obligatorios.";
        $hayError = true;
    }

    // Si hay algún error, redirigimos de vuelta a registro.php con los mensajes de error
    if ($hayError) {
        header("Location: ../vista/registro.php?aviso=$aviso");
        exit();
    }

    $patronUsuario = "/^\w{3,20}$/";
    $patronContra = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,20}$/";
    $patronNomYApe = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]{1,20}$/u";
    $patronTelefono = "/^[0-9]{9}$/";

    if (!preg_match($patronNomYApe, $nombre)) {
        $aviso = "El nombre solo puede estar formado por letras hasta un máximo de 20 caracteres.";
        $hayError = true;
    } else if (!preg_match($patronNomYApe, $apellido)) {
        $aviso = "El apellido solo puede estar formado por letras hasta un máximo de 20 caracteres.";
        $hayError = true;
    } else if (!preg_match($patronUsuario, $nickname)) {
        $aviso = "El nickname solo puede contener caracteres alfanuméricos con un mínimo de 3 y máximo 20 caracteres.";
        $hayError = true;
    } else if (!preg_match($patronContra, $contra)) {
        $aviso = "No es posible establecer esa contraseña."; //Nico doy pistas o no?? En plan, digo que es necesario que hay mínimo una mayúscula, una minúscula y un número o solo digo que nos viable???
        $hayError = true;
    } else if (!preg_match($patronTelefono, $telefono)) {
        $aviso = "El número de teléfono debe de estar formado por 9 caracteres numéricos.";
        $hayError = true;
    }

    if ($hayError) {
        header("Location: ../vista/registro.php?aviso=$aviso");
        exit();
    }

    $contraCifrada = hash("sha256", $contra);
    $nuevoUsuario = new DTOusuario(" ", $nombre, $apellido, $nickname, $contraCifrada, $telefono, $domicilio);

    if ($controlRegistro->nuevoUsuario($nuevoUsuario)) {
        header("location: ../vista/login.php?aviso=$aviso");
    }

} else {
    // Si no es un método POST, redirigimos al formulario de registro
    header("Location: ../vista/registro.php");
    exit();
}
?>

