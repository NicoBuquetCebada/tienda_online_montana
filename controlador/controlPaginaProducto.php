<?php
	require 'ControlProducto.php';

	$producto_id = $_REQUEST['producto_id'];
	$cantidad = $_REQUEST['cantidad'];
	$control_producto = new ControlProducto();
	
	
	$producto = $control_producto->getProducto($producto_id);
	$nombre = $producto->getNombre();
	$descripcion = $producto->getDescripcion();
	$precio = $producto->getPrecio();
	$imagen = $producto->getImagen();
	$stock = $producto->getStock();

	if (session_status() === PHP_SESSION_NONE) {
		session_name('carrito');
		session_start();
		//session_unset();
	}

	//Calculo cantidad total
	$cantidad_total = $cantidad;
	if (isset($_SESSION['productos'])) {
		for ($i = 0; $i < count($_SESSION['productos']); $i++)	 {
			if ($_SESSION['productos'][$i]->getId() == $producto_id) {
				$cantidad_total = $_SESSION['cantidades'][$i] + $cantidad;
			}
		}
	}
	
	if ($cantidad_total > $stock) {
		$aviso_stock = "No hay suficiente stock";
		header("Location:../vista/paginaProducto.php?id=$producto_id&nombre=$nombre&descripcion=$descripcion&precio=$precio&imagen=$imagen&stock=$stock&aviso_stock=$aviso_stock");
		exit;
	} else
		$aviso_stock = null;
	
	$_SESSION['total'] += $precio * $cantidad;
	$exists = false;
	if (isset($_SESSION['productos'])) {
		for ($i = 0; $i < count($_SESSION['productos']); $i++)	 {
			if ($_SESSION['productos'][$i]->getId() == $producto_id) {
				$_SESSION['cantidades'][$i] += $cantidad;
				$exists = true;
			}
		}
		if (!$exists) {
			$_SESSION['productos'][] = $producto;
			$_SESSION['cantidades'][] = $cantidad;
		}
	} else {
		$_SESSION['productos'][] = $producto;
		$_SESSION['cantidades'][] = $cantidad;
	}

	header("Location:../vista/paginaProducto.php?id=$producto_id&nombre=$nombre&descripcion=$descripcion&precio=$precio&imagen=$imagen&stock=$stock");
	exit;
?>