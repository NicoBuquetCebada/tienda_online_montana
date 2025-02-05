<?php 
    class DTOProducto
    {
        private $id;
        private $nombre;
        private $descripcion;
        private $precio;
        private $imagen;
        private $stock;


        public function __construct($nombre, $descripcion, $precio, $imagen, $stock){
            $this->id = null;
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->precio=$precio;
            $this->imagen=$imagen;
            $this->stock=$stock;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }

    public function setPrecio($precio){
        $this->precio=$precio;
    }

    public function setimagen($imagen){
        $this->imagen=$imagen;
    }

    public function setStock($stock){
        $this->stock=$stock;
    }

}

?>