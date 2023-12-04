<?php
    class productosController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'productosModel.php');
            $this->model = new productosModel();
        }

        public function search($usuario){
            return ($this->model->buscar($usuario) != false) ? $this->model->buscar($usuario) : false;
        }
        public function update($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca){
            return ($this->model->actualizar($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca) != false) ? header('location: ./index.php') : header('location: ./edit.php?id='.$id_item);
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca){
            $id = $this->model->insertar($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca);
            return ($id!=false) ? header('location: ./index.php') : header('location: ./index.php');
        } 

        public function delete($id_item){
            $eliminacion_exitosa = $this->model->eliminar($id_item);
            return $eliminacion_exitosa; // Devuelve true si se elimina correctamente, false si no
        }

        public function last(){
            return ($this->model->ultimo()) ? $this->model->ultimo() : false;
        }

        public function comboCategoria(){
            return ($this->model->desplegableCategoria()) ? $this->model->desplegableCategoria() : false;
        }

        public function comboMarca(){
            return ($this->model->desplegableMarca()) ? $this->model->desplegableMarca() : false;
        }

    }
?>