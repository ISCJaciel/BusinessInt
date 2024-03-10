<?php
require_once "../Model/conexion_BD.php";

// Verificar si se ha enviado el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y filtrar datos del formulario de registro
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $contraseña = filter_input(INPUT_POST, 'contraseña', FILTER_SANITIZE_STRING);
    $contraseña_rev = filter_input(INPUT_POST, 'contraseña_rev', FILTER_SANITIZE_STRING);

    // Verificar si los campos están vacíos
    if (empty($usuario) || empty($correo) || empty($contraseña) || empty($contraseña_rev)) {
        // Campos vacíos, redirigir al formulario de registro con mensaje de error
        header("Location: ../Views/html/authentication-register1.php?error=campos_vacios");
        exit();
    }

    // Verificar si las contraseñas coinciden
    if ($contraseña !== $contraseña_rev) {
        // Contraseñas no coinciden, redirigir al formulario de registro con mensaje de error
        header("Location: ../Views/html/authentication-register1.php?error=contraseñas_no_coinciden");
        exit();
    }

    // Convertir la contraseña a formato MD5
    $contraseña_md5 = md5($contraseña);

    // Registrar usuario
    $resultado = registrarUsuario($usuario, $correo, $contraseña_md5);

    if ($resultado === "usuario_duplicado") {
        // Usuario ya existe, redirigir al formulario de registro con mensaje de error
        header("Location: ../Views/html/authentication-register1.php?error=usuario_duplicado");
        exit();
    } elseif ($resultado === "correo_repetido") {
        // Correo electrónico ya existe, redirigir al formulario de registro con mensaje de error
        header("Location: ../Views/html/authentication-register1.php?error=correo_repetido");
        exit();
    } elseif ($resultado) {
        // Registro exitoso, redirigir al formulario de registro con mensaje de éxito
        header("Location: ../Views/html/authentication-register1.php?error=registro_exitoso");
        exit();
    } else {
        // Error en el registro, redirigir al formulario de registro con mensaje de error general
        header("Location: ../Views/html/authentication-register1.php?error=registro_fallido");
        exit();
    }
}

// Función para registrar usuario
function registrarUsuario($usuario, $correo, $contraseña) {
    // Conexión a la base de datos
    $base = new Conexion();
    $conexion = $base->obtenerConexion();

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Comprobar si el usuario ya existe en la base de datos
    $consulta_usuario = "SELECT * FROM usuario WHERE nombre_usuario = ?";
    $sentencia_usuario = $conexion->prepare($consulta_usuario);
    $sentencia_usuario->bind_param('s', $usuario);
    $sentencia_usuario->execute();
    $resultado_usuario = $sentencia_usuario->get_result();

    if ($resultado_usuario->num_rows > 0) {
        // Usuario ya existe, cerrar la conexión y retornar false
        $sentencia_usuario->close();
        $base->cerrarConexion();
        return "usuario_duplicado";
    }

    // Comprobar si el correo electrónico ya existe en la base de datos
    $consulta_correo = "SELECT * FROM usuario WHERE correo = ?";
    $sentencia_correo = $conexion->prepare($consulta_correo);
    $sentencia_correo->bind_param('s', $correo);
    $sentencia_correo->execute();
    $resultado_correo = $sentencia_correo->get_result();

    if ($resultado_correo->num_rows > 0) {
        // Correo electrónico ya existe, cerrar la conexión y retornar false
        $sentencia_correo->close();
        $base->cerrarConexion();
        return "correo_repetido";
    }

    // Preparar la consulta SQL para insertar un nuevo usuario
    $consulta = "INSERT INTO usuario (correo, contraseña, nombre_usuario) VALUES (?, ?, ?)";
    $sentencia = $conexion->prepare($consulta);

    // Verificar la preparación de la consulta
    if (!$sentencia) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Enlazar los parámetros con los datos del formulario
    $sentencia->bind_param('sss', $correo, $contraseña, $usuario);

    // Ejecutar la consulta
    $resultado = $sentencia->execute();

    // Verificar si el registro fue exitoso
    if ($resultado) {
        // Cerrar la conexión y retornar true
        $sentencia->close();
        $base->cerrarConexion();
        return true;
    } else {
        // Cerrar la conexión y retornar false
        $sentencia->close();
        $base->cerrarConexion();
        return false;
    }
}
