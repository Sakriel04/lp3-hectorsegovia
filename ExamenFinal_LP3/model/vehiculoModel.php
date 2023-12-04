<?php
    class vehiculoModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_vehiculo, $descripcion_vehiculo) {
            $sql = 'INSERT INTO vehiculos VALUES (:id_vehiculo,:descripcion_vehiculo)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_vehiculo',$id_vehiculo);
            $statement->bindParam(':descripcion_vehiculo',$descripcion_vehiculo);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_vehiculo, $descripcion_vehiculo) {
            $sql = 'UPDATE vehiculos SET descripcion_vehiculo=:descripcion_vehiculo WHERE id_vehiculo=:id_vehiculo';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':descripcion_vehiculo',$descripcion_vehiculo);
            $statement->bindParam(':id_vehiculo',$id_vehiculo);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_vehiculo) {
                $sql = 'DELETE FROM vehiculos WHERE id_vehiculo=:id_vehiculo';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_vehiculo',$id_vehiculo);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT id_vehiculo, descripcion_vehiculo FROM vehiculos ORDER BY id_vehiculo DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function buscar($id_vehiculo) {
            $sql = 'SELECT id_vehiculo, descripcion_vehiculo FROM vehiculos WHERE id_vehiculo=:id_vehiculo ORDER BY id_vehiculo DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_vehiculo',$id_vehiculo);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function ultimo(){
            $sql = 'SELECT * FROM vehiculos ORDER by id_vehiculo DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
}
?>