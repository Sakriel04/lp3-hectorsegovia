<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'marcasController.php');
    $object = new marcasController();

    $id_marca = $_REQUEST['id_marca'];
    $nombre_marca = $_REQUEST['nombre_marca'];
    
    $registro = $object->insert($id_marca, $nombre_marca);

?>