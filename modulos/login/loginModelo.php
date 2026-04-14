<?php
session_start();
require_once('../../tools/mypathdb.php');

$option = $_GET['option'];

if ($option == "buscar") {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    if (empty($email) || empty($password)) {
        echo json_encode(["error" => 2]);
        exit();
    }

    $sql = "SELECT u.id, u.nombre, u.email, u.password, r.nombre AS rol, r.accesos
            FROM usuarios u
            LEFT JOIN roles r ON u.rolid = r.id
            WHERE u.email='$email' AND u.status=1 LIMIT 1";

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        echo json_encode(["error" => 1]);
        exit();
    }

    $usuario = mysqli_fetch_assoc($resultado);

    if (!password_verify($password, $usuario['password'])) {
        echo json_encode(["error" => 1]);
        exit();
    }

    $_SESSION['idusuario'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    $accesos = explode(",", $usuario['accesos']);
    $accesos = array_map(function ($a) {
        return trim(strtolower($a));
    }, $accesos);
    $_SESSION['accesos'] = $accesos;

    echo json_encode(["exito" => 1, "nombre" => $usuario['nombre'], "rol" => $usuario['rol']]);
}

if ($option == "registrar") {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Encriptamos igual que en el login para que puedan entrar después
    $password_hash = password_hash($pass, PASSWORD_BCRYPT);

    // Cambié el rolid a 4 porque me comentaste que ese es el de Cliente
    $sql = "INSERT INTO usuarios (nombre, direccion, email, password, rolid, status, fecha) 
        VALUES ('$nombre', '$direccion', '$email', '$password_hash', 4, 1, NOW())";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["exito" => 1]);
    } else {
        // Esto ayuda a saber si falta alguna columna en tu tabla de la DB
        echo json_encode(["exito" => 0, "mensaje" => "Error: " . mysqli_error($conn)]);
    }
}

mysqli_close($conn);
