<?php
    class proveedorController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'proveedorModel.php');
            $this->model = new proveedorModel();
        }

        public function search($id_proveedor){
            return ($this->model->buscar($id_proveedor) != false) ? $this->model->buscar($id_proveedor) : header('location: ./index.php');;
        }
        public function update($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos){
            return ($this->model->actualizar($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos) != false) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos){
            $id = $this->model->insertar($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        } 

        public function delete($id_proveedor){
            $eliminacion_exitosa = $this->model->eliminar($id_proveedor);
            return $eliminacion_exitosa; // Devuelve true si se elimina correctamente, false si no
        }

        public function last(){
            return ($this->model->ultimo()) ? $this->model->ultimo() : false;
        }

    }
?>