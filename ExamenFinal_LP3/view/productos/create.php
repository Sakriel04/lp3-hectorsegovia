<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/view/productos/index.php');
require_once(CONTROLLER_PATH . 'productosController.php');
$object = new productosController();
$rows = $object->select();
$iditem = $object->last();
if (!empty($rows)) {
  $ultimo = ("$iditem[0]") + 1;
} else {
  $ultimo = 1;
}
$categorias = $object->comboCategoria();
$marcas = $object->comboMarca();
?>


<!-- Modal -->

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="text">ID</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" value="<?= $ultimo ?>" name="id_item" id="id_item" class="form-control w-25" readonly />
            <div class="invalid-feedback">Ingrese un código válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Código de Barras</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="number" name="codigobarras" id="codigobarras" class="form-control" autocorrect="off"
              spellcheck="false" />
            <div class="invalid-feedback">Ingrese un código válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Nombre del Producto</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" name="nombre_item" id="nombre_item" class="form-control" autocorrect="off"
              spellcheck="false" required />
            <div class="invalid-feedback">Ingrese un nombre válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Descripción</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <textarea rows=3 type="text" name="descripcion" id="descripcion" class="form-control" autocorrect="off"
              spellcheck="false" /></textarea>
            <div class="invalid-feedback">Ingrese datos válidos</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Precio de Costo</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="number" name="precio_costo" id="precio_costo" class="form-control" autocorrect="off"
              spellcheck="false" required min="0" />
            <div class="invalid-feedback">Ingrese un precio válido</div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="text">Precio de Venta</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="number" name="precio_venta" id="precio_venta" class="form-control" autocorrect="off"
              spellcheck="false" required min="0" />
            <div class="invalid-feedback">Ingrese un precio válido</div>
          </div>
          <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <select class="form-control js-example-basic-single" name="id_categoria" id="id_categoria" required>
              <option selected disabled value="">No especificado</option>
              <?php foreach ($categorias as $categoria) { ?>
                <option value="<?= $categoria['id_categoria'] ?>">
                  <?= $categoria['descripcion_categoria'] ?>
                </option>
              <?php } ?>
            </select>
            <div class="invalid-feedback">Seleccione un elemento válido</div>
          </div>
          <div class="mb-3">
            <label for="id_marca" class="form-label">Marca</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <select class="form-control js-example-basic-single" name="id_marca" id="id_marca" required>
              <option selected disabled value="">No especificado</option>
              <?php foreach ($marcas as $marca) { ?>
                <option value="<?= $marca['id_marca'] ?>">
                  <?= $marca['nombre_marca'] ?>
                </option>
              <?php } ?>
            </select>
            <div class="invalid-feedback">Seleccione un elemento válido!</div>
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
