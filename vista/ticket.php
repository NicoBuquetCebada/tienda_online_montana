<?php 
	require '../modelo/DTOProducto.php';
	session_name('carrito');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>montana</title>
	<link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
	<link rel="stylesheet" href="css/ticket.css">
</head>
<body>
	<div id="ticket">
		<p>TICKET</p>
		<h4><?= "ID: " . $_SESSION['id_compra'] ?></h4>
		<?php for ($i = 0; $i < count($_SESSION['productos']); $i++):?>
			<?php
				$producto_id = $_SESSION['productos'][$i]->getId();
				$nombre = $_SESSION['productos'][$i]->getNombre();
				$descripcion = $_SESSION['productos'][$i]->getDescripcion();
				$precio = $_SESSION['productos'][$i]->getPrecio();
				$imagen = $_SESSION['productos'][$i]->getImagen();
				$stock = $_SESSION['productos'][$i]->getStock();
				$cantidad = $_SESSION['cantidades'][$i];
			?>
			<article class="entrada">
				<img src="<?= $imagen ?>">
				<div>
					<p><?= $nombre ?></p>
					<p><?= "ID: " . $producto_id ?></p>
				</div>
				<p class="cantidad"><?= $cantidad ?></p>
				<p><?= $precio . "€" ?></p>
			</article>
		<?php endfor; ?>
		<h2><?= "TOTAL: " . $_SESSION['total'] . "€" ?></h2>
		<a href="index.php">Volver al Inicio</a>
		<?php unset($_SESSION['productos'], $_SESSION['cantidades'], $_SESSION['total']) ?>
	</div>
</body>
</html>
</html>