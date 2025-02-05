<?php 
    require_once 'Singleton.php';
    require_once 'DTOProducto.php';

    class DAOProducto{
        private $conn;

        public function __construct(){
            $this->conn = Singleton::getCon();
        }

        public function selectProductoById($id){
            $stmt = $this->conn->prepare("SELECT * FROM productos WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            if($fila){
                $DTOProducto=new DTOProducto($fila['nombre'], $fila['descripcion'], $fila['precio'], $fila['imagen'], $fila['stock']);
                $DTOProducto->setId( $fila['id'] );
                return $DTOProducto;
            }else{
                return false;
            }
        }

        public function selectAllProductos(){
            $stmt = $this->conn->prepare('SELECT * FROM productos');
            $stmt->execute();
            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $productos = [];
            foreach($filas as $resultado){
                $DTOProducto=new DTOProducto($resultado['nombre'], $resultado['descripcion'], $resultado['precio'], $resultado['imagen'], $resultado['stock']);
                $DTOProducto->setId( $resultado['id'] );
                $productos[] = $DTOProducto;
            }
            return $productos;
        }

        public function insertProducto($producto){
            $stmt = $this->conn->prepare('INSERT INTO productos (nombre, descripcion, precio, imagen, stock) VALUES (:nombre, :descripcion, :precio, :imagen, :stock)');
            $stmt->bindParam(':nombre', $producto->getNombre());
            $stmt->bindParam(':descripcion', $producto->getDescripcion());
            $stmt->bindParam(':precio', $producto->getPrecio());
            $stmt->bindParam(':imagen', $producto->getImagen());
            $stmt->bindParam(':stock', $producto->getStock());
            return $stmt->execute();
        }

        public function updateProducto($producto){
            $stmt= $this->conn->prepare('UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen, stock = :stock WHERE id = :id');
            $stmt->bindParam(':id', $producto->getId());
            $stmt->bindParam(':nombre', $producto->getNombre());
            $stmt->bindParam(':descripcion', $producto->getDescripcion());
            $stmt->bindParam(':precio', $producto->getPrecio());
            $stmt->bindParam(':imagen', $producto->getImagen());
            $stmt->bindParam(':stock', $producto->getStock());
            return $stmt->execute();
        }

        public function updateStock($producto) {
            $pd = $this->conn->prepare("UPDATE productos SET stock = :stock WHERE id = :id");
            $pd->bindParam(":stock", $producto->getStock());
            $pd->bindParam(":id", $producto->getId());
            return $pd->execute();
        }

        public function deleteProducto($id){
            $stmt= $this->conn->prepare('DELETE FROM productos WHERE id = :id');
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
}
?>