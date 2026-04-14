<?php
//Se asegura de que la sesión esté activa para poder leer datos como el usuario que inició sesión.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Esto le dice al navegador que NO guarde la página en memoria.Así, cuando el usuario intenta regresar con “atrás”, no puede ver una versión guardada.
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0"); 

// Si no hay un usuario logueado, redirige al login
if(!isset($_SESSION['idusuario'])){
    header("Location: ../../modulos/login/"); 
    exit();
}

// Función para validar si el usuario tiene acceso a un módulo específico
function validarAcceso($modulo){
    if(!isset($_SESSION['accesos']) || !in_array($modulo, $_SESSION['accesos'])){
        header("Location: ../../modulos/home/"); 
        exit();
    }
}
?>