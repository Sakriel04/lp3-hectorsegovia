<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'rolController.php');
    $object = new rolController();

    $id_rol = $_REQUEST['id_rol'];
    $nombre_rol = $_REQUEST['nombre_rol'];
    
    $registro = $object->insert($id_rol, $nombre_rol);

?>