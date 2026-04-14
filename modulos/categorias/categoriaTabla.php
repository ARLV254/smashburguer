<?php
require_once('../../tools/mypathdb.php');
$sql = "SELECT * FROM categorias ORDER BY id DESC";
$resultado = mysqli_query($conn, $sql);
?>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Fecha</th>
                <th style="width: 120px">Estatus</th>
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
                <td><?php echo $row['descripcion']; ?></td>
                <td>
                    <?php if ($row['imagen'] != "") { ?>
                    <img src="../../img/<?php echo $row['imagen']; ?>" width="50" height="50"
                        style="object-fit: cover; border-radius: 5px;">
                    <?php } else { ?>
                    <span class="badge text-bg-secondary">Sin imagen</span>
                    <?php } ?>
                </td>
                <td><?php echo $row['fecha']; ?></td>
                <td>
                    <?php if ($row['status'] == 1) { ?>
                    <span class="badge text-bg-success">Activo</span>
                    <?php } else { ?>
                    <span class="badge text-bg-danger">Inactivo</span>
                    <?php } ?>
                </td>
                <td>
                    <button class="btn btn-primary" onclick="Modificar(<?php echo $row['id']; ?>)" 
                    data-bs-toggle="modal" data-bs-target="#modalCategoria">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-danger" onclick="Eliminar(<?php echo $row['id']; ?>)">
    <i class="fa-solid fa-trash-can"></i>
</button>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?php mysqli_close($conn); ?>
