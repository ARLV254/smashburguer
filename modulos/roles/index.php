<?php
require_once('../../tools/security.php');
    include_once "../../tools/header.php";
    include_once "../../tools/navbar.php";
include_once "../../tools/sidebar.php";
$page_title="Roles" ?>

<!--end::Sidebar-->
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Roles </h3>
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
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title"><?php 
                            include_once('rolesModal.php'); ?></h3>
                        </div>
                    </div>
                    <?php include_once('rolesTabla.php'); ?>
                    <!-- /.card -->
                </div>
            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
<!--begin::Footer-->

<?php
include_once "../../tools/footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="rolesFunciones.js"></script>