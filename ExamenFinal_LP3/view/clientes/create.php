<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/view/clientes/index.php');
require_once(CONTROLLER_PATH . 'clienteController.php');
$object = new clienteController();
$rows = $object->select();
$id_clientes = $object->last();

if (!empty($rows)) {
  $ultimo = ("$id_clientes[0]") + 1;
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo cliente</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label class="form-label" for="text">ID</label>
          <input type="text" value="<?= $ultimo ?>" name="id_clientes" id="id_clientes" class="form-control w-25" readonly />
          <div class="mb-3">
          <label class="form-label" for="text">Nombre</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" autocorrect="off" spellcheck="false" autofocus required/>
          <div class="invalid-feedback">Ingrese una nombre válido</div>    
          </div>
          <div class="mb-3">
          <label class="form-label" for="text">Apellido</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <input type="text" name="apellido_cliente" id="apellido_cliente" class="form-control" autocorrect="off" spellcheck="false" required/>
          <div class="invalid-feedback">Ingrese un apellido válido</div>    
          </div>
          <div class="mb-3">
          <label class="form-label" for="text">Nº CI o RUC</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <input type="text" name="ruc_ci" id="ruc_ci" class="form-control" autocorrect="off" spellcheck="false" required pattern="[0-9]{6,}"/>        
          <div class="invalid-feedback">Ingrese un CI o RUC válido</div>    
          </div>
          <div class="mb-3">
          <label class="form-label" for="text">Teléfono</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <input type="text" name="tel" id="tel" class="form-control" autocorrect="off" spellcheck="false" />
          <div class="invalid-feedback">Ingrese un teléfono válido</div>    
          </div>
          <div class="mb-3">
          <label class="form-label" for="text">Dirección</label>
          <input type="text" name="direccion" id="direccion" class="form-control" autocorrect="off" spellcheck="false" />
          <div class="invalid-feedback">Ingrese una dirección válida</div>    
          </div>
          <div class="mb-3">
          <label class="form-label" for="text">Otros Datos</label>
          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
          <textarea rows="3" type="text" name="otros_datos" id="otros_datos" class="form-control" autocorrect="off" spellcheck="false" /></textarea>
          <div class="invalid-feedback">Ingrese una descripción válida</div>    
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