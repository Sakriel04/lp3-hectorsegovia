<?php
    class matriculaModel {
        private $PDO;
        
        public function __construct(){
            include_once ($_SERVER['DOCUMENT_ROOT'].'/tallerphp19/routes.php');
            require_once(DAO_PATH.'database.php');
            $data = new dataConex();
            $this->PDO = $data->conexion();
        }

        public function listar() {
            $sql = 'SELECT m.idMatricula,m.fecha,e.nombre,e.apellido,m.idEstudiante,c.nombre curso,m.idCurso,u.alias usuario,m.idUsuario
            FROM matriculas m  join estudiantes e on m.idEstudiante=e.idEstudiante
            join cursos c on m.idCurso=c.idCurso join usuarios u on m.idUsuario=u.idUsuario
            ORDER BY m.idMatricula DESC';
            $statement = $this->PDO->prepare($sql);
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }

        //agregar funciones faltantes
    }