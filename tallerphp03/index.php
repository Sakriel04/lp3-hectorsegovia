<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JQUERY</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script> src="js/bootstrap.bundle.min.js"</script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <div class = container-md>
        <h1>Factorial de un número!</h1>
        <div class="formFactorial">
            <div class="input-group">
                <div class="input-group-text">#</div>
                <input class="form-control" type="number" name="numero" id="numero" placeholer="número entero menor a 10">
                <button class="btn btn-primary" id="calcular">Calcular factorial</button>
            </div>
        </div>
        <div id="resultado"></div>
        <div class="gifCarga">
            <img src="images/loader.gif" alt="animacion" id="cargando">
        </div>
    </div>
</body>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/funciones.js"></script>
    <script>
        jQuery("#resultado").hide();
        jQuery("#cargando").hide();
    </script>
</html>