<?php
    class matriculaController {
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/tallerphp19/routes.php');
            require_once(MODEL_PATH.'matriculaModel.php');
            $this->model = new matriculaModel();
        }
        
        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        } 
               
        //agregar funciones faltantes
    }