<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Domicilio</title>
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
    <link href="css/cambioUsuario.css" rel="stylesheet">
</head>
<body>

    <div id="main">
        <h2>Cambiar Domicilio</h2>
        <form action="../controlador/controlPerfil.php" method="POST">
            <input placeholder="Nuevo Domicilio" type="text" id="nuevo_domicilio" name="nuevo_domicilio" required minlength="5" maxlength="100">
            <button type="submit" name="accion" value="cambiar_domicilio" class="action-btn">Guardar Cambios</button>
        </form>
        <a href="usuario.php" class="action-btn">Volver a Gestión de Usuario</a>
    </div>

</body>
</html>