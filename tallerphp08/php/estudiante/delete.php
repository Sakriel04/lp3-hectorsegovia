<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startups_errors', 1);
    require_once('estudianteModel.php');
    $object = new estudianteModel();

    $idEstudiante = $_REQUEST['id'];
    $object->eliminar($idEstudiante);

     header('location: index.php');
?>