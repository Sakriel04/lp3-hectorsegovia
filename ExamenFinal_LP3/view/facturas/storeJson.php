<?php
    require_once("c://wamp64/www/produccion/controller/facturasController.php");
    $obj = new facturasController();
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    $sesion = $_SESSION['usuario'];
    $file ='tmpFacVen'.$sesion.'.json'; 
	$exist = is_file( $file );
    $total = 0;
    $iva = 0;

     if (isset($_POST['idProducto']) and isset($_POST['nombre'])and isset($_POST['precio'])and isset($_POST['cantidad'])) {
        $codigo = intval($_POST['idProducto']);
        $nombre = $_POST['nombre']; 
        $precio = $_POST['precio']; 
        $cantidad = $_POST['cantidad']; 
        $subTotal = $_POST['subTotal']; 
        $arregloDetalles = array ('idProducto'=>$codigo,'nombre'=>$nombre,'precio'=>$precio,'cantidad'=>$cantidad,'subTotal'=>$subTotal,'sesion'=>$sesion);

        if ( $exist ) {
            $obj->createDetalleExist($arregloDetalles,$sesion);
        } else {
            $obj->createDetalleNotExist($arregloDetalles,$sesion);
        }

        
    } elseif (isset($_POST['idProducto'])) {
        $codigo = intval($_POST['idProducto']);
        $obj->deleteDetalle($codigo,$sesion);
    }elseif (isset($_GET['edit'])) {
        file_put_contents("tmpFacVen$sesion.json", json_encode(null, JSON_PRETTY_PRINT));
        $data = $obj->showPer($_GET['id']);
        foreach ($data as $row){
            $arregloDetalles = array(
                'idProducto' => $row['idProducto'],
                'nombre' => $row['nombre'],
                'precio' => $row['precio'],
                'cantidad' => $row['cantidad'],
                'sesion' => $sesion
            );
            $obj->createDetalleExist($arregloDetalles,$sesion);
        }
        
    }   
    
    $arrDetalles = $obj->getDetalles($sesion);
    if (!empty($arrDetalles)){

    
 ?>
        <h2>Productos agregados</h2>  
            <table class="table">
            <thead>
                
            <th scope="col">Codigo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Nombre</th>
            <th class="text-end" scope="col">Precio</th>
            <th class="text-end" scope="col">Subtotal</th>
            <th scope="col"></th>
            

                
                
            </thead>
            <tbody>

                    <?php foreach ($arrDetalles as $row): 
                        $total = $total + (intval($row['cantidad']) * intval($row['precio']));
                        ?>
                        <tr>
                            <td><?= $row["idProducto"] ?></td>
                            <td><?= $row["cantidad"] ?></td>
                            <td><?= $row["nombre"] ?></td>
                            <td class="text-end"><?= $row["precio"] ?></td>
                            <td class="text-end"><?=$row['subTotal'] ?></td>
                            <th class='text-center'><a href="#" onclick="eliminar('<?php echo $row['idProducto'] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg></a>
                            </th>
                        
                        </tr>
                    <?php endforeach ?> 
                    <tr>
                        <td class="text-end" colspan=4>Total:</td>
                        <td class="text-end"><?=$total?></td>
                        <td ></td>
                        
                    </tr>
                    <tr>

                        <td class="text-end" colspan=4>Iva:</td>
                        <td class="text-end"><?= $iva = $total * 0.10 ?></td>
                        <td ></td>
                    </tr>
                    
            </tbody>
    </table>
<?php } else {
    echo '<div class="alert alert-danger" role="alert">
    No hay Productos
  </div>';
}?>