<style>

    .app-sidebar {
        background-color: #2ec4b6 !important;
    }

    .sidebar-brand {
        background-color: #e63946 !important;
    }

    .brand-text {
        color: #ffffff !important;
        font-weight: bold;
    }

    .sidebar-menu .nav-link {
        color: #ffffff !important;
    }

    .sidebar-menu .nav-link:hover {
        background-color: #ffbe0b !important;
        color: #000 !important;
    }

    .sidebar-menu .nav-icon {
        color: #f30e0e !important;
    }

</style>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="../home/index.php" class="brand-link">
            <!--begin::Brand Image-->
            <img src="../../img/papalote.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Menú</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                        <li class="nav-item">
                    <a href="../../modulos/home" class="nav-link ">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Inicio / Papalote</p>
                    </a>
                </li>

                <?php if ($_SESSION['rol'] == 'Administrador'): ?>
                    <li class="nav-item">
                        <a href="../../modulos/categorias" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Categorias</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../modulos/roles" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../modulos/usuarios" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (in_array('empresa', $_SESSION['accesos'])): ?>
                    <li class="nav-item">
                        <a href="../../modulos/empresa" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Empresa</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (in_array('tienda', $_SESSION['accesos'])): ?>
                    <li class="nav-item">
                        <a href="../../modulos/tienda" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Tienda</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (in_array('sucursales', $_SESSION['accesos'])): ?>
                    <li class="nav-item">
                        <a href="../../modulos/sucursales" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Sucursales</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (in_array('juguetes', $_SESSION['accesos'])): ?>
                    <li class="nav-item">
                        <a href="../../modulos/jugueteria" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Juguetes</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>