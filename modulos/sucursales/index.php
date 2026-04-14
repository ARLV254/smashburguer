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
                    <h3 class="mb-0">Sucursales - Jugueteria El Papalote </h3>
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
                            <h6 class="card-title"> Visitanos aqui</h6>
                        </div>
                        <div class="card-body">
    <h3> Sucursal "La Matriz" (Querétaro)</h3>
    <p>
        ¡Te esperamos en el mero corazón de <b>Santa Rosa Jáuregui</b>! Nuestra tienda principal es el lugar donde nace la magia de El Papalote.
    </p>
    <p>
        <b>¿Cómo llegas?</b> Nos encuentras en la Calle Independencia #45. Estamos justo a espaldas del <b>Parque Bicentenario</b>. ¡Si hueles a las famosas carnitas de la zona, es que ya estás muy cerca de nosotros!
    </p>

    <hr>

    <h3> Sucursal "La Costera" (Tamaulipas)</h3>
    <p>
        ¡Llevamos la diversión hasta la costa! En <b>Tampico</b>, nuestra sucursal es el punto de reunión favorito para encontrar el regalo perfecto.
    </p>
    <p>
        <b>Nuestra ubicación:</b> Estamos en la Av. Hidalgo #1200, en plena Zona Centro. Nos ubicamos a un paso de la <b>Laguna del Carpintero</b>; ven por un juguete y luego lánzate a saludar a los Juanchos.
    </p>

    <hr>

    <h3> Sucursal "La Cajetera" (Guanajuato)</h3>
    <p>
        ¡Llegamos a la ciudad más dulce! En <b>Celaya</b>, El Papalote tiene las puertas abiertas para despertar la curiosidad de todos los niños.
    </p>
    <p>
        <b>Referencia:</b> Nos vemos sobre el Bulevar Adolfo López Mateos #302. Estamos justo frente a las tiendas de cajetas más tradicionales de la región. ¡Es imposible perderse con ese aroma tan rico!
    </p>

    <br>
    <p>
        En cualquiera de nuestras sucursales, ¡jugar es aprender y soñar!
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