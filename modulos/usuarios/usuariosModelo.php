<?php
require_once('../../tools/mypathdb.php'); 
$option = $_GET['option'];

if ($option == "incluir") { 
    $nombre    = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $rolid     = $_POST['rolid'];
    $status    = $_POST['status'];

    // Validación de nombre: permitimos letras y espacios
    if (!preg_match('/^[a-zA-ZñÑáéíóúü ]+$/', $nombre)) { 
        die(json_encode(array("error" => '3', "msg" => "Nombre no válido")));
    }

    // Verificar campos vacíos
    if (empty($nombre) || empty($direccion) || empty($email) || empty($password)) {
        die(json_encode(array("error" => '2', "msg" => "Campos obligatorios vacíos")));
    }

    // Verificar si el email ya existe
    $verificar = "SELECT id FROM usuarios WHERE email='$email' LIMIT 1";
    $resultado = mysqli_query($conn, $verificar);

    if (mysqli_num_rows($resultado) > 0) {
        die(json_encode(array("error" => '1', "msg" => "El correo ya existe")));
    }

    $password_encriptado = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `usuarios` (`nombre`, `direccion`, `email`, `password`, `rolid`, `fecha`, `status`) 
            VALUES ('$nombre', '$direccion', '$email', '$password_encriptado', '$rolid', NOW(), '$status')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("exito" => '1'));
    } else {
        echo json_encode(array("error" => '1', "mysql_error" => mysqli_error($conn)));
    }
    exit;
}


if ($option == "consultar") {

    $clave = intval($_GET['id']);

    $sql = "SELECT * FROM usuarios WHERE id = $clave";
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
        "direccion" => $data['direccion'],
        "email" => $data['email'],
        "rolid" => $data['rolid'],
        "fecha" => $data['fecha'],
        "status" => $data['status']
    ]));
}


if ($option == "modificarConsultar") {

    $clave = intval($_GET['id']);

    $sql = "SELECT * FROM usuarios WHERE id = $clave";
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
        "direccion" => $data['direccion'],
        "email" => $data['email'],
        "rolid" => $data['rolid'],
        "fecha" => $data['fecha'],
        "status" => $data['status']
    ]));
}


if ($option == "modificar") {

    $clave     = intval($_POST['id']);
    $nombre    = trim($_POST['nombre']);
    $direccion = trim($_POST['direccion']);
    $email     = trim($_POST['email']);
    $password  = trim($_POST['password']);
    $rolid     = intval($_POST['rolid']);
    $status    = intval($_POST['status']);

    if (!preg_match('/^[a-zA-ZñÑáéíóúü ]+$/', $nombre)) {
        die(json_encode(["error" => "3"]));
    }

    if (empty($nombre) || empty($direccion) || empty($email)) {
        die(json_encode(["error" => "3"]));
    }

    $verificar = mysqli_query($conn, "SELECT id FROM usuarios WHERE id = $clave");

    if (mysqli_num_rows($verificar) == 0) {
        die(json_encode(["error" => "2"]));
    }
    /* Si se envía un password nuevo se vuelve a encriptar */
    if (!empty($password)) {

        $password_encriptado = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios 
                SET nombre = '$nombre',
                    direccion = '$direccion',
                    email = '$email',
                    password = '$password_encriptado',
                    rolid = $rolid,
                    status = $status
                WHERE id = $clave";

    } else {

        $sql = "UPDATE usuarios 
                SET nombre = '$nombre',
                    direccion = '$direccion',
                    email = '$email',
                    rolid = $rolid,
                    status = $status
                WHERE id = $clave";

    }

    if (mysqli_query($conn, $sql)) {

        mysqli_close($conn);
        die(json_encode(["exito" => "1"]));

    } else {

        mysqli_close($conn);
        die(json_encode(["error" => "4"]));

    }
}


if ($option=="eliminar") {

    $clave = $_GET['id'];

    $sql = "UPDATE usuarios SET status = '2' WHERE id = $clave";

    if (mysqli_query($conn, $sql)) {

        mysqli_close($conn);
        $data = array("exito" => '1');
        die(json_encode($data));

    } else {

        $data = array("error" => '1');
        die(json_encode($data));
    }
}

mysqli_close($conn);
?>