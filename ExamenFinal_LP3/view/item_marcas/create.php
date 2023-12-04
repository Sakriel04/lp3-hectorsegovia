<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3//view/item_marcas/index.php');
require_once(CONTROLLER_PATH . 'marcasController.php');
$object = new marcasController();
$rows = $object->select();
$id_marca = $object->last();
if (!empty($rows)) {
  $ultimo = ("$id_marca[0]") + 1;
} else {
  $ultimo = 1;
}
?>


<!-- Modal -->

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Marca</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="text">ID</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" value="<?= $ultimo ?>" name="id_marca" id="id_marca" class="form-control w-25"
              readonly />
            <div class="invalid-feedback">Ingrese una descripción válida</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Nombre de la Marca</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" name="nombre_marca" id="nombre_marca" class="form-control" autocorrect="off"
              spellcheck="false" required />
            <div class="invalid-feedback">Ingrese un nombre válido</div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include_once(ROOT_PATH . 'footer.php') ?>