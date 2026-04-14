<?php
require_once('../../tools/mypathdb.php'); 
$option = $_GET['option'];
if ($option == "incluir") { 
    $nombre      = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $status     = $_POST['status'];
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
    // ==============================
    // PROCESAR IMAGEN
    // ==============================
    $nombreImagen = "";
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = "../../img/";
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        $nombreOriginal = $_FILES['imagen']['name'];
        $tmp = $_FILES['imagen']['tmp_name'];
        $nombreImagen = time() . "_" . $nombreOriginal;
        move_uploaded_file($tmp, $directorio . $nombreImagen);
    }
    $verificar = "SELECT id FROM categorias WHERE nombre='$nombre' LIMIT 1";
    $resultado = mysqli_query($conn, $verificar);

    if (mysqli_num_rows($resultado) > 0) {
    $data = array("error" => '1');
    die(json_encode($data));
    }
    $sql = "INSERT INTO `categorias`
            (`id`, `nombre`, `descripcion`, `fecha`, `imagen`, `status`)
            VALUES
            (NULL, '$nombre', '$descripcion', NOW(), '$nombreImagen', '$status')";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        $data = array("exito" => '1');
        die(json_encode($data));
    } else {
        $data = array("error" => '1');
        die(json_encode($data));

    }
}
if ($option == "consultar") {

    $clave = intval($_GET['id']);

    $sql = "SELECT * FROM categorias WHERE id = $clave";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        die(json_encode(["error" => "2"]));
    }

    $data = mysqli_fetch_assoc($resultado);

    if ($data['status'] == 2) {
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
    "imagen" => $data['imagen'] 
]));
}
if ($option == "modificarConsultar") {

    $clave = intval($_GET['id']);

    $sql = "SELECT * FROM categorias WHERE id = $clave";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        die(json_encode(["error" => "2"]));
    }

    $data = mysqli_fetch_assoc($resultado);

    mysqli_close($conn);

    die(json_encode([
        "exito" => "1",
        "id" => $data['id'],
        "nombre" => $data['nombre'],
        "descripcion" => $data['descripcion'],
        "fecha" => $data['fecha'],
        "status" => $data['status'],
        "imagen" => $data['imagen']
    ]));
}
if ($option == "modificar") {
    $clave = intval($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $status = intval($_POST['status']);
    // Validar nombre
    if (!preg_match('/^[a-zA-ZñÑáéíóúü ]+$/', $nombre)) {
        die(json_encode(["error" => "3"]));
    }

    if (empty($nombre) || empty($descripcion)) {
        die(json_encode(["error" => "3"]));
    }
    // Verificar que exista
    // Verificar que exista y obtener la imagen que ya tiene
$verificar = mysqli_query($conn, "SELECT id, imagen FROM categorias WHERE id = $clave");

if (mysqli_num_rows($verificar) == 0) {
    die(json_encode(["error" => "2"]));
}

$dataActual = mysqli_fetch_assoc($verificar);

// Si el usuario mandó una imagen vieja desde el formulario, la usamos, 
// si no, usamos la que acabamos de traer de la BD.
$nombreImagen = (!empty($_POST['imagenVieja'])) ? $_POST['imagenVieja'] : $dataActual['imagen'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

        $directorio = "../../img/";
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }

        // Eliminar imagen anterior si existe
        if ($nombreImagen != "" && file_exists($directorio . $nombreImagen)) {
            unlink($directorio . $nombreImagen);
        }

        $nombreOriginal = $_FILES['imagen']['name'];
        $tmp = $_FILES['imagen']['tmp_name'];
        $nombreImagen = time() . "_" . $nombreOriginal;

        move_uploaded_file($tmp, $directorio . $nombreImagen);
    }
   $sql = "UPDATE categorias 
            SET nombre = '$nombre',
                descripcion = '$descripcion',
                status = $status,
                imagen = '$nombreImagen'
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
    $clave = intval($_REQUEST['id']); 
    $sql = "UPDATE categorias SET status = 2 WHERE id = $clave";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["exito" => "1"]);
    } else {
        echo json_encode(["error" => "1"]);
    }
    mysqli_close($conn);
    exit;
}
?>