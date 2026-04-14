<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    $servername ="localhost";
    $username = "root";
    $password = "";
    $database = "jugueteria";
}
//crear la conexion
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'utf8');

//Chequear la conexion
if (!$conn) {
    $data = array("error" => '3');
    die(json_encode($data));
}