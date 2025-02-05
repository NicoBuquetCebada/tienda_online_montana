-- DROP DATABASE montana;  
-- Crear base de datos (opcional)
CREATE DATABASE IF NOT EXISTS montana;
USE montana;

-- Tabla Cliente
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    nickname VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    telefono VARCHAR(15),
    domicilio VARCHAR(100)
);

-- Tabla Producto
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen TEXT NOT NULL,
    stock INT NOT NULL
);

-- Tabla intermedia Compra
CREATE TABLE compras (
    usuario_id INT NOT NULL,
    producto_id INT NOT NULL,
    fecha_compra DATETIME NOT NULL,
    id INT NOT NULL,
    cantidad INT DEFAULT 1,

    -- Primary Key
    PRIMARY KEY (usuario_id, producto_id, fecha_compra),

    -- Definir claves foráneas para relacionar Cliente y Producto
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE
);

-- INSERT

-- Productos
INSERT INTO productos (nombre, descripcion, precio, imagen, stock) VALUES
    ("HARDCORE", "Lata de pintura acrilica en spray básica de 400ml, presión media apta para todo tipo de escenarios", 4.25, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/1-hardcore879.jpg", 500),
    ("MTN 94", "Lata de pintura acrilica en spray de 400ml, presión baja ideal para momentos tranquilos", 4.85, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/1-mtn94288.jpg", 500),
    ("WATER BASED", "Lata de pintura base agua en spray de 400ml, sin olores que la acompañen", 5.85, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/mtnwaterbased400683.jpg",  500),
    ("NITRO 2G", "Lata de pintura acrilica en spray de 400ml, presión alta y una formula ideal para cubrir pigmentos complicados", 4.95, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/nitro2g-400232.jpg",  500),
    ("POCKET", "Lata de pintura acrilica en spray de tamaño reducido", 5.85, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/montana-colors-aerosol-pintura-formato-pocket876.jpg",  500),
    ("MICRO", "Lata de pintura acrilica en spray de tamaño extra reducido", 5.25, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/micro527.jpg",  500),
    ('PINTURA ANTI-CORROSIÓN', 'Imprimado de resistencia extrema con propiedades antioxidantes', 7.65, 'https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/mtnpro-anticorrosive-green120.jpg', 135),
    ("WALKING LOGO SWEATSHIRT", "Sudadera con Walking Logo", 58.65, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/mtn-sudadera-walking-1585.jpg",  150),
    ("HANDSTYLE SWEATSHIRT", "Sudadera con Logo tipo hanstyle", 58.65, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/mtn-sudadera-handstyle156.jpg",  150),
    ("HARDCORE 25TH SWEATSHIRT", "Sudadera edición limitada 25 aniversario", 78.65, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/montana-colors-spray-pintura-sudadera-hardcore673.jpg",  25),
    ("WALKING LOGO T-SHIRT", "Camiseta con Walking Logo", 29.00, "https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/mtnwalkinglogo943.jpg",  350),
    ('MTN T-SHIRT SPORT TEAM VOL.2', 'Camiseta del equipo MTN 100% poliester', 35.90, 'https://www.montanacolors.com/content/thumbs/1024/content/imgsxml/productos/mtnt-shirtsportteamvol2-2935.jpg', 105);