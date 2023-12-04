<?php
    require_once("c://wamp64/www/produccion/controller/facturasController.php");

    $obj = new facturasController();
    $id=$_POST['idCliente'];
    $rows = $obj->showPer($id);

	if ($id != null) {  
          
        ?>
            <script type="text/javascript">
                $('#ruc').val(<?= $rows[0]['ruc'] ?>);
                $('#telefono').val(<?= $rows[0]['telefono'] ?>);
            </script> 
        <?php 
        
    } else { 
        ?>
            <script type="text/javascript">
                $('#ruc').val('');  
                $('#telefono').val('');
            </script> 
        <?php 
    } 

?>