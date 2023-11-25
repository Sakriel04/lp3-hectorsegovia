<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startups_errors', 1);
    include_once($_SERVER['DOCUMENT_ROOT'].'/tallerphp18/routes.php');
    
    require_once(CONTROLLER_PATH.'estudianteController.php');
    $object = new estudianteController();

    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $idCurso = $_REQUEST['idCiudad'];
    
    $registro = $object->insert($nombre,$apellido,$idCiudad);

?>