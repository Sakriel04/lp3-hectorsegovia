<?php
 session_start();
 
 require_once("c://wamp64/www/produccion/controller/facturasController.php");
 require_once("c://wamp64/www/produccion/controller/formasPagoController.php");
 require_once("c://wamp64/www/produccion/controller/clientesController.php");
 $obj = new facturasController();
 $FormasPago = new formasPagoController();
 $Cliente = new clientesController();
 $Pago = $FormasPago->index();
 $rows = $obj->indexModel();
 $Cli = $Cliente->index();
 $sesion = $_SESSION['usuario'];
 $numFactura = $obj->showNumFactura();

    if(!isset($_SESSION['usuario']) || $_SESSION['usuario']==null){
    header('Location: http://localhost/produccion');
    }

    if ($_SESSION['usuario'] != 'admin' && ($_SESSION['permiso'] === null || $_SESSION['permiso'] != 'FACTURAS')) {
        header("Location: http://localhost/produccion/inicio403.php");
    }

 require_once("c://wamp64/www/produccion/view/head/head.php");

 if (is_file( 'tmpFacVen$sesion.json' )){
  $arrDetalles = $obj->getDetalles($sesion);
 }
?>

<div class="container">

<div class="card mt-5">
  <h5 class="card-header">Facturacion</h5>
    <div class="card-body">
    <form class="row g-3" action="store.php" method="POST" autocomlete="off">
            <div class = "col-md-4">
            <div id="query"></div>
              <label for="estado" class="form-label">Cliente</label>
                <select class="form-control" name="cliente" id="cliente" require>
                <option disabled selected value="">Selecciona una opción</option>
                <?php 
                foreach ($Cli as $valor2):?>
                    <option value="<?php echo $valor2['idCliente']?>"><?php echo $valor2['nombre'].' '.$valor2['apellido']?></option>
                <?php       
                    endforeach
                ?>
                </select> 
            </div>
            <div class = "col-md-4">
              <label for="ruc" class = "form-label">RUC</label>
              <input type="text" name="ruc" require class="form-control" id="ruc">
            </div>
            <div class = "col-md-3">
              <label for="telefono" class = "form-label">Telefono</label>
              <input type="text" name="telefono" require class="form-control" id="telefono">
            </div> 
            <div class = "col-md-3">
              <label for="fecha" class = "form-label">Fecha</label>
              <input type="date" name="fecha" require class="form-control" id="fecha">
            </div>   
            <div class = "col-md-4">
              <label for="factura" class = "form-label">Nro factura</label>
              <input type="number" name="factura" require class="form-control" id="factura" value="<?php echo $numFactura[0]['numero']?>" >
            </div> 
            <div class = "col-md-3">
              <label for="estado" class="form-label">Formas de pago</label>
              <select class="form-control" name="formas" id="formas">
              <?php 
                foreach ($Pago as $valor2):?>
                    <option value="<?php echo $valor2['idPago']?>"><?php echo $valor2['nombre']?></option>
                <?php       
                    endforeach
                ?>
              </select>  
            </div>    

              <div class="model-footer">
                <div class="float-none">
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="fas fa-search"></span> Añadir producto
                  </button>
                  <button type="submit" class="btn btn-primary">
                    <span class="fas fa-print"></span> Facturar
                  </button>
                </div>
              </div>
                  <!-- Tabla Rellenar -->
            <div id="resultados"></div>    
               <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Permisos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                        <thead>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Acciones</th>
                        </thead>
                        <tbody> 
                            <?php if ($rows): ?> 
                                <?php foreach ($rows as $row): ?> 
                            <tr>
                            <input type="hidden" id="cod_<?php echo $row['idProducto']; ?>" value=<?php echo $row['idProducto']; ?>>
                            <input type="hidden" id="nombre_<?php echo $row['idProducto']; ?>" value="<?php echo htmlspecialchars($row['nombre']); ?>">
                            <input type="hidden" id="precio_<?php echo $row['idProducto']; ?>" value=<?php echo $row['precio']; ?>>

                            <td> <?= $row[0] ?> </td>
                            <td> <?= $row[1] ?> </td>
                            <td> <?= $row[3] ?> </td>
                            <td class='col-xs-2'>
                              <div class="float-right">
						                    <input type="number" class="form-control" style="text-align:right"  id="cantidad_<?php echo $row[0]; ?>"  value="1">
						                  </div>
                            </td>
                            <th>
                                <div class="form-check form-switch">
                                <button type="button" class="btn btn-primary" onclick="agregar(<?php echo $row[0]; ?>)">+ </button>
                                </div>
                            </th>
                            </tr> 
                                <?php endforeach ?> 
                            <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-dialog modal-dialog-scrollable"></div>
            <!--fin modal-->
    </form>      
    </div>        
</div>            

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>


<?php
  require_once("c://wamp64/www/produccion/view/head/footer.php");

?>
<script>
  
    function agregar(id) {
      console.log(id);

      var codigo = document.getElementById("cod_" + id).value;
      var nombre = document.getElementById("nombre_" + id).value;
      var precio = document.getElementById("precio_" + id).value;
      var cantidad = document.getElementById("cantidad_" + id).value;
      var subTotal = parseInt(precio) * parseInt(cantidad);
    

      var parametros = {
          'idProducto': codigo,
          'nombre': nombre,
          'precio': precio,
          'cantidad': cantidad,
          'subTotal': subTotal
          
      };

      $.ajax({
          type: 'POST',
          url: 'storeJson.php',
          data: parametros,
          beforeSend: function(objeto) {
              $('#resultados').html("Cargando...");
          },
          success: function(data) {
              $('#resultados').empty();
              $('#resultados').html(data);
          }
      });
    }
    function eliminar(id) {
        if (confirm("Desea eliminar este detalle? (" + id + ")")) {
            var parametros = {
                'idProducto': id
            };
            $.ajax({
                type: 'POST',
                url: 'storeJson.php',
                data: parametros,
                beforeSend: function(objeto) {
                    $('#resultados').html("Cargando...");
                },
                success: function(data) {
                    $('#resultados').html(data);
                }
            });
        }
    }
    $("#cliente").change(function(){
        var idCliente = $('#cliente').val();
        $.ajax({
            type: "POST",
            url:'buscarCliente.php',
            data:'idCliente='+idCliente,
            beforeSend: function () {
            $('#query').html("\
                <center>\
                <label>Cargando...</label>\
                <center>");
            },
            success: function(res) {
              $('#query').html(res);
            }
        });
  });
</script>