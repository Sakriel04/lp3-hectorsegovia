<?php
    require_once('estudianteModel.php');
    $object = new estudianteModel();
    $rows = $object->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <div class="mb-3"></div>
    <h2>Listado de estudiantes</h2>
    </div>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) {?>
                <tr>
                    <th><?=$row['idEstudiante']?></th>
                    <th><?=$row['nombre']?></th>
                    <th><?=$row['apellido']?></th>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
<script src="../../js/bootstrap.bundle.min.js"></script>
</html>