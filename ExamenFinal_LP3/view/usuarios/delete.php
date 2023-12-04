<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');

    require_once(CONTROLLER_PATH.'usuarioController.php');
    $object = new usuarioController();

    $id_user = $_REQUEST['id'];  
    $object->delete($id_user);
    
?>