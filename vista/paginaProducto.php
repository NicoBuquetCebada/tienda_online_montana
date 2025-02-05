<?php
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
	$descripcion = $_REQUEST['descripcion'];
	$precio = $_REQUEST['precio'];
	$imagen = $_REQUEST['imagen'];
	$stock = $_REQUEST['stock'];
	if (isset($_REQUEST['aviso_stock']))
		$aviso_stock = $_REQUEST['aviso_stock'];
	else
		$aviso_stock = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>montana</title>
	<link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
	<link rel="stylesheet" href="css/paginaProducto.css">
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

	<div id="producto">
		<img src="<?= $imagen ?>">
		<section id="datos">
			<p><?= $nombre ?></p>
			<p><?= $descripcion ?></p>
			<p><?= $precio . "€" ?></p>
			<form action="../controlador/controlPaginaProducto.php" method="post" id="pedido">
				<label for="cantidad">Cantidad:
					<input type="number" name="cantidad" min=1 value=1>
				</label>
				<aviso><?= $aviso_stock; ?></aviso>
				<input type="hidden" name="producto_id" value="<?= $id ?>">
				<input type="submit" value="AÑADIR AL CARRITO">
			</form>
		</section>
	</div>
	
	<footer>
		<section id="social">
			<p>SIGUE A MONTANA COLORS</p>
			<section id="icons">
				<a href="https://www.facebook.com/montanacolors/"><svg id="facebook" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 100 100"><path fill="black" d="M82.026 14H17.974A3.974 3.974 0 0 0 14 17.974v64.053A3.974 3.974 0 0 0 17.974 86h34.483V58.118h-9.383V47.252h9.383v-8.014c0-9.3 5.68-14.363 13.976-14.363c3.974 0 7.389.295 8.385.428v9.719l-5.754.003c-4.512 0-5.385 2.144-5.385 5.29v6.938h10.76l-1.401 10.866h-9.359V86h18.348A3.974 3.974 0 0 0 86 82.026V17.974A3.974 3.974 0 0 0 82.026 14"/></svg></a>

				<a href="https://www.instagram.com/montana_colors/"><svg id="instagram" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="black" d="M18 3H6C4.3 3 3 4.3 3 6v12c0 1.7 1.3 3 3 3h12c1.7 0 3-1.3 3-3V6c0-1.7-1.3-3-3-3m-6 6c1.7 0 3 1.3 3 3s-1.3 3-3 3s-3-1.3-3-3s1.3-3 3-3m3.8-2c0-.7.6-1.2 1.2-1.2s1.2.6 1.2 1.2s-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2M18 19H6c-.6 0-1-.4-1-1v-6h2c0 2.8 2.2 5 5 5s5-2.2 5-5h2v6c0 .6-.4 1-1 1"/></svg></a>

				<a href="https://www.youtube.com/user/montanacolorstv"><svg id="youtube" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512"><path fill="black" d="M508.64 148.79c0-45-33.1-81.2-74-81.2C379.24 65 322.74 64 265 64h-18c-57.6 0-114.2 1-169.6 3.6C36.6 67.6 3.5 104 3.5 149C1 184.59-.06 220.19 0 255.79q-.15 53.4 3.4 106.9c0 45 33.1 81.5 73.9 81.5c58.2 2.7 117.9 3.9 178.6 3.8q91.2.3 178.6-3.8c40.9 0 74-36.5 74-81.5c2.4-35.7 3.5-71.3 3.4-107q.34-53.4-3.26-106.9M207 353.89v-196.5l145 98.2Z"/></svg></a>

				<a href="https://linkedin.com/company/montana-colors-sl"><svg id="linkedin" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512"><path fill="black" d="M444.17 32H70.28C49.85 32 32 46.7 32 66.89v374.72C32 461.91 49.85 480 70.28 480h373.78c20.54 0 35.94-18.21 35.94-38.39V66.89C480.12 46.7 464.6 32 444.17 32m-273.3 373.43h-64.18V205.88h64.18ZM141 175.54h-.46c-20.54 0-33.84-15.29-33.84-34.43c0-19.49 13.65-34.42 34.65-34.42s33.85 14.82 34.31 34.42c-.01 19.14-13.31 34.43-34.66 34.43m264.43 229.89h-64.18V296.32c0-26.14-9.34-44-32.56-44c-17.74 0-28.24 12-32.91 23.69c-1.75 4.2-2.22 9.92-2.22 15.76v113.66h-64.18V205.88h64.18v27.77c9.34-13.3 23.93-32.44 57.88-32.44c42.13 0 74 27.77 74 87.64Z"/></svg></a>
			</section>	
		</section>
		<section id="foot_info">
			<img src="https://www.montanacolors.com/negocio/plantillas/panels/footer/img/mtn-completo.png">
			<section>
				<a href="index.php">MONTANA COLORS</a>
				<a href="carrito.php">CARRITO</a>
				<a href="">USUARIO</a>
			</section>
			<section>
				<a href="">PRODUCTO</a>
				<a href="">TICKET</a>
				<a href="vistaMostrarTrastienda.php">TRASTIENDA</a>
			</section>
		</section>
	</footer>
</body>
</html>