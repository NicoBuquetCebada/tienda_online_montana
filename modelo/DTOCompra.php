<?php 
	class DTOCompra
	{
		private $usuario_id;
		private $producto_id;
		private $fecha_compra;
		private $id;
		private $cantidad;

		// Constructor
		public function __construct($usuario_id, $producto_id, $fecha_compra, $id, $cantidad) {
			$this->usuario_id = $usuario_id;
			$this->producto_id = $producto_id;
			$this->fecha_compra = $fecha_compra;
			$this->id = $id;
			$this->cantidad = $cantidad;
		}

		// Getter
		public function getUsuarioId() {
			return $this->usuario_id;
		}
		public function getProductoId() {
			return $this->producto_id;
		}
		public function getFechaCompra() {
			return $this->fecha_compra;
		}
		public function getId() {
			return $this->id;
		}
		public function getCantidad() {
			return $this->cantidad;
		}

		// Setter
		public function setUsuario_id($usuario_id) {
			$this->usuario_id = $usuario_id;
		}
		public function setProducto_id($producto_id) {
			$this->producto_id = $producto_id;
		}
		public function setFechaCompra($fecha_compra) {
			$this->fecha_compra = $fecha_compra;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function setCantidad($cantidad) {
			$this->cantidad = $cantidad;
		}
	}
?>