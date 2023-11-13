<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/tallerphp12/routes.php');
    require_once(MODEL_PATH.'estudianteModel.php');
    $object = new estudianteModel();

    $idEstudiante = $_REQUEST['id'];
    $object->eliminar($idEstudiante);

     header('location: index.php');
?>