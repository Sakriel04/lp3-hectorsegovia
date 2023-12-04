<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/view/categoria_items/index.php');
require_once(CONTROLLER_PATH . 'categoriaController.php');
$object = new categoriaController();
$rows = $object->select();
$id_categoria = $object->last();

if (!empty($rows)) {
  $ultimo = ("$id_categoria[0]") + 1;
} else {
  $ultimo = 1;
}
?>


<!-- Modal -->
<form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Categoría</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label class="form-label" for="text">ID</label>
          <input type="text" value="<?= $ultimo ?>" name="id_categoria" id="id_categoria" class="form-control w-25" readonly />
          <div class="mb-3">
          <label class="form-label" for="text">Descripcion de la categoria</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <input type="text" name="desc_categoria" id="desc_categoria" class="form-control" autocorrect="off" spellcheck="false" autofocus required/>
          <div class="invalid-feedback">Ingrese una descripción válida</div>  
          </div>
          <div class="mb-3">
          <label class="form-label" for="text">Porcentaje de IVA</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <select type="text" name="porcentaje_iva" id="porcentaje_iva" class="form-control" autocorrect="off" spellcheck="false" required>
          <option value="">Selecciona el porcentaje de IVA</option>
          <option value="5">5%</option>
          <option value="10">10%</option>
          </select>
          <div class="invalid-feedback">Ingrese una opción válida</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include_once(ROOT_PATH . 'footer.php') ?>