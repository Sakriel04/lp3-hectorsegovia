<?php
    class facturasController{
        private $model;
        public function __construct()
        {
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(MODEL_PATH.'facturasModel.php');
            $this->model = new facturasModel();
        }
        public function guardar($numero,$fecha,$cajeros,$cliente,$formasPago){
            $id = $this->model->insertar($numero,$fecha,$cajeros,$cliente,$formasPago);
            //return ($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
            return ($id!=false) ? $id : header("location:create.php");
        }
        public function insertarDetalles($cantidad,$precio,$idFacturas,$idProductos){
            //return ($this->model->insertarDetalles($idPer,$idUser));
            return ($this->model->insertarDetalles($cantidad,$precio,$idFacturas,$idProductos)) ? true : false;
        }
        public function show($id){
            return ($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
        }
        public function showPer($id){
            return ($this->model->showPer($id) != false) ? $this->model->showPer($id) : false;
        }
        public function showNumFactura(){
            return ($this->model->showNumFactura() != false) ? $this->model->showNumFactura() : header("Location:index.php");
        }
        public function showValidar($id){
            return ($this->model->showValidar($id) != false) ? $this->model->showValidar($id) : header("Location:index.php");
        }
        public function select(){
            return ($this->model->listar()) ? $this->model->listar() : false;
        }
        public function CabezeraFactura($id){
            return ($this->model->CabezeraFactura($id)) ? $this->model->CabezeraFactura($id) : false;
        }
        public function DetalleFactura($id){
            return ($this->model->DetalleFactura($id)) ? $this->model->DetalleFactura($id) : false;
        }
        public function indexModel(){
            return ($this->model->indexModel()) ? $this->model->indexModel() : false;
        }
        public function delete($id){
            return ($this->model->delete($id)) ? header("Location:index.php") : header("Location:show.php?id=".$id);
        }
        public function deleteDetalles($id){
            return ($this->model->deleteDetalles($id)) ? true :false;
        }


        /////////////////////////////////////////////////////////// JSON ////////////////////////////////////////////////////////////////////////
        public function createDetalleExist($arregloDetalles,$sesion){
            return ($this->model->createDetalleExist($arregloDetalles,$sesion)) ? header("Location: create.php") : false;
        }
        public function createDetalleNotExist($arregloDetalles,$sesion){  
            return ($this->model->createDetalleNotExist($arregloDetalles,$sesion)) ? false : false;
        }
        public function getDetalles($sesion){
            return $this->model->getDetalles($sesion);
        }

        public function deleteDetalle($id,$sesion) {
            $this->model->deleteDetalle($id,$sesion);
        }
    }   
?>