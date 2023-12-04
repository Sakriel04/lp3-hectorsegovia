<?php
    class vehiculoController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'vehiculoModel.php');
            $this->model = new vehiculoModel();
        }

        public function search($id_vehiculo){
            return ($this->model->buscar($id_vehiculo) != false) ? $this->model->buscar($id_vehiculo) : header('location: ./index.php');;
        }
        public function update($id_vehiculo,$descripcion_vehiculo){
            return ($this->model->actualizar($id_vehiculo,$descripcion_vehiculo) != false) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_vehiculo, $desc_vehiculo){
            $id = $this->model->insertar($id_vehiculo,$desc_vehiculo);
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