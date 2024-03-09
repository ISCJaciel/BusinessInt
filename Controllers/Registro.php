<?php
require_once "../Model/conexion_BD.php";
require_once "Datos_del_Usuario.php";

// Recibir los datos del formulario
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

// Registrar el usuario
$resultado = DatosUsuario::registrarUsuario($correo, $contraseña, $usuario);

// Mostrar un mensaje al usuario
if ($resultado) {
    // Redirigir al usuario a otra página después de 2 segundos
    header("refresh:2;url=../Views/authentication-register1.php");
    exit();  // Importante para detener la ejecución del script después de la redirección
} else {
    echo "Error al registrar el usuario";
}
