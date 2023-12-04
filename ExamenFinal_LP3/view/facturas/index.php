<?php
if (!isset($_SESSION)) {
  session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once($_SERVER['DOCUMENT_ROOT'] . '/ExamenFinal_LP3/routes.php');
require_once(CONTROLLER_PATH . 'facturasController.php');
$obj = new facturasController();
$rows = $obj->select();
?>


<?php
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

<head>

  <title>Factura Ventas</title>

  <!-- Custom fonts for this template -->
  <link href="/ExamenFinal_LP3/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/ExamenFinal_LP3/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="/ExamenFinal_LP3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
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

        <div class="container-xl">
          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Facturas Ventas</h1>

            <div class="mb-3">
              <a href="/ExamenFinal_LP3/view/facturas/create.php" class="btn btn-primary">Agregar factura</a>
            </div>

            <div class="card shadow mb-4">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">N° Factura</th>
                    <th scope="col">Fecha de emision</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Encargado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($rows): ?>
                    <?php foreach ($rows as $row): ?>
                      <tr>
                        <th>
                          <?= $row['nro_factura'] ?>
                        </th>
                        <th>
                          <?= $row['fecha_factura'] ?>
                        </th>
                        <th>
                          <?= $row['cliente'] ?>
                        </th>
                        <th>
                          <?= $row['usuario'] ?>
                        </th>
                        <th>
                          <a href="show.php?id=<?= $row[0] ?>" class="btn btn-primary">Ver</a>
                          <a href="edit.php?id=<?= $row[0] ?>" class="btn btn-success">Modificar</a>
                          <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?= $row[0] ?>">Eliminar</a>

                          <div class="modal fade" id="id<?= $row[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Una vez eliminado, no se podrá recuperar el registro.
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                  <a href="delete.php?id=<?= $row[0] ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </th>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="3" class="text-center">No hay registros actualmente</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Hector Segovia & Jesus Galeano 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <?php include_once(ROOT_PATH . 'footer.php') ?>
</body>