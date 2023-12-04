<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'productosController.php');
    $object = new productosController();

    $id_item = $_REQUEST['id'];  
    $eliminacion_exitosa = $object->delete($id_item);

    if (!$eliminacion_exitosa) {
        // No se pudo eliminar el registro
        header('location: ./index.php?eliminar=error');
    } else {
        // Eliminación exitosa, simplemente redirige al index
        header('location: ./index.php');
    }
    
?>