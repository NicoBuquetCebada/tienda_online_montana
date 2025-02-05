<?php
	require 'controlCompra.php';
	require 'ControlProducto.php';

	session_name('usuario');
	session_start();
	$usuario_id = $_SESSION['id'];
	session_write_close();
	
	
	session_name('carrito');
	session_start();
	if (isset($_SESSION['productos']) && isset($_SESSION['cantidades'])) {
		$productos = $_SESSION['productos'];
		$cantidades = $_SESSION['cantidades'];
	}

	if ($_REQUEST['action'] == 'Comprar') {
		if (!isset($_SESSION['id_compra']))
			$_SESSION['id_compra'] = 1;
		else
			$_SESSION['id_compra']++;

		$control_compra = new ControlCompra();
		$control_producto = new ControlProducto();
		
		for ($i = 0; $i < count($productos); $i++) {
			$producto_id = $productos[$i]->getId();
			$cantidad = $cantidades[$i];
			$fecha_compra = date("Y-m-d H:i:s");
			$compra = new DTOCompra($usuario_id, $producto_id, $fecha_compra, $_SESSION['id_compra'], $cantidad);
			$control_compra->nuevaCompra($compra);
			$control_producto->actualizarStock($productos[$i], $cantidad);
		}
		header("Location:../vista/ticket.php");
		exit;

	} else if ($_REQUEST['action'] == 'Borrar Carrito') {
		unset($_SESSION['productos'], $_SESSION['cantidades'], $_SESSION['total']);
		header("Location:../vista/carrito.php");
		exit;
	} else {
		if (count($productos) == 1) {
			unset($_SESSION['productos'], $_SESSION['cantidades'], $_SESSION['total']);
			header("Location:../vista/carrito.php");
			exit;
		} else {
			$producto_id = $_REQUEST['borrar_producto'];
			for ($i = 0; $i < count($productos); $i++) {
				if ($producto_id == $productos[$i]->getId()) {
					unset($_SESSION['productos'][$i]);
					unset($_SESSION['cantidades'][$i]);
					$_SESSION['productos'] = array_values($_SESSION['productos']);
					$_SESSION['cantidades'] = array_values($_SESSION['cantidades']);
					$_SESSION['total'] -= $productos[$i]->getPrecio() * $cantidades[$i];
					header("Location:../vista/carrito.php");
					exit;
				}
			}
		}
		
	}
?>