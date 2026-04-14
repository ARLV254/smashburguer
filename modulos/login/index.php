<?php
session_start();
$page_title="Login";
?>
<style>
        /* Título principal en Rojo */
        .login-box-msg + h2, h3.mb-0 {
            color: #e63946 !important; 
        }

        /* La palabra "Welcome" en Turquesa */
        .login-card-body .h1, .login-card-body h1 {
            color: #2ec4b6 !important;
        }

        /* Borde superior de la caja en Amarillo */
        .card-primary.card-outline {
            border-top: 3px solid #ffbe0b !important;
        }

        /* Botón de Sign In en Turquesa sólido */
        .btn-primary {
            background-color: #2ec4b6 !important;
            border-color: #2ec4b6 !important;
            color: white !important;
        }
    </style>
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0"> <?php echo $page_title ?></h3>
        </div>
    </div>

    <?php include_once('loginModal.php'); ?>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="loginFunciones.js"></script>

<script>
$(document).ready(function() {
    BuscarAdmin();
});
</script>