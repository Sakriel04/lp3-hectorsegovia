<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3//view/usuarios/index.php');
require_once(CONTROLLER_PATH . 'usuarioController.php');
$object = new usuarioController();
$rows = $object->select();
$id_user = $object->last();
if (!empty($rows)) {
  $ultimo = ("$id_user[0]") + 1;
} else {
  $ultimo = 1;
}
$vehiculos = $object->comboVehiculo();
$roles = $object->comboRol();
?>


<!-- Modal -->
<form form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo usuario</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label class="form-label" for="text">ID</label>
          <input type="text" value="<?= $ultimo ?>" name="id_user" id="id_user" class="form-control w-25" readonly />
          <div class="mb-3">
            <label class="form-label" for="text">Nombre</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" name="nombre" id="nombre" class="form-control" autocorrect="off" spellcheck="false" required/>
            <div class="invalid-feedback">Ingrese un nombre válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Apellido</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" name="apellido" id="apellido" class="form-control" autocorrect="off"
              spellcheck="false" required/>
              <div class="invalid-feedback">Ingrese un apellido válido</div>
            </div>
          <div class="mb-3">
            <label class="form-label" for="text">Alias</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" name="alias" id="alias" class="form-control" autocorrect="off" spellcheck="false" required/>
            <div class="invalid-feedback">Ingrese un alias válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Contraseña</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="password" name="password" id="password" class="form-control" autocorrect="off"
              spellcheck="false" required/>
              <div class="invalid-feedback">Ingrese una contraseña válida</div>
            </div>
          <div class="mb-3">
            <label for="id_vehiculo" class="form-label">Vehículo</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <select class="form-control" name="id_vehiculo" id="id_vehiculo" required>
              <option selected disabled value="">No especificado</option>
              <?php foreach ($vehiculos as $vehiculo) { ?>
                <option value="<?= $vehiculo['id_vehiculo'] ?>">
                  <?= $vehiculo['descripcion_vehiculo'] ?>
                </option>
              <?php } ?>
            </select>
            <div class="invalid-feedback">seleccione un elemento válido!</div>
          </div>
          <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <select class="form-control" name="id_rol" id="id_rol" required>
              <option selected disabled value="">No especificado</option>
              <?php foreach ($roles as $rol) { ?>
                <option value="<?= $rol['id_rol'] ?>">
                  <?= $rol['nombre_rol'] ?>
                </option>
              <?php } ?>
            </select>
            <div class="invalid-feedback">seleccione un elemento válido!</div>
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