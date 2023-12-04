<?php
    class clienteModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos) {
            $sql = 'INSERT INTO clientes VALUES (:id_clientes, :nombre_cliente, :apellido_cliente, :ruc_ci, :tel, :direccion, :otros_datos)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_clientes',$id_clientes);
            $statement->bindParam(':nombre_cliente',$nombre_cliente);
            $statement->bindParam(':apellido_cliente',$apellido_cliente);
            $statement->bindParam(':ruc_ci',$ruc_ci);
            $statement->bindParam(':tel',$tel);
            $statement->bindParam(':direccion',$direccion);
            $statement->bindParam(':otros_datos',$otros_datos);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos) {
            $sql = 'UPDATE clientes SET nombre_cliente=:nombre_cliente, apellido_cliente=:apellido_cliente, ruc_ci=:ruc_ci, tel=:tel, direccion=:direccion, otros_datos=:otros_datos WHERE id_clientes=:id_clientes';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_clientes',$id_clientes);
            $statement->bindParam(':nombre_cliente',$nombre_cliente);
            $statement->bindParam(':apellido_cliente',$apellido_cliente);
            $statement->bindParam(':ruc_ci',$ruc_ci);
            $statement->bindParam(':tel',$tel);
            $statement->bindParam(':direccion',$direccion);
            $statement->bindParam(':otros_datos',$otros_datos);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_clientes) {
                $sql = 'DELETE FROM clientes WHERE id_clientes=:id_clientes';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_clientes',$id_clientes);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT id_clientes, nombre_cliente, apellido_cliente, ruc_ci, tel, direccion, otros_datos FROM clientes ORDER BY id_clientes DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function ultimo(){
            $sql = 'SELECT * FROM clientes ORDER by id_clientes DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

        public function buscar($id_clientes) {
            $sql = 'SELECT id_clientes, nombre_cliente, apellido_cliente, ruc_ci, tel, direccion, otros_datos FROM clientes WHERE id_clientes=:id_clientes ORDER BY id_clientes DESC';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_clientes',$id_clientes);
            return ($statement->execute()) ? $statement->fetch() : false;
        }

}
?>