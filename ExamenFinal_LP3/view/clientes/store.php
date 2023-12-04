<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'clienteController.php');
    $object = new clienteController();

    $id_clientes = $_REQUEST['id_clientes'];
    $nombre_cliente = $_REQUEST['nombre_cliente'];
    $apellido_cliente = $_REQUEST['apellido_cliente'];
    $ruc_ci = $_REQUEST['ruc_ci'];
    $tel = $_REQUEST['tel'];
    $direccion = $_REQUEST['direccion'];
    $otros_datos = $_REQUEST['otros_datos'];
    
    $registro = $object->insert($id_clientes, $nombre_cliente, $apellido_cliente, $ruc_ci, $tel, $direccion, $otros_datos);

?>