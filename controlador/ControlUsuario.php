<?php

    require "../modelo/DAOusuario.php";

    class ControlUsuario {
        private $DAOUsuario;
        public function __construct() {
			$this->DAOUsuario = new DAOusuario();
		}

        public function getUsuario($id) {
            return $this->DAOUsuario->selectUsuario($id);
        }

        /*public function getUsuariobyNicknamePassword($nickname, $password) {
            return $this->DAOUsuario->selectUsuariobyNicknamePassword($nickname, $password);
        }*/

        public function getAllUsuarios() {
            return $this->DAOUsuario->selectAllUsuarios();
        }

        public function nuevoUsuario($usuario) {
            return $this->DAOUsuario->insertUsuario($usuario);
        }

        public function actualizarUsuario ($usuario) {
            return $this->DAOUsuario->updateUsuario($usuario);
        }

        public function actualizarNickname($nickname, $id) {
            return $this->DAOUsuario->updateNickname($nickname, $id);
        }

        public function actualizarPassword($password, $id) {
            return $this->DAOUsuario->updatePassword($password, $id);
        }

        public function actualizarTelefono($telefono, $id) {
            return $this->DAOUsuario->updateTelefono($telefono, $id);
        }

        public function actualizarDomicilio($domicilio, $id) {
            return $this->DAOUsuario->updateDomicilio($domicilio, $id);
        }

        public function borrarUsuario($id) {
            if (self::getUsuario($id)) {
                $this->DAOUsuario->deleteUsuario($id);
                return 1;
            } else {
                return -1;
            }
        }
        public function comprobarUsuario($nickname, $password) {
            return $this->DAOUsuario->comprabarUsuario($nickname, $password);
        }

        public function comprobarNickname($nickname) {
            return $this->DAOUsuario->comprobarNickname($nickname);
        }

        public function comprobarPassword($password) {
            return $this->DAOUsuario->comprobarPassword($password);

        }
    }
?>
