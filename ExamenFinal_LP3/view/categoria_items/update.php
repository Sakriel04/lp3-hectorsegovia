<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/ExamenFinal_LP3/routes.php');
    
    require_once(CONTROLLER_PATH.'categoriaController.php');
    $object = new categoriaController();

    $id_categoria = $_REQUEST['id_categoria'];
    $desc_categoria = $_REQUEST['desc_categoria'];
    $porcentaje_iva = $_REQUEST['porcentaje_iva'];
    
    $object->update($id_categoria, $desc_categoria,$porcentaje_iva);

?>