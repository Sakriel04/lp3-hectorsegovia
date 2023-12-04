<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3//view/usuarios/index.php');
require_once(CONTROLLER_PATH . 'usuarioController.php');
$object = new usuarioController();
$rows = $object->select();
$id_user = $row['id_user'];
$usuario = $object->searchId($id_user);
$vehiculos = $object->comboVehiculo();
$roles = $object->comboRol();
?>
<div class="modal fade" id="editModal<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="editModal"
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
            <label for="id_user" class="form-label">ID</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <div class="invalid-feedback">Ingrese un nombre válido</div><input value="<?= $row['id_user'] ?>"
              type="text" class="form-control" id="id_user" name="id_user" readonly>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?= $row['nombre'] ?>" type="text" class="form-control" id="nombre" name="nombre" autofocus
              required>
            <div class="invalid-feedback">Ingrese un nombre válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Apellido</label>
            <input value="<?= $row['apellido'] ?>" type="text" name="apellido" id="apellido" class="form-control"
              autocorrect="off" spellcheck="false" required />
            <div class="invalid-feedback">Ingrese un apellido válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Alias</label>
            <input value="<?= $row['alias'] ?>" type="text" name="alias" id="alias" class="form-control"
              autocorrect="off" spellcheck="false" required />
            <div class="invalid-feedback">Ingrese un alias válido</div>
          </div>
          <div class="mb-3">
            <label for="id_vehiculo" class="form-label">Código vehiculo</label>
            <select class="form-control" name="id_vehiculo" id="id_vehiculo" required>
              <option selected disabled value="">No especificado</option>
              <?php foreach ($vehiculos as $vehiculo) {
                if ($usuario['id_vehiculo'] == $vehiculo['id_vehiculo']) { ?>
                  <option selected="selected" value="<?= $vehiculo['id_vehiculo'] ?>">
                    <?= $vehiculo['descripcion_vehiculo'] ?>
                  </option>
                <?php } else { ?>
                  <option value="<?= $vehiculo['id_vehiculo'] ?>">
                    <?= $vehiculo['descripcion_vehiculo'] ?>
                  </option>
                <?php }
              } ?>
            </select>
            <div class="invalid-feedback">seleccione un elemento válido!</div>
            <label for="id_rol" class="form-label">Código rol</label>
            <select class="form-control" name="id_rol" id="id_rol" required>
              <option selected disabled value="">No especificado</option>
              <?php foreach ($roles as $rol) {
                if ($usuario['id_rol'] == $rol['id_rol']) { ?>
                  <option selected="selected" value="<?= $rol['id_rol'] ?>">
                    <?= $rol['nombre_rol'] ?>
                  </option>
                <?php } else { ?>
                  <option value="<?= $rol['id_rol'] ?>">
                    <?= $rol['nombre_rol'] ?>
                  </option>
                <?php }
              } ?>
            </select>
            <div class="invalid-feedback">seleccione un elemento válido!</div>
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