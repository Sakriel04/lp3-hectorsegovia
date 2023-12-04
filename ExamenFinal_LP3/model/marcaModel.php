<?php
    class marcaModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_marca, $nombre_marca) {
            $sql = 'INSERT INTO item_marcas VALUES (:id_marca,:nombre_marca)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_marca',$id_marca);
            $statement->bindParam(':nombre_marca',$nombre_marca);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_marca, $nombre_marca) {
            $sql = 'UPDATE item_marcas SET nombre_marca=:nombre_marca WHERE id_marca=:id_marca';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nombre_marca',$nombre_marca);
            $statement->bindParam(':id_marca',$id_marca);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_marca) {
                $sql = 'DELETE FROM item_marcas WHERE id_marca=:id_marca';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_marca',$id_marca);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT id_marca, nombre_marca FROM item_marcas ORDER BY id_marca DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function buscar($id_marca) {
            $sql = 'SELECT id_marca, nombre_marca FROM item_marcas WHERE id_marca=:id_marca ORDER BY id_marca DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_marca',$id_marca);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function ultimo(){
            $sql = 'SELECT * FROM item_marcas ORDER by id_marca DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
}
?>