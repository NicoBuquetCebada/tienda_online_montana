<?php 
require 'ControlProducto.php';
    $id = $_REQUEST["eliminar"];
    $control_producto=new ControlProducto();
    $producto= $control_producto->borrarProducto($id);
    header("Location: ../vista/vistaMostrarTrastienda.php");


?>