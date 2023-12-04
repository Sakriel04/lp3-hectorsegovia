<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header('location: /ExamenFinal_LP3/view/login/login.php');
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup-errors', 1);
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/view/productos/create.php');
require_once(CONTROLLER_PATH . 'productosController.php');
$object = new productosController();
$rows = $object->select();
?>

<?php
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>ExamenFinal_LP3</title>

    <!-- Fuentes -->
    <link href="/ExamenFinal_LP3/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- estilos css -->
    <link href="/ExamenFinal_LP3/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/ExamenFinal_LP3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="/ExamenFinal_LP3/css/select2.min.css" rel="stylesheet">

    <?php include_once(ROOT_PATH . 'footer.php') ?>

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

    <!-- Wrapper de la pagina -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <?php
        require_once(VIEW_PATH . 'navbar/sidebar.php');
        ?>
        <!--  Barra lateral -->

        <!--Wrapper del contenido -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Principal -->
            <div id="content">

                <!-- Topbar Navbar -->
                <?php
                require_once(VIEW_PATH . 'navbar/topbar.php');
                ?>
                <!-- Fin Topbar -->

                <!-- Inicio del contenido -->
                <div class="container-fluid">

                    <!-- Encabezado de la pagina -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Productos</h1>
                        <a href="pdf/productos.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-solid fa-print fa-sm text-white-50"></i> Imprimir</a>
                    </div>
                    <p class="mb-4">Lista de productos</p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- Boton modal agregar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                Agregar
                            </button>
                            <!-- Boton -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    if (empty($rows)) {
                                        ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">PRODUCTO</th>
                                                <th scope="col">PRECIO</th>
                                                <th scope="col">CATEGORIA</th>
                                                <th scope="col">MARCA</th>
                                                <th scope="col">OPERACIONES</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">PRODUCTO</th>
                                                <th scope="col">PRECIO</th>
                                                <th scope="col">CATEGORIA</th>
                                                <th scope="col">MARCA</th>
                                                <th scope="col">OPERACIONES</th>
                                            </tr>
                                        </tfoot>
                                    <?php } else { ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">PRODUCTO</th>
                                                <th scope="col">PRECIO</th>
                                                <th scope="col">CATEGORIA</th>
                                                <th scope="col">MARCA</th>
                                                <th scope="col">OPERACIONES</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">PRODUCTO</th>
                                                <th scope="col">PRECIO</th>
                                                <th scope="col">CATEGORIA</th>
                                                <th scope="col">MARCA</th>
                                                <th scope="col">OPERACIONES</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ((array) $rows as $row) { ?>
                                                <tr>
                                                    <td>
                                                        <?= $row['id_item'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['nombre_item'] ?>
                                                    </td>
                                                    <td>
                                                        ₲
                                                        <?= $row['precio_venta'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['descripcion_categoria'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['nombre_marca'] ?>
                                                    </td>
                                                    <td>
                                                        <!-- botones para edit y del, edit es otra pantalla, hacer que sea modal -->
                                                        <a class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#idver<?= $row['id_item'] ?>">Ver</a>
                                                        <a href="edit.php?id=<?= $row['id_item'] ?>"
                                                            class="btn btn-info">Editar</a>
                                                        <a class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#iddel<?= $row['id_item'] ?>">Eliminar</a>

                                                        <!-- modal del, edit y agrear -->
                                                        <?php
                                                        include('viewModal.php');
                                                        include('deleteModal.php');
                                                        include('create.php');
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Fin contenido principal -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Hector Segovia & Jesus Galeano 2023</span>
                    </div>
                </div>
            </footer>
            <!-- Fin Footer -->

        </div>
        <!-- Fin Wrapper -->

    </div>
    <!-- Fin Wrapper de la pagina -->

    <!-- Boton para volver arriba -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Haga clic en "Salir" si desea cerrar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="/ExamenFinal_LP3/view/login/logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- El contenido del modal se cargará aquí automáticamente -->
            </div>
        </div>
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

    <script src="/ExamenFinal_LP3/js/notify.js"></script>
    <script src="/ExamenFinal_LP3/js/notify.min.js"></script>

</body>

<?php
if (isset($_GET['eliminar'])) {
    ?>
    <script>
        $.notify('Error al eliminar el registro. Verifique que no esté siendo utilizado.', 'error');
    </script>;
    <?php
}

if (isset($_GET['pmayor'])) {
    ?>
    <script>
        $.notify('Error. El precio de costo no puede ser mayor al precio de venta', 'error');
    </script>;
    <?php
}

?>

<script>
    // Inicializar Select2 en el selector correcto
    $(document).ready(function () {
        $('#id_categoria').select2({});
        $('#id_marca').select2();
    });

</script>



</html>