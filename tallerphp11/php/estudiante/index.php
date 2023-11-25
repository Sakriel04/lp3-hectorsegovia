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
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <?php
        require_once('../navbar.php')
    ?>
    <section class = "intro">
    <div class="container">
        <br><p align="right"><a class="btn btn-info" href="/tallerphp11/php/estudiante/create.php"><FONT COLOR="white"><b>Agregar registro</FONT></a>
        <div class="mb-3">
            <h2>Listado de Estudiantes</h2>
        </div>
        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position:relative; heigth=700px;">
        <table class="table table-striped mb-0">
            <thead style="background-color: #002d72;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">OPERACIONES</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <th><?=$row['idEstudiante']?></th>
                    <th><?=$row['nombre']?></th>
                    <th><?=$row['apellido']?></th>
                    <td>
                        <a class = "btn btn-info" data-bs-toggle="modal" data-bs-target="#idver<?=$row['idEstudiante']?>">Ver</a>
                        <a href = "edit.php?id=<?= $row['idEstudiante']?>" class = "btn btn-warning">Editar</a>
                        <a class = "btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?=$row['idEstudiante']?>">Eliminar</a>

                        <!-- modal para ver y del-->
                        <?php 
                            include ('viewModal.php');
                            include ('deleteModal.php');
                        ?>
                        
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
    </section>
</body>
<script src="../../js/bootstrap.bundle.min.js"></script>
</html>