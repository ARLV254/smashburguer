<?php
require_once('../../tools/security.php');

$page_title="Usuario del sistema";

include_once "../../tools/header.php";
include_once "../../tools/navbar.php";
include_once "../../tools/sidebar.php";
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Ventas en linea - <?php echo $page_title ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title"><?php include_once('usuariosModal.php'); ?></h3>
                        </div>
                    </div>
                    <?php include_once('usuariosTabla.php'); ?>
                    </div>
            </div>
            </div>
    </div>
    </main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="usuariosFunciones.js"></script>
<?php
include_once "../../tools/footer.php"; ?>