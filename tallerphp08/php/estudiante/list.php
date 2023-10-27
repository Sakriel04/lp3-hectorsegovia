<?php
    require_once('estudianteModel.php');
    $object = new estudianteModel();
    $rows = $object->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
    <div class="mb-3">
        <h2>Listado de Estudiantes</h2>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>OPERACIONES</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row => $value) { ?>
                <tr>
                    <th><?=$row['idEstudiante']?></th>
                    <th><?=$row['nombre']?></th>
                    <th><?=$row['apellido']?></th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
<script src="../../js/bootstrap.bundle.min.js"></script>
</html>