<?php 
require 'ControlProducto.php';
$nombre=$_REQUEST["nombre"];
$descripcion=$_REQUEST["descripcion"];
$precio=$_REQUEST["precio"];
$imagen=$_REQUEST["imagen"];
$stock=$_REQUEST["stock"];
$mensaje="";
$correcto=true;

if($_REQUEST["action"]=="volver"){
    header("Location: ../vista/vistaMostrarTrastienda.php");
    exit;
}

if($nombre== ""){
    $correcto=false;
    $mensaje="El campo nombre esta vacio";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($descripcion== ""){
    $correcto=false;
    $mensaje="El campo descripción esta vacio";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($precio== ""){
    $correcto=false;
    $mensaje="El campo precio esta vacio";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($precio < 0){
    $correcto=false;
    $mensaje="El campo precio es incorrecto";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($imagen== ""){
    $correcto=false;
    $mensaje="El campo imagen esta vacio";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($stock== ""){
    $correcto=false;
    $mensaje="El campo stock esta vacio";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($stock < 0){
    $correcto=false;
    $mensaje="El campo stock es incorrecto";
    header("Location: ../vista/vistaAnadirTrastienda.php?mensaje=$mensaje");
    exit;
}
if($correcto==true){
$producto=new DTOProducto($nombre, $descripcion, $precio, $imagen, $stock);
$control_producto=new ControlProducto();
$resultado= $control_producto->nuevoProducto($producto);
header("Location: ../vista/vistaMostrarTrastienda.php");
}

?>