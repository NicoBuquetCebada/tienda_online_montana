<?php
	require 'Singleton.php';
	require 'DTOCompra.php';
	
	class DAOCompra {
		private $con;

		public function __construct() {
			$this->con = Singleton::getCon();
		}

		function insertCompra($compra) {
			$ps = $this->con->prepare("INSERT INTO compras (usuario_id, producto_id, fecha_compra, id, cantidad) VALUES (:usuario_id, :producto_id, :fecha_compra, :id, :cantidad)");

			$ps->bindParam(":usuario_id", $compra->getUsuarioId());
			$ps->bindParam(":producto_id", $compra->getProductoId());
			$ps->bindParam(":fecha_compra", $compra->getFechaCompra());
			$ps->bindParam(":id", $compra->getId());
			$ps->bindParam(":cantidad", $compra->getCantidad());
			$success = $ps->execute();
			
			if ($success)
				return true;
			else
				return false;
		}

		function updateCompra($compra) {
			$ps = $this->con->prepare("UPDATE compras SET usuario_id= :usuario_id, producto_id= :producto_id, fecha_compra= :fecha_compra, id= :id, cantidad= :cantidad");

			$ps->bindParam(":usuario_id", $compra->getUsuarioId());
			$ps->bindParam(":producto_id", $compra->getProductoId());
			$ps->bindParam(":fecha_compra", $compra->getFechaCompra());
			$ps->bindParam(":id", $compra->getId());
			$ps->bindParam(":cantidad", $compra->getCantidad());
			$success = $ps->execute();
			
			if ($success)
				return true;
			else
				return false;
		}

		function deleteCompra($compra) {
			$ps = $this->con->prepare("DELETE FROM compras WHERE id= :id;");
			$ps->bindParam(":id", $compra->getId());
			$success = $ps->execute();
			
			if ($success)
				return true;
			else
				return false;
		}

		function selectCompra($id) {
			$ps = $this->con->prepare("SELECT * FROM compras WHERE id= :id");
			$ps->bindParam(":id", $id);
			$ps->execute();
			$compra = $ps->fetch(PDO::FETCH_ASSOC);

			if ($compra)
				return new DTOCompra($compra['usuario_id'], $compra['producto_id'], $compra['fecha_compra'], $compra['id'], $compra['cantidad']);
			else
				return NULL;
		}

		function selectAll() {
			$ps = $this->con->prepare("SELECT * FROM compras");
			$ps->execute();
			$filas = $ps->fetchAll(PDO::FETCH_ASSOC);

			if ($filas) {
				$compras = [];
				foreach ($filas as $compra) {
					 $compras[] = new DTOCompra($compra['usuario_id'], $compra['producto_id'], $compra['fecha_compra'], $compra['id'], $compra['cantidad']);
				}
				return $compras;
			} else
				return NULL;
		}
	}
?>