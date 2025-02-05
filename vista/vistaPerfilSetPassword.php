<?php
$aviso = "";

if (isset($_REQUEST['aviso'])) {
    $aviso = $_REQUEST['aviso'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
    <link href="css/cambioUsuario.css" rel="stylesheet">
</head>
<body>
    <div id="main">
        <h2>Cambiar Contraseña</h2>
        <form action="../controlador/controlPerfil.php" method="POST">
            <input placeholder="Nueva Contraseña" type="password" id="nueva_password" name="nueva_password">
            <button type="submit" name="accion" value="cambiar_password" class="action-btn">Guardar Cambios</button>
            <p><?= $aviso ?></p>
        </form>
        <a href="usuario.php" class="action-btn">Volver a Gestión de Usuario</a>
    </div>
</body>
</html>

