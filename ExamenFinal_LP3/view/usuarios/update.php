<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
    
    require_once(CONTROLLER_PATH.'usuarioController.php');
    $object = new usuarioController();

    $id_user = $_REQUEST['id_user'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $alias = $_REQUEST['alias'];
    $id_vehiculo = $_REQUEST['id_vehiculo'];
    $id_rol = $_REQUEST['id_rol'];
    
    $registro = $object->update($id_user, $nombre, $apellido,$alias, $id_vehiculo, $id_rol);

?>