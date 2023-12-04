<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'proveedorController.php');
    $object = new proveedorController();

    $id_proveedor = $_REQUEST['id_proveedor'];  
    $object->delete($id_proveedor);
    
    $eliminacion_exitosa = $object->delete($id_proveedor);

    if (!$eliminacion_exitosa) {
        // No se pudo eliminar el registro
        header('location: ./index.php?eliminar=error');
    } else {
        // Eliminación exitosa, simplemente redirige al index
        header('location: ./index.php');
    }
?>