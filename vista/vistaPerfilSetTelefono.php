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
    <title>Cambiar Teléfono</title>
    <link href="css/cambioUsuario.css" rel="stylesheet">
</head>
<body>
    <div id="main">
        <h2>Cambiar Teléfono</h2>
        <form action="../controlador/controlPerfil.php" method="POST">
            <input placeholder="Nuevo Teléfono" type="text" id="nuevo_telefono" name="nuevo_telefono" >
            <button type="submit" name="accion" value="cambiar_telefono" class="action-btn">Guardar Cambios</button>
            <p><?= $aviso ?></p>
        </form>
        <a href="usuario.php" class="action-btn">Volver a Gestión de Usuario</a>
    </div>
</body>
</html>

