<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');

require_once(CONTROLLER_PATH . 'productosController.php');
$object = new productosController();

$id_item = $_REQUEST['id_item'];
$codigobarras = $_REQUEST['codigobarras'];
$nombre_item = $_REQUEST['nombre_item'];
$descripcion = $_REQUEST['descripcion'];
$precio_costo = $_REQUEST['precio_costo'];
$precio_venta = $_REQUEST['precio_venta'];
$id_categoria = $_REQUEST['id_categoria'];
$id_marca = $_REQUEST['id_marca'];


if ($precio_costo > $precio_venta) {
    // PCosto mayor a Pventa
    header('location: /ExamenFinal_LP3/view/productos/index.php?pmayor=error');
} else {
    // Continua normal
    $registro = $object->insert($id_item, $codigobarras, $nombre_item, $descripcion, $precio_costo, $precio_venta, $id_categoria, $id_marca);
}

?>