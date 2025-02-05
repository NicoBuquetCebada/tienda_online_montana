<?php
$aviso = "";

if (isset($_REQUEST['aviso'])) {
    $aviso = $_REQUEST['aviso'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
	<link rel="stylesheet" href="css/registro.css">
</head>
<body>
  <div id="main">
    <h1>Registro</h1>
    <form action="../controlador/controlRegistro.php" method="post">

      <div class="grupo">
        <input placeholder="Nombre" type="text" id="nombre" name="nombre">

        <input placeholder="Apellido" type="text" id="apellido" name="apellido">
      </div>

      <div class="grupo">
        <input placeholder="Teléfono" type="text" id="telefono" name="telefono">

        <input placeholder="Domicilio" type="text" id="domicilio" name="domicilio">
      </div> 

      <div class="grupo">
        <input placeholder="Nombre de Usuario" type="text" id="nickname" name="nickname">

        <input  placeholder="Contraseña" type="password" id="contra" name="contra">
      </div>

      <input type="submit" value="Registrarse">

    </form>
    <p id="aviso"><?= $aviso ?></p>
</div>
</body>
</html>