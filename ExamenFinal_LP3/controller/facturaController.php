<?php
    class facturaController{
        private $model;
        
        public function __construct() {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'facturaModel.php');
            $this->model = new facturaModel();
        }

        public function search($factura){
            return ($this->model->buscar($factura) != false) ? $this->model->buscar($factura) : false;
        }

        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }

        public function listcursos(){
            return ($this->model->listarCursos()) ? $this->model->listarCursos() : false;
        }
        
        public function combolistcliente(){
            return ($this->model->cargarCliente()) ? $this->model->cargarCliente() : false;
        }

        public function combolisttipofactura(){
            return ($this->model->cargarTipofactura()) ? $this->model->cargarTipofactura() : false;
        }
    }
?>