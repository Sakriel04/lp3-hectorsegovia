<?php
class categoriaController
{
    private $model;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
        require_once(MODEL_PATH . 'categoriaModel.php');
        $this->model = new categoriaModel();
    }

    public function search($id_categoria)
    {
        return ($this->model->buscar($id_categoria) != false) ? $this->model->buscar($id_categoria) : header('location: ./index.php');
    }
    public function update($id_categoria, $desc_categoria, $porcentaje_iva)
    {
        return ($this->model->actualizar($id_categoria, $desc_categoria, $porcentaje_iva) != false) ? header('location: ./index.php') : header('location: ./index.php');
    }

    public function select()
    {
        return ($this->model->listar()) ? $this->model->listar() : false;
    }

    public function insert($id_categoria, $desc_categoria, $porcentaje_iva)
    {
        $id = $this->model->insertar($id_categoria, $desc_categoria, $porcentaje_iva);
        return ($id != false) ? header('location: ./index.php') : header('location: ./index.php');
    }

    public function delete($id_categoria)
    {
        $eliminacion_exitosa = $this->model->eliminar($id_categoria);
        return $eliminacion_exitosa; // Devuelve true si se elimina correctamente, false si no
    }

    public function last()
    {
        return ($this->model->ultimo()) ? $this->model->ultimo() : false;
    }

}
?>