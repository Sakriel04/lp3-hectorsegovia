<?php
    session_start();
    require_once("c://wamp64/www/produccion/controller/facturasController.php");
    $obj = new facturasController();
    $id = $obj->guardar($_POST['factura'],$_POST['fecha'],$_SESSION['id'],$_POST['cliente'],$_POST['formas']);
    $sesion = $_SESSION['usuario'];
    $file ='tmpFacVen'.$sesion.'.json'; 
    
    if (is_file( $file )){
        $arrDetalles = $obj->getDetalles($sesion);
        foreach ($arrDetalles as $row){

            $car =  $obj->insertarDetalles($row["cantidad"],$row["precio"],$id,$row["idProducto"]);
            
        }     

    }
    if (!empty($id)){
        unlink($file);
        header("Location:../fpdf-tutoriales-master/PruebaV.php?id=".$id); 

    }
  

 
?>