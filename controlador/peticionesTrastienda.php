<?php 
    if(isset($_REQUEST["action"])){
        if($_REQUEST["action"]== "mostrar"){
            header("Location: ../vista/vistaMostrarTrastienda.php");
        }
        if($_REQUEST["action"]== "insertar"){
            header("Location: controladorInsertarTrastienda.php");
        }
        if($_REQUEST["action"]== "modificar"){
            header("Location: controladorModificarTrastienda.php");
        }
        if($_REQUEST["action"]== "eliminar"){
            header("Location: controladorEliminarTrastienda.php");
        }
    }

?>