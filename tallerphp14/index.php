<?php
    include_once("php/validate.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DemoTaller14</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container fluid">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <!-- formulario de registro -->
                <div class="registration-form">
                    <h3 class="text-center">Creando nueva cuenta</h3>
                    <p class="text-success text-center"><?=$valid?></p>
                    <form id="formCuenta" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="<?=$setNombre?>">
                            <p class="err-msg"><?php if ($nombreErr!=1) { echo $nombreErr; }?></p>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido" value="<?=$setApellido?>">
                            <p class="err-msg"><?php if ($apellidoErr!=1) { echo $apellidoErr; }?></p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="<?=$setEmail?>">
                            <p class="err-msg"><?php if ($emailErr!=1) { echo $emailErr; }?></p>
                        </div>
                        <button type="submit" class="btn btn-primary" name="registrar" value="Registrar">
                            Enviar registro
                        </button>
                    </form>
                </div>
                <?php
                    if (strlen($setNombre)>0 && strlen($setApellido)>0 && strlen($setEmail)>0) {
                        include ('php/activate.php');
                    }
                ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
<script src="js/bootstrap.bundle.mins.js"></script>
</html>