<?php
require_once 'manejo_sesiones.php';
require_once 'Datos_del_Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y filtrar datos del formulario
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Verificar si el usuario y la contraseña están presentes
    if (!$username || !$password) {
        // Datos incompletos, redirigir al formulario de inicio de sesión
        header("Location: ../Views/html/autenticacion-login.php?alert=datos_faltantes");
        exit();
    }

    // Lógica de autenticación
    // Considera utilizar una base de datos y sentencias preparadas aquí

    // Verificar credenciales (ejemplo utilizando sentencias preparadas)
    if (DatosUsuario::verificardatos($username, $password)) {
        // Obtener información del usuario desde la base de datos u otra fuente
        $usuario = DatosUsuario::obtenerInformacionUsuario($username);

        // Iniciar sesión y redirigir a la página principal
        ManejoSesiones::iniciarSesionYRedirigir($usuario, '../Views/html/index.php');
    } else {
        // Credenciales incorrectas, redirigir al formulario de inicio de sesión
        header("Location: ../Views/html/autenticacion-login.php?alert=credenciales_incorrectas");
        exit();
    }
}