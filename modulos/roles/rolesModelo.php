<?php
require_once('../../tools/mypathdb.php'); 
$option = $_GET['option'];

if ($option == "incluir") { 
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $status      = $_POST['status'];
    $accesos     = $_POST['accesos']; // Recibimos el string de accesos

    // Validar nombre (solo letras y espacios)
    $validanombre = preg_match('/^[a-zA-ZñÑáéíóúü ]+$/', $nombre);
    if ($validanombre == 0) { 
        $data = array("error" => '3');
        die(json_encode($data));
    }

    // Validar campos vacíos
    if (empty($nombre) OR empty($descripcion) OR empty($status)) {
        $data = array("error" => '2');
        die(json_encode($data));
    }

    // Verificar si ya existe el rol
    $verificar = "SELECT id FROM roles WHERE nombre='$nombre' LIMIT 1";
    $resultado = mysqli_query($conn, $verificar);

    if (mysqli_num_rows($resultado) > 0) {
        $data = array("error" => '1');
        die(json_encode($data));
    }

    // INSERT adaptado a tu tabla 'roles'
    $sql = "INSERT INTO `roles`
            (`id`, `nombre`, `descripcion`, `accesos`, `fecha`, `status`)
            VALUES
            (NULL, '$nombre', '$descripcion', '$accesos', NOW(), '$status')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        $data = array("exito" => '1');
        die(json_encode($data));
    } else {
        $data = array("error" => '1');
        die(json_encode($data));
    }
}

if ($option == "consultar" || $option == "modificarConsultar") {
    $clave = intval($_GET['id']);
    $sql = "SELECT * FROM roles WHERE id = $clave";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        die(json_encode(["error" => "2"]));
    }

    $data = mysqli_fetch_assoc($resultado);

    if ($option == "consultar" && $data['status'] == 0) {
        die(json_encode(["error" => "1"]));
    }

    mysqli_close($conn);

    die(json_encode([
        "exito" => "1",
        "id" => $data['id'],
        "nombre" => $data['nombre'],
        "descripcion" => $data['descripcion'],
        "fecha" => $data['fecha'],
        "status" => $data['status'],
        "accesos" => $data['accesos'] 
    ]));
}

if ($option == "modificar") {
    $clave = intval($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $status = $_POST['status']; 
    $accesos = $_POST['accesos'];

    if (!preg_match('/^[a-zA-ZñÑáéíóúü ]+$/', $nombre)) {
        die(json_encode(["error" => "3"]));
    }

    if (empty($nombre) || empty($descripcion)) {
        die(json_encode(["error" => "3"]));
    }

    $verificar = mysqli_query($conn, "SELECT id FROM roles WHERE id = $clave");
    if (mysqli_num_rows($verificar) == 0) {
        die(json_encode(["error" => "2"]));
    }

    $sql = "UPDATE roles 
            SET nombre = '$nombre',
                descripcion = '$descripcion',
                status = '$status',
                accesos = '$accesos'
            WHERE id = $clave";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        die(json_encode(["exito" => "1"]));
    } else {
        mysqli_close($conn);
        die(json_encode(["error" => "4"]));
    }
}

if ($option == "eliminar") {
    $clave = intval($_GET['id']);
    $sql = "UPDATE roles SET status = '0' WHERE id = $clave";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        echo json_encode(["exito" => "1"]);
    } else {
        mysqli_close($conn);
        echo json_encode(["error" => "1"]);
    }
    exit;
}
?>