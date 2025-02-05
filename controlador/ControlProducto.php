<?php
	require '../modelo/DAOProducto.php';
	class ControlProducto {

		private $DAOProducto;

		public function __construct() {
			$this->DAOProducto = new DAOProducto();
		}

		public function getProducto($id) {
			return $this->DAOProducto->selectProductoById($id);
		}

		public function getAllProductos() {
			return $this->DAOProducto->selectAllProductos();
		}

		public function nuevoProducto($Producto) {
			return $this->DAOProducto->insertProducto($Producto);
		}
	
		public function borrarProducto($id) {
			if(self::getProducto($id)) {
				$this->DAOProducto->deleteProducto($id);
				return 1;
			}
			else {
				return -1;
			}
		}
	
		public function actualizarProducto($Producto) {
			return $this->DAOProducto->updateProducto($Producto);
		}

		public function actualizarStock($producto, $cantidad) {
			$stock = $producto->getStock();
			$stock -= $cantidad;
			$producto->setStock($stock);
			return $this->DAOProducto->updateStock($producto);
		}

		public function reponer($producto) {
			return $this->DAOProducto->updateStock($producto);
		}
	}
?>