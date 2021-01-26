<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
        <img src="vistas/img/plantilla/icono-blanco.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Control Inventario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php

                if($_SESSION["foto"] != ""){

                    echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2" alt="User Image">';

                }else{


                    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle elevation-2" alt="User Image">';

                }


                ?>




            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="usuarios" class="nav-link">
                        <i class="fas fa-user-friends"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categorias" class="nav-link">
                        <i class="fas fa-th-list"></i>
                        <p>
                            Categorias o Sub Grupos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="productos" class="nav-link">
                        <i class="fab fa-product-hunt"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="clientes" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-dolly-flatbed"></i>
                        <p>
                            Movimiento
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="movimientos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar movimientos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="crear-movimiento" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nuevo movimiento</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reportes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte movimiento</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>