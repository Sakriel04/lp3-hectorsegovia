<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'proveedorController.php');
    $object = new proveedorController();

    $id_proveedor = $_REQUEST['id_proveedor'];
    $nombre_proveedor = $_REQUEST['nombre_proveedor'];
    $ruc = $_REQUEST['ruc'];
    $tel = $_REQUEST['tel'];
    $direccion = $_REQUEST['direccion'];
    $otros_datos = $_REQUEST['otros_datos'];
    
    $registro = $object->insert($id_proveedor, $nombre_proveedor, $ruc, $tel, $direccion, $otros_datos);

?>