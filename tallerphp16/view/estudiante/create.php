<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/tallerphp16/routes.php');
    require_once(CONTROLLER_PATH.'estudianteController.php');
    $object = new estudianteController();
    $cursos = $object->combolist();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PHP</title>
    <?php
        require_once(ROOT_PATH.'header.php');
    ?> 
</head>
<body>
    <?php
        require_once(VIEW_PATH.'navbar/navbar.php')
    ?> 

    <div class = "container">
        <div class = "mb-3">
            <h2>Agregando nuevo registro</h2>
        </div>

    <div class="container">
    <form id="formPersona" action="store.php" method="post" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nombre" class="form-label"><br>Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" autofocus required>
            <div class="invalid-feedback">Ingrese un nombre válido</div>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
            <div class="invalid-feedback">Ingrese un apellido válido</div>
        </div>
        <div class="mb-3">
            <label for="idCurso" class="form-label">Código Curso</label>
            <select class="form-control" name="idCurso" id="idCurso" required>
                <option selected disabled value="">No especificado</option>
                <?php foreach ($cursos as $curso){ ?>
                    <option value="<?=$curso['idCurso']?>"><?=$curso['nombre']?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
    </form>
    </div>
    </div>
</body>
    <?php
        require_once(ROOT_PATH.'footer.php');
    ?> 
</html>