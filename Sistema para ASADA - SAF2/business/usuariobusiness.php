<?php 

    include '../data/usuariodata.php';

    class BusinessUsuario{

        private $usuarioData;

        public function BusinessUsuario(){
            $this->usuarioData = new UsuarioData();
        }

        public function insertarUsuario($usuario) {
            return $this->usuarioData-> insertar($usuario);
        }

        public function actualizarUsuario($usuario,$id) {
            return $this->usuarioData-> modificar($usuario,$id);
        }

        public function eliminarUsuario($usuario) {
            return $this->usuarioData-> eliminar($usuario);
        }

        public function obtenerUsuarios($usuario) {
            return $this->usuarioData-> obtenerUsuarios($usuario);
        }

        public function getCorreo($pdo,$id){
           
            return $this->usuarioData->getInfoEmpleado($pdo,$id);
            
        }

    }




?>