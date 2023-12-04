<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
    
    require_once(CONTROLLER_PATH.'vehiculoController.php');
    $object = new vehiculoController();

    $id_vehiculo = $_REQUEST['id_vehiculo'];
    $descripcion_vehiculo = $_REQUEST['descripcion_vehiculo'];
    
    $object->update($id_vehiculo, $descripcion_vehiculo);

?>