<?php
if(!isset($_SESSION)){
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/view/usuarios/create.php');
require_once(CONTROLLER_PATH . 'usuarioController.php');
$object = new usuarioController();
$rows = $object->select();
?>

<?php

if (!isset($_SESSION["usuario"])) {
    header('location: ./view/login/login.php');
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
                    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
                    <p class="mb-4">Lista de usuarios</p>
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
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">APELLIDO</th>
                                            <th scope="col">ALIAS</th>
                                            <th scope="col">VEHICULO</th>
                                            <th scope="col">ROL</th>
                                            <th scope="col">OPERACIONES</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">APELLIDO</th>
                                            <th scope="col">ALIAS</th>
                                            <th scope="col">VEHICULO</th>
                                            <th scope="col">ROL</th>
                                            <th scope="col">OPERACIONES</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ((array) $rows as $row) { ?>
                                            <tr>
                                                <td>
                                                    <?= $row['id_user'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['nombre'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['apellido'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['alias'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['descripcion_vehiculo'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['nombre_rol'] ?>
                                                </td>
                                                <td>

                                                    <!-- botones para edit y del, edit es otra pantalla, hacer que sea modal -->
                                                    <a class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#editModal<?= $row['id_user'] ?>">Editar</a>
                                                    <a class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#iddel<?= $row['id_user'] ?>">Eliminar</a>

                                                    <!-- modal del, edit y agrear -->
                                                    <?php
                                                    include('viewModal.php');
                                                    include('deleteModal.php');
                                                    include('edit.php');
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
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


</body>
<?php include_once(ROOT_PATH . 'footer.php') ?>

</html>