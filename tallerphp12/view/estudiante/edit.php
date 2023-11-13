<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/tallerphp12/routes.php');
    require_once(MODEL_PATH.'estudianteModel.php');
    $object = new estudianteModel();
    $idEstudiante = $_GET['id'];
    $estudiante = $object->buscar($idEstudiante);
    $cursos = $object->cargarDesplegable();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PHP</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
    <?php
        require_once('../navbar.php')
    ?> 

    <div class = "container"></div>
        <div class = "mb-3">
            <h2>Editando registro</h2>
        </div>

    <div class="container">
    <form id="formPersona" action="update.php" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID Estudiante</label>
            <input value="<?=$estudiante[0]?>" type="text" class="form-control" id="id" name="id" readonly>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input value="<?=$estudiante[1]?>" type="text" class="form-control" id="nombre" name="nombre" autofocus required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input value="<?=$estudiante[2]?>" type="text" class="form-control" id="apellido" name="apellido">
        </div>
        <div class="mb-3">
            <label for="idCurso" class="form-label">Código Curso</label>
            <select class="form-control" name="idCurso" id="idCurso">
                <option value="0">No especificado</option>
                <?php foreach($cursos as $curso){
                    if ($estudiante[3]==$curso['idCurso']) { ?>
                        <option selected="selected" value="<?=$curso['idCurso']?>"><?=$curso['nombre']?></option>
                    <?php } else {?>
                        <option value="<?=$curso['idCurso']?>"><?=$curso['nombre']?></option>
                    <?php } 
                        }?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    </div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
</html>