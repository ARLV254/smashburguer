<?php
require_once('../../tools/security.php');
    include_once "../../tools/header.php";
    include_once "../../tools/navbar.php";
    include_once "../../tools/sidebar.php";
$page_title = "Dashboard"?>
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Jugueteria El Papalote </h3>
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
                            <h3 class="card-title">Bienvenidos a El Papalote</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                En El Papalote creemos que la imaginación no tiene límites. Somos una juguetería dedicada a llevar alegría, diversión y creatividad a niños y niñas de todas las edades.
                            </p>
                            <p>
                                Aquí encontrarás desde los juguetes clásicos que nunca pasan de moda, hasta las últimas novedades que despiertan la curiosidad y el aprendizaje. Cada producto ha sido seleccionado para brindar momentos inolvidables en familia.
                            </p>
                            <p>
                                Explora, diviértete y deja volar tu imaginación… porque en El Papalote, ¡jugar es aprender y soñar!
                            </p>
                        </div>
                        <div class="card-footer clearfix">
                            </div>
                    </div>

                    </div>
            </div>
            </div>
    </div>
    </main>
<?php
include_once "../../tools/footer.php"; ?>