<?php
    class estudianteModel{
        private $PDO;
        
        public function __construct()
        {
            require_once ('../database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }
        public function insertar($nombre,$apellido,$codigocurso,) {
            $sql = 'INSERT INTO estudiantes VALUES (0,:nombre,:apellido,:codigoCurso)';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nombre',$nombre);
            $statement->bindParam(':apellido',$apellido);
            $statement->bindParam(':codigoCurso',$codigoCurso);
            $statement->execute();
            return ($this->PDO->lastInsertId());
        }

        public function actualizar($idEstudiante,$nombre,$apellido,$codigocurso) {
            $sql = 'UPDATE estudiantes SET nombre=:nombre,apellido=:apellido,codigoCurso=:codigoCurso WHERE idEstudiante=:idEstudiante';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':nombre',$nombre);
            $statement->bindParam(':apellido',$apellido);
            $statement->bindParam(':codigoCurso',$codigoCurso);
            $statement->bindParam(':idEstudiante',$idEstudiante);
            return ($statement->execute()) ? true : false;
        }

        public function eliminar($idEstudiante) {
            $sql = 'DELETE FROM estudiantes WHERE idEstudiante=:idEstudiante';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idEstudiante',$idEstudiante);
            return ($statement->execute()) ? true : false;
        }
        
        public function listar(){
           $sql = 'SELECT * FROM estudiantes ORDER BY idEstudiante DESC';
           $statement = $this->PDO->prepare($sql);
           return ($statement->execute()) ? $statement->fetchAll() : false; 
        }

        public function buscar($idEstudiante){
            $sql = 'SELECT * FROM estudiantes WHERE idEstudiante = idEstudiante';
            $statement = $this->PDO->prepare($sql);
            $statement->bindParam(':idEstudiante',$idEstudiante);
            return ($statement->execute()) ? $statement->fetch() : false; 
         }
    }
?>