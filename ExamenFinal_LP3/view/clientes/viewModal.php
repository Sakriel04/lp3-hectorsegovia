<div class="modal fade" id="viewModal<?=$row['id_clientes']?>" tabindex="-1" aria-labelledby="VistaModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="VistaModal">Vista Completa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="card" style="width: 28rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID: <?=$row['id_clientes']?></li>
                    <li class="list-group-item">Nombre: <?=$row['nombre_cliente']?></li>
                    <li class="list-group-item">Apellido: <?=$row['apellido_cliente']?></li>
                    <li class="list-group-item">N.º CI o RUC: <?=$row['ruc_ci']?></li>
                    <li class="list-group-item">Teléfono: <?=$row['tel']?></li>
                    <li class="list-group-item">Dirección: <?=$row['direccion']?></li>
                    <li class="list-group-item">Otros Datos: <?=$row['otros_datos']?></li>

                </ul>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>