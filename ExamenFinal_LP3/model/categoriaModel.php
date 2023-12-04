<?php
    class categoriaModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_categoria, $desc_categoria,$porcentaje_iva) {
            $sql = 'INSERT INTO item_categorias VALUES (:id_categoria,:descripcion_categoria,:porcentaje_iva)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_categoria',$id_categoria);
            $statement->bindParam(':descripcion_categoria',$desc_categoria);
            $statement->bindParam(':porcentaje_iva',$porcentaje_iva);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_categoria, $desc_categoria,$porcentaje_iva) {
            $sql = 'UPDATE item_categorias SET id_categoria = :id_categoria, descripcion_categoria=:descripcion_categoria, porcentaje_iva=:porcentaje_iva WHERE id_categoria=:id_categoria';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_categoria',$id_categoria);
            $statement->bindParam(':descripcion_categoria',$desc_categoria);
            $statement->bindParam(':porcentaje_iva',$porcentaje_iva);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_categoria) {
                $sql = 'DELETE FROM item_categorias WHERE id_categoria=:id_categoria';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_categoria',$id_categoria);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT id_categoria, descripcion_categoria, porcentaje_iva FROM item_categorias ORDER BY id_categoria DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function buscar($id_categoria) {
            $sql = 'SELECT id_categoria, descripcion_categoria, porcentaje_iva FROM item_categorias WHERE id_categoria=:id_categoria ORDER BY id_categoria DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_categoria',$id_categoria);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function ultimo(){
            $sql = 'SELECT * FROM item_categorias ORDER by id_categoria DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
}
?>