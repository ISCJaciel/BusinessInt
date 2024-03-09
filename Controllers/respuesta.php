<?php
require_once 'manejo_sesiones.php';
require_once 'Datos_del_Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si se está intentando iniciar sesión
    if (isset($_POST['login'])) {
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

    // Si se está intentando registrar
    elseif (isset($_POST['registro'])) {
        // Validar y filtrar datos del formulario de registro
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
        $contraseña = filter_input(INPUT_POST, 'contraseña', FILTER_SANITIZE_STRING);
        $contraseña_rev = filter_input(INPUT_POST, 'contraseña_rev', FILTER_SANITIZE_STRING);

        // Verificar si los datos del formulario de registro están completos
        if (!$usuario || !$correo || !$contraseña || !$contraseña_rev) {
            // Datos incompletos, redirigir al formulario de registro
            header("Location: ../Views/html/authentication-register1.php?alert=datos_faltantes_registro");
            exit();
        }

        // Verificar si las contraseñas coinciden
        if ($contraseña !== $contraseña_rev) {
            // Contraseñas no coinciden, redirigir al formulario de registro
            header("Location: ../Views/html/authentication-register1.php?alert=contraseñas_no_coinciden");
            exit();
        }

        // Registrar usuario
        $resultado = DatosUsuario::registrarUsuario($correo, $contraseña, $usuario);

        // Verificar el resultado del registro
        if ($resultado) {
            // Registro exitoso, establecer variable de sesión y redirigir al formulario de inicio de sesión
            session_start();
            $_SESSION['registro_exitoso'] = true;
            header("Location: ../Views/html/authentication-register1.php?alert=registro_exitoso");
            exit();
        } else {
            // Error en el registro, redirigir al formulario de registro
            header("Location: ../Views/html/authentication-register1.php?alert=error_registro");
            exit();
        }
    }
}

