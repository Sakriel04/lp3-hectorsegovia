<?php
    class usuarioModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function insertar($id_user, $nombre, $apellido, $alias, $hash, $id_vehiculo, $id_rol) {
            $sql = 'INSERT INTO usuarios VALUES (:id_user,:nombre,:apellido,:alias,:password,:id_vehiculo,:id_rol)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_user',$id_user);
            $statement->bindParam(':nombre',$nombre);
            $statement->bindParam(':apellido',$apellido);
            $statement->bindParam(':alias',$alias);
            $statement->bindParam(':password',$hash);
            $statement->bindParam(':id_vehiculo',$id_vehiculo);
            $statement->bindParam(':id_rol',$id_rol);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($id_user, $nombre, $apellido, $alias, $id_vehiculo, $id_rol) {
            $sql = 'UPDATE usuarios SET nombre=:nombre,apellido=:apellido,alias=:alias,id_vehiculo=:id_vehiculo,id_rol=:id_rol WHERE id_user=:id_user';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_user',$id_user);
            $statement->bindParam(':nombre',$nombre);
            $statement->bindParam(':apellido',$apellido);
            $statement->bindParam(':alias',$alias);
            $statement->bindParam(':id_vehiculo',$id_vehiculo);
            $statement->bindParam(':id_rol',$id_rol);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($id_user) {
                $sql = 'DELETE FROM usuarios WHERE id_user=:id_user';
                $statement = $this->PDO->prepare($sql);
                $statement->bindParam(':id_user',$id_user);
                return ($statement->execute()) ? true : false;
        }
        public function listar() {
            $sql = 'SELECT u.id_user,u.nombre,u.apellido,u.alias,u.password,v.descripcion_vehiculo,r.nombre_rol FROM usuarios u INNER JOIN vehiculos v ON v.id_vehiculo = u.id_vehiculo INNER JOIN roles r ON r.id_rol = u.id_rol';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function buscar($usuario) {
            $sql = 'SELECT * FROM usuarios WHERE alias=:alias';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':alias',$usuario);        
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function buscarId($id_user) {
            $sql = 'SELECT * FROM usuarios WHERE id_user=:id_user';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':id_user',$id_user);        
            return ($statement->execute()) ? $statement->fetch() : false;
        } 
        public function ultimo(){
            $sql = 'SELECT * FROM usuarios ORDER by id_user DESC LIMIT 1';
            $statement = $this -> PDO -> prepare($sql);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function desplegableVehiculos() {
            $sql = 'SELECT id_vehiculo,descripcion_vehiculo FROM vehiculos ORDER BY id_vehiculo ASC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
        public function desplegableRoles() {
            $sql = 'SELECT id_rol,nombre_rol FROM roles ORDER BY id_rol ASC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
}
?>