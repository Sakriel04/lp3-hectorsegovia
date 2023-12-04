<?php
    class marcasController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'marcaModel.php');
            $this->model = new marcaModel();
        }

        public function search($id_marca){
            return ($this->model->buscar($id_marca) != false) ? $this->model->buscar($id_marca) : header('location: ./index.php');;
        }
        public function update($id_marca,$nombre_marca){
            return ($this->model->actualizar($id_marca,$nombre_marca) != false) ? header('location: ./index.php') : header('location: ./index.php');
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function insert($id_marca, $nombre_marca){
            $id = $this->model->insertar($id_marca,$nombre_marca);
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