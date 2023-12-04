<div class="modal fade" id="editModal<?= $row['id_categoria'] ?>" tabindex="-1" aria-labelledby="editModal"
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
            <label for="id_categoria" class="form-label">ID</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?= $row['id_categoria'] ?>" type="text" class="form-control" id="id_categoria"
              name="id_categoria" readonly>
          </div>
          <div class="mb-3">
            <label for="desc_categoria" class="form-label">Descripcion de la categoria</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?= $row['descripcion_categoria'] ?>" type="text" class="form-control" id="desc_categoria"
              name="desc_categoria" autofocus required>
            <div class="invalid-feedback">Ingrese un nombre válido</div>
          </div>
          <div class="mb-3">
            <label for="porcentaje_iva" class="form-label">Porcentaje de IVA</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <select type="text" name="porcentaje_iva" id="porcentaje_iva" class="form-control" autocorrect="off" spellcheck="false" required>
            <option disabled selected style="display:none" value=""><?= $row['porcentaje_iva'] ?>%</option>
            <option value="5">5%</option>
            <option value="10">10%</option>
            </select>
            <div class="invalid-feedback">Ingrese un dato válido</div>
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