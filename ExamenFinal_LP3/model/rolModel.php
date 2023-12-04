<?php
    class rolModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_rol, $nombre_rol) {
            $sql = 'INSERT INTO roles VALUES (:id_rol,:nombre_rol)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_rol',$id_rol);
            $statement->bindParam(':nombre_rol',$nombre_rol);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_rol, $nombre_rol) {
            $sql = 'UPDATE roles SET nombre_rol=:nombre_rol WHERE id_rol=:id_rol';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nombre_rol',$nombre_rol);
            $statement->bindParam(':id_rol',$id_rol);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_rol) {
                $sql = 'DELETE FROM roles WHERE id_rol=:id_rol';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_rol',$id_rol);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT id_rol, nombre_rol FROM roles ORDER BY id_rol DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function buscar($id_rol) {
            $sql = 'SELECT id_rol, nombre_rol FROM roles WHERE id_rol=:id_rol ORDER BY id_rol DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_rol',$id_rol);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function ultimo(){
            $sql = 'SELECT * FROM roles ORDER by id_rol DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
}
?>