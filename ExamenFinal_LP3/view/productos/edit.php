<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup-erros', 1);
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
require_once(CONTROLLER_PATH . 'productosController.php');
$object = new productosController();
$idItem = $_GET['id'];
$item = $object->search($idItem);
$categorias = $object->comboCategoria();
$marcas = $object->comboMarca();
?>
<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header('location: /ExamenFinal_LP3/view/login/login.php');
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
$usuario = null;
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
}

$nombre = null;
if (isset($_SESSION["nombre"])) {
    $nombre = $_SESSION["nombre"];
}

$apellido = null;
if (isset($_SESSION["apellido"])) {
    $apellido = $_SESSION["apellido"];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>ExamenFinal_LP3</title>

    <link href="/ExamenFinal_LP3/css/select2.min.css" rel="stylesheet">

    <!-- Fuentes -->
    <link href="/ExamenFinal_LP3/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- estilos css -->
    <link href="/ExamenFinal_LP3/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/ExamenFinal_LP3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Estilos personalizados para Select2 -->
    <style>
        .select2-container {
            width: 100% !important;
            padding: 0;
        }

        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        /* Cambiar el color del borde cuando el foco está en el elemento */
        .select2-container .select2-selection--single:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once(VIEW_PATH . 'navbar/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar Navbar -->
                <?php
                require_once(VIEW_PATH . 'navbar/topbar.php');
                ?>
                <!-- End of Topbar -->
                <div class="container">
                    <div class="mb-3">
                        <h2>Editando registro</h2>
                    </div>
                    <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="id_item" class="form-label">ID</label>
                            <span class="col-md-1 col-md-offset-2 text-center"><i
                                    class="fa fa-pencil-square-o bigicon"></i></span>
                            <input value="<?= $item['id_item'] ?>" type="text" class="form-control" id="id_item"
                                name="id_item" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="codigobarras" class="form-label">Código de Barras</label>
                            <span class="col-md-1 col-md-offset-2 text-center"><i
                                    class="fa fa-pencil-square-o bigicon"></i></span>
                            <input value="<?= $item['codigobarras'] ?>" type="text" class="form-control"
                                id="codigobarras" name="codigobarras" autofocus>
                            <div class="invalid-feedback">Ingrese datos válidos</div>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_item" class="form-label">Nombre</label>
                            <input value="<?= $item['nombre_item'] ?>" type="text" class="form-control" id="nombre_item"
                                name="nombre_item" required>
                            <div class="invalid-feedback">Ingrese un nombre válido</div>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea rows=3 type="text" class="form-control" id="descripcion"
                                name="descripcion"><?= $item['descripcion'] ?></textarea>
                            <div class="invalid-feedback">Ingrese un nombre válido</div>
                        </div>
                        <div class="mb-3">
                            <label for="precio_costo" class="form-label">Precio de Costo</label>
                            <input value="<?= $item['precio_costo'] ?>" type="number" class="form-control"
                                id="precio_costo" name="precio_costo" required>
                            <div class="invalid-feedback">Ingrese datos válidos</div>
                        </div>
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio de Venta</label>
                            <input value="<?= $item['precio_venta'] ?>" type="number" class="form-control"
                                id="precio_venta" name="precio_venta" required>
                            <div class="invalid-feedback">Ingrese un nombre válido</div>
                        </div>
                        <div class="mb-3">
                            <label for="id_categoria" class="form-label">Categoría</label>
                            <select class="js-example-basic-single" name="id_categoria" id="id_categoria" required>
                                <option selected disabled value="">No especificado</option>
                                <?php foreach ($categorias as $categoria) {
                                    if ($item['id_categoria'] == $categoria['id_categoria']) { ?>
                                        <option selected="selected" value="<?= $categoria['id_categoria'] ?>">
                                            <?= $categoria['descripcion_categoria'] ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?= $categoria['id_categoria'] ?>">
                                            <?= $categoria['descripcion_categoria'] ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                            <div class="invalid-feedback">seleccione un elemento válido!</div>
                        </div>
                        <div class="mb-3">
                            <label for="id_marca" class="form-label">Marca</label>
                            <select class="form-control js-example-basic-single" name="id_marca" id="id_marca" required>
                                <option selected disabled value="">No especificado</option>
                                <?php foreach ($marcas as $marca) {
                                    if ($item['id_marca'] == $marca['id_marca']) { ?>
                                        <option selected="selected" value="<?= $marca['id_marca'] ?>">
                                            <?= $marca['nombre_marca'] ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?= $marca['id_marca'] ?>">
                                            <?= $marca['nombre_marca'] ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                            <div class="invalid-feedback">seleccione un elemento válido!</div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-danger" onclick="window.history.back();">Cancelar</button>
                        <br>
                        <br>
                        <br>
                    </form>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="/ExamenFinal_LP3/vendor/jquery/jquery.min.js"></script>
                <script src="/ExamenFinal_LP3/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="/ExamenFinal_LP3/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="/ExamenFinal_LP3/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="/ExamenFinal_LP3/vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="/ExamenFinal_LP3/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="/ExamenFinal_LP3/js/demo/datatables-demo.js"></script>

                <script src="/ExamenFinal_LP3/js/select2.full.min.js"></script>

                <script>
                    // Inicializar Select2 en el selector correcto
                    $(document).ready(function () {
                        $('select').select2();
                    });
                </script>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Hector Segovia & Jesus Galeano 2023</span>
                        </div>
                    </div>
                </footer>


</body>
<?php include_once(ROOT_PATH . 'footer.php') ?>

</html>