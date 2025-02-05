<?php 
    if(isset($_REQUEST["mensaje"])){
        $mensaje=$_REQUEST["mensaje"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
    <title>Añadir producto</title>
    <link rel="stylesheet" href="css/producto.css">
</head>

<body>
<header>
		<section id="logo"><a href="index.php"><img src="https://www.montanacolors.com/negocio/plantillas/panels/header/img/logo_small.svg" alt=""></a></section>
		<section id="trastienda"><a href="vistaMostrarTrastienda.php">TRASTIENDA</a></section>
		<section id="user"><a href="usuario.php">
			<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1280 1536">
				<path fill="black" d="M1280 1271q0 109-62.5 187t-150.5 78H213q-88 0-150.5-78T0 1271q0-85 8.5-160.5t31.5-152t58.5-131t94-89T327 704q131 128 313 128t313-128q76 0 134.5 34.5t94 89t58.5 131t31.5 152t8.5 160.5m-256-887q0 159-112.5 271.5T640 768T368.5 655.5T256 384t112.5-271.5T640 0t271.5 112.5T1024 384"/>
			</svg>
		</a></section>
		<section id="carrito"><a href="carrito.php">
			<svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24">
				<path fill="black" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/>
			</svg>
		</a></section>
	</header>
    <h1>Añadir producto</h1>
    <div id="contenedor">
    <form action="../controlador/controlAnadirTrastienda.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion">
        <label for="precio">Precio</label>
        <input type="text" name="precio">
        <label for="imagen">Imagen</label>
        <input type="text" name="imagen">
        <label for="stock">Stock</label>
        <input type="stock" name="stock">
        <button type="submit" name="action" value="guardar" id="boton">Añadir producto</button>
        <button type="submit" name="action" value="volver" id="boton">Volver</button>
        <?php 
            if(isset($_REQUEST["mensaje"])){
                print "<p>$mensaje</p>";
            }
        ?>
    </form>
    </div>
</body>
</html>