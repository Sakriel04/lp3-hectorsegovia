<?php
    class clienteController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'clienteModel.php');
            $this->model = new clienteModel();
        }

        public function search($id_clientes){
            return ($this->model->buscar($id_clientes) != false) ? $this->model->buscar($id_clientes) : header('location: ./index.php');;
        }
        public function update($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos){
            return ($this->model->actualizar($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos) != false) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos){
            $id = $this->model->insertar($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./create.php');
        } 

        public function delete($id_clientes){
            $eliminacion_exitosa = $this->model->eliminar($id_clientes);
            return $eliminacion_exitosa; // Devuelve true si se elimina correctamente, false si no
        }

        public function last(){
            return ($this->model->ultimo()) ? $this->model->ultimo() : false;
        }

    }
?>