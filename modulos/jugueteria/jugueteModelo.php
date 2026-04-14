<?php
require_once('../../tools/mypathdb.php'); 
$option = $_GET['option'];

if ($option == "incluir") { 
    $nombre        = $_POST['nombre'];
    $edad          = $_POST['edad_estimada'];
    $precio        = $_POST['precio'];
    $marca         = $_POST['marca'];
    $status        = $_POST['status'];

    // Validar campos vacíos
    if (empty($nombre) || empty($edad) || empty($precio) || empty($marca) || empty($status)) {
        $data = array("error" => '2');
        die(json_encode($data));
    }

    // PROCESAR IMAGEN
    $nombreImagen = "";
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = "../../img/";
        if (!is_dir($directorio)) { mkdir($directorio, 0777, true); }
        $nombreImagen = time() . "_" . $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombreImagen);
    }

    $sql = "INSERT INTO `juguetes` (`nombre`, `edad_estimada`, `precio`, `marca`, `imagen`, `status`) 
            VALUES ('$nombre', '$edad', '$precio', '$marca', '$nombreImagen', '$status')";
    
    if (mysqli_query($conn, $sql)) {
        die(json_encode(["exito" => '1']));
    } else {
        die(json_encode(["error" => '1']));
    }
}

if ($option == "modificarConsultar") {
    $clave = intval($_GET['id']);
    $sql = "SELECT * FROM juguetes WHERE id = $clave";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 0) { die(json_encode(["error" => "2"])); }

    $data = mysqli_fetch_assoc($resultado);
    mysqli_close($conn);

    die(json_encode([
        "exito" => "1",
        "id" => $data['id'],
        "nombre" => $data['nombre'],
        "edad_estimada" => $data['edad_estimada'],
        "precio" => $data['precio'],
        "marca" => $data['marca'],
        "status" => $data['status'],
        "imagen" => $data['imagen']
    ]));
}

if ($option == "modificar") {
    $clave = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad_estimada'];
    $precio = $_POST['precio'];
    $marca = $_POST['marca'];
    $status = intval($_POST['status']);

    $verificar = mysqli_query($conn, "SELECT imagen FROM juguetes WHERE id = $clave");
    $dataActual = mysqli_fetch_assoc($verificar);
    $nombreImagen = (!empty($_POST['imagenVieja'])) ? $_POST['imagenVieja'] : $dataActual['imagen'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = "../../img/";
        if ($nombreImagen != "" && file_exists($directorio . $nombreImagen)) { unlink($directorio . $nombreImagen); }
        $nombreImagen = time() . "_" . $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $nombreImagen);
    }

    $sql = "UPDATE juguetes SET nombre = '$nombre', edad_estimada = '$edad', precio = '$precio', 
            marca = '$marca', status = $status, imagen = '$nombreImagen' WHERE id = $clave";

    if (mysqli_query($conn, $sql)) {
        die(json_encode(["exito" => "1"]));
    } else {
        die(json_encode(["error" => "4"]));
    }
}
?>