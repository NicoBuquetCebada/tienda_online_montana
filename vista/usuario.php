<?php

require '../controlador/ControlUsuario.php';

session_name('usuario');
session_start();

$aviso = "";

if (isset($_REQUEST['aviso'])) {
    $aviso = $_REQUEST['aviso'];
}

/*print_r($_SESSION);*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuario</title>
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
    <link href="css/usuario.css" rel="stylesheet">
</head>
<body>
    <div id="main">
        <h2 style="text-align: center;">Usuario</h2>
        <div class="grupo">
            <p>Nombre de usuario: <?= $_SESSION['nickname'] ?></p>
            <a href="vistaPerfilSetNickname.php" class="action-btn" id="userbttn">Cambiar Nickname</a>
            <a href="vistaPerfilSetPassword.php" class="action-btn" id="contrbttn">Cambiar Contraseña</a> 
        </div>
        <div class="grupo">
            <p>Teléfono: <?= $_SESSION['telefono'] ?></p>
            <a href="vistaPerfilSetTelefono.php" class="action-btn">Cambiar Teléfono</a>
        </div>
        <div class="grupo">
            <p>Domicilio: <?= $_SESSION['domicilio'] ?></p>
            <a href="vistaPerfilSetDomicilio.php" class="action-btn">Cambiar Domicilio</a>
        </div>
        <form action="../controlador/controlCierreSesion.php" method="POST">
            <input id="cerrar" type="submit" value="Cerrar Sesión">
        </form>
    </div>

</body>
</html>
