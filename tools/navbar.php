    <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->

          <!--AQUI INCIA LOS BOTNOES DE LA IZQUIERDA-->
          <ul class="navbar-nav">

            <!--las 3 rayitas del sidebar-->
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>

            <!--las palabras que salen arriba-->
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
          </ul>
          
          <!--LADO DERECHO DE LA NAVBAR-->
          <ul class="navbar-nav ms-auto">

          <!--Boton del carrito-->
            <li class="nav-item">
              <a class="nav-link" href="../carrito/index.php">
                <i class="bi bi-cart-fill"></i>
                  <span id="cantidadCarrito" class="badge badge-danger navbar-badge">0</span>
              </a>
            </li>

            <!--Campanita de notificaciones-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header">2 Notificaciones</span>
                <div class="dropdown-divider"></div>

                <!--Mensajes de notificaciones-->
                <a href="#" class="dropdown-item">
                  <i class="bi bi-envelope me-2"></i>Tu bicicleta llega mañana
                  <span class="float-end text-secondary fs-7">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-envelope me-2"></i> Descuento en balones
                  <span class="float-end text-secondary fs-7">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <ii class="bi bi-envelope me-2"></i> Nuevo juguete en stock
                  <span class="float-end text-secondary fs-7">2 days</span>
                </a>
            </li>

            <!--Boton para expandir la pantalla-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>

            <!--Menu del perfil del usuario-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <!--imagen del usuario- vista sin abrir las opciones-->
                <img
                  src="../../img/esqueleto.png"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <!--nombre del usuario visto sin abrir la opciones-->
                <span class="d-none d-md-inline">
                <?php echo $_SESSION['nombre']; ?>
                </span>
              </a>

              <!--Opciones que salen al darle click al perfil del usuario-->
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-header text-bg-primary">
                  <!--imagen del usuario- vista al abrir las opciones-->
                  <img
                    src="../../img/esqueleto.png"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />

                  <!--nombre del usuario visto al abrir las opciones-->
                  <p>
                    <?php echo $_SESSION['nombre']; ?>
                    <small>Miembro desde Septiembre 2024
                    </small>
                  </p>
                </li>
                <li class="user-footer">
                  <!--Boton para cerrar sesión-->
                  <a href="/mi_proyecto_papalote/tools/logout.php" class="btn btn-default btn-flat float-end">
                    Cerrar sesión
                  </a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
        </nav>