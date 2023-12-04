
<div class="modal fade" id="editModal<?= $row['id_marca'] ?>" tabindex="-1" aria-labelledby="editModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Editar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
          <div class="mb-3">
            <label for="id_marca" class="form-label">ID</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?= $row['id_marca'] ?>" type="text" class="form-control" id="id_marca" name="id_marca"
              readonly>
          </div>
          <div class="mb-3">
            <label for="nombre_marca" class="form-label">Descripción Vehículo</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?= $row['nombre_marca'] ?>" type="text" class="form-control" id="nombre_marca"
              name="nombre_marca" autofocus required>
            <div class="invalid-feedback">Ingrese un nombre válido</div>
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

<?php include_once(ROOT_PATH . 'footer.php') ?>