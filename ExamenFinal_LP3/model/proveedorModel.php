<?php
    class proveedorModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos) {
            $sql = 'INSERT INTO proveedores VALUES (:id_proveedor, :nombre_proveedor, :ruc, :tel, :direccion, :otros_datos)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_proveedor',$id_proveedor);
            $statement->bindParam(':nombre_proveedor',$nombre_proveedor);
            $statement->bindParam(':ruc',$ruc);
            $statement->bindParam(':tel',$tel);
            $statement->bindParam(':direccion',$direccion);
            $statement->bindParam(':otros_datos',$otros_datos);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos) {
            $sql = 'UPDATE proveedores SET nombre_proveedor=:nombre_proveedor, ruc=:ruc, tel=:tel, direccion=:direccion, otros_datos=:otros_datos WHERE id_proveedor=:id_proveedor';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_proveedor',$id_proveedor);
            $statement->bindParam(':nombre_proveedor',$nombre_proveedor);
            $statement->bindParam(':ruc',$ruc);
            $statement->bindParam(':tel',$tel);
            $statement->bindParam(':direccion',$direccion);
            $statement->bindParam(':otros_datos',$otros_datos);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_proveedor) {
                $sql = 'DELETE FROM proveedores WHERE id_proveedor=:id_proveedor';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_proveedor',$id_proveedor);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT id_proveedor, nombre_proveedor, ruc, tel, direccion, otros_datos FROM proveedores ORDER BY id_proveedor DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function ultimo(){
            $sql = 'SELECT * FROM proveedores ORDER by id_proveedor DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function buscar($id_proveedor) {
            $sql = 'SELECT id_proveedor, nombre_proveedor, ruc, tel, direccion, otros_datos FROM proveedores WHERE id_proveedor=:id_proveedor ORDER BY id_proveedor DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_proveedor',$id_proveedor);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

}
?>