<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'marcasController.php');
    $object = new marcasController();

    $id_marca = $_REQUEST['id'];  
    $eliminacion_exitosa = $object->delete($id_marca);

    if (!$eliminacion_exitosa) {
        // No se pudo eliminar el registro
        header('location: ./index.php?eliminar=error');
    } else {
        // Eliminación exitosa, simplemente redirige al index
        header('location: ./index.php');
    }
    
?>