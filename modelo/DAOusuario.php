<?php

require 'Singleton.php';
require 'DTOusuario.php';

class DAOusuario
{
    private $conn;

    /**
     * @param $conn
     */
    public function __construct()
    {
        $this->conn = Singleton::getCon();
    }

    public function selectUsuario($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $usuario = new DTOusuario(
                $fila['id'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['nickname'],
                $fila['password'],
                $fila['telefono'],
                $fila['domicilio']
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public function selectAllUsuarios() {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($resultSet) {
            $usuarios = [];
            foreach ($resultSet as $usuario) {
                $usuarios[] = new DTOusuario(
                    $usuario['id'],
                    $usuario['nombre'],
                    $usuario['apellido'],
                    $usuario['nickname'],
                    $usuario['password'],
                    $usuario['telefono'],
                    $usuario['domicilio']
                );
            }
            return $usuarios;
        } else {
            return null;
        }

    }

    public function insertUsuario($usuario) {
        $stmt = $this->conn->prepare("INSERT INTO usuarios 
        (nombre, apellido, nickname, password, telefono, domicilio) 
        VALUES (:nombre, :apellido, :nickname, :password, :telefono, :domicilio)");

        $stmt->bindValue(':nombre', $usuario->getNombre()); //Por si alguien lo ve y le ha dado error o le pone un mensaje relacionado con el xampp que sepa que cuando usamos marcadores ":id" en vez de "?" para consultas precompiladas es necesario usar el bindValue, y no en bindParam que es para las sentencias que utilizan ?
        $stmt->bindValue(':apellido', $usuario->getApellido());
        $stmt->bindValue(':nickname', $usuario->getNickname());
        $stmt->bindValue(':password', $usuario->getPassword());
        $stmt->bindValue(':telefono', $usuario->getTelefono());
        $stmt->bindValue(':domicilio', $usuario->getDomicilio());

        return $stmt->execute();//Este return devuelve un true si la consulta se ejecutó o un false si la consulta no se ejecutó.
    }
    public function updateUsuario($usuario) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET 
                    nombre = :nombre, 
                    apellido = :apellido,
                    nickname = :nickname,
                    password = :password,
                    telefono = :telefono,
                    domicilio = :domicilio WHERE id = :id");

        $stmt->bindParam(':nombre', $usuario->getNombre());
        $stmt->bindParam(':apellido', $usuario->getApellido());
        $stmt->bindParam(':nickname', $usuario->getNickname());
        $stmt->bindParam(':password', $usuario->getPassword());
        $stmt->bindParam(':telefono', $usuario->getTelefono());
        $stmt->bindParam(':domicilio', $usuario->getDomicilio());
        $stmt->bindParam(':id', $usuario->getId());

        return $stmt->execute();//Este return devuelve un true si la consulta se ejecutó o un false si la consulta no se ejecutó.
    }

    public function updateNickname($nickname, $id) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET nickname = :nickname WHERE id = :id");
        $stmt->bindValue(':nickname', $nickname);
        $stmt->bindValue(':id', $id);

        return$stmt->execute();
        /*return $stmt->rowCount();*/ //RECORDAR QUE TENGO ESTE RETURN PARA CAMBIARLO POR EL $stmt->execute(); EN EL CASO DE QUE ME DE ALGÚN ERROR.
    }

    public function updatePassword($password, $id) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET password = :password WHERE id = :id");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
        /*return $stmt->rowCount();*/
    }

    public function updateTelefono($telefono, $id) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET telefono = :telefono WHERE id = :id");
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
         /*$stmt->rowCount();*/
    }

    public function updateDomicilio($domicilio, $id) {
        $stmt = $this->conn->prepare("UPDATE usuarios SET domicilio = :domicilio WHERE id = :id");
        $stmt->bindParam(':domicilio', $domicilio);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
         /*$stmt->rowCount();*/
    }

    public function deleteUsuario($id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

    }

    public function comprabarUsuario($nickname, $password) { //Los select tienen que devolver USUARIOS
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE nickname = :nickname and password = :password");
        $stmt->bindParam(':nickname', $nickname);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        $usuario = null;
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($fila) {
            $usuario = new DTOusuario(
                $fila['id'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['nickname'],
                $fila['password'],
                $fila['telefono'],
                $fila['domicilio']);
            return $usuario;
        } else {
            return $usuario;
        }
        //return $stmt->rowCount();
    }

    public function comprobarNickname($nickname) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE nickname = :nickname");
        $stmt->bindParam(':nickname', $nickname);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function comprobarPassword($password) {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE password = :password");
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        return $stmt->rowCount(); //Numero de filas que devuelve.
    }
}

?>
