
<?php 
require '../controlador/ControlProducto.php';
$control_producto = new ControlProducto();
$productos = $control_producto->getAllProductos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://www.montanacolors.com/favicon.ico">
    <title>Trastienda</title>
    <link rel="stylesheet" href="css/trastienda.css">
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
    <div id="contenedor">
    <form action="../controlador/peticionAnadirTrastienda.php" method="post">
        <button type="submit" name="action" value="anadir" id="boton">Añadir nuevo producto</button>
    </form>
    <form action="../controlador/peticionPedido.php" method="post">
        <button type="submit" name="action" value="pedido" id="boton">Nuevo pedido</button>
    </form>
    </div>
    <div id="contenedor-tabla">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto):?>
                <tr>
                    <td><?=$producto->getId();?></td>
                    <td><?=$producto->getNombre();?></td>
                    <td><?=$producto->getDescripcion();?></td>
                    <td><?=$producto->getPrecio();?></td>
                    <td style="width: 20%; height:50%"><img src="<?=$producto->getImagen();?>" alt="<?=$producto->getNombre();?>"></td>
                    <td><?=$producto->getStock();?></td>
                    <td>
                        <form action="../controlador/controlEliminarTrastienda.php" method="post">
                        <button type="submit" name="eliminar" id="eliminar" value="<?= $producto->getId()?>">Eliminar</button>
                        </form>
                        <form action ="../controlador/peticionEditarTrastienda.php" method="post">
                            <button type="submit" name="editar" id="editar" value="<?= $producto->getId()?>">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</body>
</html>