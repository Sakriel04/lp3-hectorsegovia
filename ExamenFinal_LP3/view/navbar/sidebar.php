<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Marca -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/ExamenFinal_LP3/main.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ExamenLP3</div>
    </a>

    <!-- Divisor -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Inicio -->
    <li class="nav-item active">
        <a class="nav-link" href="/ExamenFinal_LP3/main.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interfaz
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/ExamenFinal_LP3/view/usuarios/">Usuarios</a>
                <h6 class="collapse-header">Referenciales:</h6>
                <a class="collapse-item" href="/ExamenFinal_LP3/view/roles/">Roles</a>
                <a class="collapse-item" href="/ExamenFinal_LP3/view/vehiculos/">Vehículos</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-box"></i>
            <span>
                Productos
            </span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Productos:</h6>
                <a class="collapse-item" href="/ExamenFinal_LP3/view/productos/">Lista de Productos</a>
                <h6 class="collapse-header">Referenciales:</h6>
                <a class="collapse-item" href="/ExamenFinal_LP3/view/categoria_items/index.php">Categorias</a>
                <a class="collapse-item" href="/ExamenFinal_LP3/view/item_marcas/index.php">Marcas</a>
            </div>
        </div>
        <a class="nav-link" href="/ExamenFinal_LP3/view/clientes/">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span></a>
        <a class="nav-link" href="/ExamenFinal_LP3/view/proveedores/">
            <i class="fas fa-fw fa-dolly"></i>
            <span>Proveedores</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <br>
    <br>
    <br>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>