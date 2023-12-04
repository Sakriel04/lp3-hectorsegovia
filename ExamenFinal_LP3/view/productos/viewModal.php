<div class="modal fade" id="idver<?=$row['id_item']?>" tabindex="-1" aria-labelledby="VistaModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="VistaModal">Vista Completa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="card" style="width: 28rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID: <?=$row['id_item']?></li>
                    <li class="list-group-item">Código de Barras: <?=$row['codigobarras']?></li>
                    <li class="list-group-item">Producto: <?=$row['nombre_item']?></li>
                    <li class="list-group-item">Descripción: <?=$row['descripcion']?></li>
                    <li class="list-group-item">Precio de Costo: <?=$row['precio_costo']?></li>
                    <li class="list-group-item">Precio de Venta: <?=$row['precio_venta']?></li>
                    <li class="list-group-item">Categiría: <?=$row['descripcion_categoria']?></li>
                    <li class="list-group-item">Marca: <?=$row['nombre_marca']?></li>
                </ul>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>