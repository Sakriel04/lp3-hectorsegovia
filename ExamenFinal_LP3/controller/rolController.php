<?php
    class rolController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'rolModel.php');
            $this->model = new rolModel();
        }

        public function search($id_rol){
            return ($this->model->buscar($id_rol) != false) ? $this->model->buscar($id_rol) : header('location: ./index.php');;
        }
        public function update($id_rol,$nombre_rol){
            return ($this->model->actualizar($id_rol,$nombre_rol) != false) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_rol, $nombre_rol){
            $id = $this->model->insertar($id_rol,$nombre_rol);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        } 

        public function delete($id){
            return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function last(){
            return ($this->model->ultimo()) ? $this->model->ultimo() : false;
        }

    }
?>