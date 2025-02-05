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
    <title>Cambiar Nickname</title>
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
    <link href="css/cambioUsuario.css" rel="stylesheet">
</head>
<body>

    <div id="main">
        <h2>Cambiar Nombre de Usuario</h2>
        <form action="../controlador/controlPerfil.php" method="POST">
            <input placeholder="Nuevo Nombre de Usuario" type="text" id="nuevo_nickname" name="nuevo_nickname">
            <button type="submit" name="accion" value="cambiar_nickname" class="action-btn">Guardar Cambios</button>
            <p><?= $aviso ?></p>
        </form>
        <a href="usuario.php" class="action-btn">Volver a Gestión de Usuario</a>
    </div>

</body>
</html>
