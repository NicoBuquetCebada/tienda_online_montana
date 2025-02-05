<?php
	require 'ControlProducto.php';

	$id = $_REQUEST['producto'];

	$control_producto = new ControlProducto();
	$producto = $control_producto->getProducto($id);

	$nombre = $producto->getNombre();
	$descripcion = $producto->getDescripcion();
	$precio = $producto->getPrecio();
	$imagen = $producto->getImagen();
	$stock = $producto->getStock();

	header("Location:../vista/paginaProducto.php?id=$id&nombre=$nombre&descripcion=$descripcion&precio=$precio&imagen=$imagen&stock=$stock");
	exit;
?>