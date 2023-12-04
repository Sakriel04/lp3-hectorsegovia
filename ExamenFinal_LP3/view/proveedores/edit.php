<div class="modal fade" id="editModal<?= $row['id_proveedor'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Editar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="id_vehiculo" class="form-label">ID</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$row['id_proveedor']?>" type="text" class="form-control" id="id_proveedor" name="id_proveedor" readonly>
            </div>
            <div class="mb-3">
                <label for="nombre_cliente" class="form-label">Nombre</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$row['nombre_proveedor']?>" type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" autofocus required>
                 <div class="invalid-feedback">Ingrese un nombre válido</div>
            </div>
            <div class="mb-3">
                <label for="descripcion_vehiculo" class="form-label">RUC</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$row['ruc']?>" type="text" class="form-control" id="ruc" name="ruc" autofocus required pattern="[0-9]{6,}">
                 <div class="invalid-feedback">Ingrese un registro válido</div>
            </div>
            <div class="mb-3">
                <label for="descripcion_vehiculo" class="form-label">Teléfono</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$row['tel']?>" type="text" class="form-control" id="tel" name="tel">
                 <div class="invalid-feedback">Ingrese un teléfono válido</div>
            </div>
            <div class="mb-3">
                <label for="descripcion_vehiculo" class="form-label">Dirección</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <input value="<?=$row['direccion']?>" type="text" class="form-control" id="direccion" name="direccion">
                 <div class="invalid-feedback">Ingrese una dirección válida</div>
            </div>
            <div class="mb-3">
                <label for="descripcion_vehiculo" class="form-label">Otros Datos</label>
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <textarea rows="3" type="text" class="form-control" id="otros_datos" name="otros_datos"><?=$row['otros_datos']?></textarea>
                 <div class="invalid-feedback">Ingrese datos válidos</div>
            </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>  
      <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
    </div>
  </div>
</div>