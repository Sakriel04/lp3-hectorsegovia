<?php
    class usuarioController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'usuarioModel.php');
            $this->model = new usuarioModel();
        }

        public function search($usuario){
            return ($this->model->buscar($usuario) != false) ? $this->model->buscar($usuario) : false;
        }

        public function searchId($id_user){
            return ($this->model->buscarId($id_user) != false) ? $this->model->buscarId($id_user) : false;
        }
        public function update($id_user, $nombre, $apellido, $alias, $id_vehiculo, $id_rol){
            return ($this->model->actualizar($id_user, $nombre, $apellido, $alias, $id_vehiculo, $id_rol) != false) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_user, $nombre, $apellido, $alias, $hash, $id_vehiculo, $id_rol){
            $id = $this->model->insertar($id_user, $nombre, $apellido, $alias, $hash, $id_vehiculo, $id_rol);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./index.php');
        } 

        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function last(){
            return ($this->model->ultimo()) ? $this->model->ultimo() : false;
        }

        public function comboVehiculo(){
            return ($this->model->desplegableVehiculos()) ? $this->model->desplegableVehiculos() : false;
        }

        public function comboRol(){
            return ($this->model->desplegableRoles()) ? $this->model->desplegableRoles() : false;
        }

    }
?>