<?php
session_start();
require_once('../../tools/security.php');
include_once "../../tools/header.php";
include_once "../../tools/navbar.php";
include_once "../../tools/sidebar.php";

$page_title = "Mi Carrito de Compras";
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"><?php echo $page_title ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="../home/">Inicio</a></li>
                        <li class="breadcrumb-item active">Carrito</li>
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
                            <h3 class="card-title">Productos Seleccionados</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th style="width: 100px">Cantidad</th>
                                        <th>Subtotal</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_pagar = 0;
                                    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                                        foreach ($_SESSION['carrito'] as $id => $item) {
                                            $subtotal = $item['precio'] * $item['cantidad'];
                                            $total_pagar += $subtotal;
                                    ?>
                                            <tr>
                                                <td><?php echo $item['nombre']; ?></td>
                                                <td>$<?php echo number_format($item['precio'], 2); ?></td>
                                                <td><?php echo $item['cantidad']; ?></td>
                                                <td>$<?php echo number_format($subtotal, 2); ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr class="table-dark">
                                            <td colspan="3" class="text-end"><strong>Total a Pagar:</strong></td>
                                            <td colspan="2"><strong>$<?php echo number_format($total_pagar, 2); ?></strong></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="5" class="text-center p-4">
                                                <h4>Tu carrito está vacío</h4>
                                                <a href="../tienda/" class="btn btn-primary mt-2">Ir a la tienda</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if (!empty($_SESSION['carrito'])) { ?>
                            <div class="card-footer text-end">
                                <button class="btn btn-success" onclick="FinalizarCompra()">
                                    <i class="bi bi-credit-card"></i> Pagar ahora
                                </button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once "../../tools/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="carritoFunciones.js"></script>