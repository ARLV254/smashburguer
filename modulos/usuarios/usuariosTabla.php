<?php
require_once('../../tools/mypathdb.php');

$sql = "SELECT u.*, r.nombre AS rol 
            FROM usuarios u
            LEFT JOIN roles r ON u.rolid = r.id
        ORDER BY u.id DESC";

$resultado = mysqli_query($conn, $sql);
?>
<style>
.avatar-iniciales {
    width: 40px;
    height: 40px;
    background: #0d6efd;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: bold;
    font-size: 14px;
}
</style>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width:10px">#</th>
                <th>Usuario</th>
                <th>Dirección</th>
                <th>Rol</th>
                <th>Fecha</th>
                <th style="width:120px">Estatus</th>
                <th style="width:120px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
$contador = 1;

while ($row = mysqli_fetch_assoc($resultado)) { 
$nombre = $row['nombre'];
$palabras = explode(" ", $nombre);
$iniciales = "";
foreach ($palabras as $p) {
$iniciales .= strtoupper(substr($p,0,1));
if(strlen($iniciales) == 2) break;
}
?>
            <tr class="align-middle">
                <td><?php echo $contador++; ?></td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="avatar-iniciales">
                            <?php echo $iniciales; ?>
                        </div>
                        <div class="ms-2">
                            <strong><?php echo $row['nombre']; ?></strong><br>
                            <small class="text-muted">
                                <?php echo $row['email']; ?>
                            </small>
                        </div>
                    </div>
                </td>
                <td>
                    <?php echo $row['direccion']; ?>
                </td>
                <td>
                    <span class="badge text-bg-info">
                        <?php echo $row['rol']; ?>
                    </span>
                </td>
                <td>
                    <?php echo $row['fecha']; ?>
                </td>
                <td>
                    <?php if ($row['status'] == 1) { ?>
                    <span class="badge text-bg-success">
                        Activo
                    </span>
                    <?php } else { ?>
                    <span class="badge text-bg-danger">
                        Inactivo
                    </span>
                    <?php } ?>
                </td>
                <td>
                    <button class="btn btn-primary" onclick="Modificar('<?php echo $row['id']; ?>')"
                        data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-danger" onclick="Eliminar('<?php echo $row['id']; ?>')">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php mysqli_close($conn); ?>