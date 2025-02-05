<?php
    $aviso = "";
    if (isset($_REQUEST['aviso']))
        $aviso = $_REQUEST['aviso'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>montana</title>
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div id="main">
        <h1>Inicio de Sesión</h1>
        <form action="../controlador/controlLogin.php" method="post">
            <input type="text" placeholder="Nombre de Usuario" id="loginUsuario" name="loginUsuario">
            <input type="password" placeholder="Contraseña" id="loginContra" name="loginContra">

            <input type="submit" value="Iniciar sesión">
        </form>
        <p id="aviso"><?= $aviso ?></p>
        <a href="registro.php">¡Registrate!</a>
    </div>
</body>
</html>