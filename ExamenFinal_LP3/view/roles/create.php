<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/view/roles/index.php');
require_once(CONTROLLER_PATH . 'rolController.php');
$object = new rolController();
$rows = $object->select();
$id_rol = $object->last();
if (!empty($rows)) {
  $ultimo = ("$id_rol[0]") + 1;
} else {
  $ultimo = 1;
}
?>


<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo rol</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="text">ID</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" value="<?= $ultimo ?>" name="id_rol" id="id_rol" class="form-control w-25" readonly />
            <div class="invalid-feedback">Ingrese un nombre válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Nombre del rol</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" name="nombre_rol" id="nombre_rol" class="form-control" autocorrect="off"
              spellcheck="false" required/>
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