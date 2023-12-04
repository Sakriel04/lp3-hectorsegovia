<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3//view/vehiculos/index.php');
require_once(CONTROLLER_PATH . 'vehiculoController.php');
$object = new vehiculoController();
$rows = $object->select();
$id_vehiculo = $object->last();
$ultimo = ("$id_vehiculo[0]") + 1;
?>


<!-- Modal -->
<form action="store.php">
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo vehiculo</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label class="form-label" for="text">ID</label>
          <input type="text" value="<?= $ultimo ?>" name="id_vehiculo" id="id_vehiculo" class="form-control w-25"
            readonly />
          <label class="form-label" for="text">Descripcion del vehiculo</label>
          <input type="text" name="desc_vehiculo" id="desc_vehiculo" class="form-control" autocorrect="off"
            spellcheck="false" />
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