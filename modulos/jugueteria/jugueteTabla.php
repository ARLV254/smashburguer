<?php
require_once('../../tools/mypathdb.php');
$sql = "SELECT * FROM juguetes ORDER BY id DESC";
$resultado = mysqli_query($conn, $sql);
?>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Imagen</th>
                <th style="width: 120px">Status</th>
                <th style="width: 120px">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $contador = 1;
            while ($row = mysqli_fetch_assoc($resultado)) { 
            ?>
            <tr class="align-middle">
                <td><?php echo $contador++; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['edad_estimada']; ?></td>
                <td>$<?php echo number_format($row['precio'], 2); ?></td>
                <td><?php echo $row['marca']; ?></td>
                <td>
                    <?php if ($row['imagen'] != "") { ?>
                    <img src="../../img/<?php echo $row['imagen']; ?>" width="50" height="50"
                        style="object-fit: cover; border-radius: 5px;">
                    <?php } else { ?>
                    <span class="badge text-bg-secondary">Sin imagen</span>
                    <?php } ?>
                </td>
                <td>
                    <?php if ($row['status'] == 1) { ?>
                    <span class="badge text-bg-success">Existente</span>
                    <?php } else { ?>
                    <span class="badge text-bg-danger">Agotado</span>
                    <?php } ?>
                </td>
                <td>
                    <button class="btn btn-primary" onclick="Modificar(<?php echo $row['id']; ?>)" 
                    data-bs-toggle="modal" data-bs-target="#modalJuguete">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-danger" onclick="Eliminar()">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php mysqli_close($conn); ?>