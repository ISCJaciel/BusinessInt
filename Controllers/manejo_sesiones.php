<?php
class ManejoSesiones {
    public static function iniciarSesionYRedirigir($usuario, $paginaRedireccion) {
        session_start();
        // Limpiar todas las variables de sesión existentes
        $_SESSION = array();

        // Generar un nuevo ID de sesión
        session_regenerate_id(true);

        // Guardar información esencial del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['UsuarioID'];
        $_SESSION['nombre_usuario'] = $usuario['NombreUsuario'];

        // Establecer tiempo de expiración de sesión (ejemplo: 30 minutos)
        $_SESSION['expire'] = time() + (30 * 60);

        // Redirigir a la página deseada
        header("Location: $paginaRedireccion");
        exit();
    }

    public static function verificarAutenticacion($paginaInicioSesion) {
        session_start();
        // Actualizar el tiempo de expiración de la sesión
        $_SESSION['expire'] = time() + (30 * 60);
    }
    
    public static function cerrarSesionYRedirigir($paginaInicioSesion) {
        // Inicia la sesión (asegúrate de hacerlo al principio de cada script que necesite acceder a la sesión)
        session_start();

        // Destruye la sesión (elimina todas las variables de sesión)
        session_destroy();

        // Establece el tiempo de expiración de la cookie de sesión en el pasado para eliminarla
        setcookie(session_name(), '', time() - 3600, '/');

        // Redirige a la página de inicio de sesión u otra página después de cerrar sesión
        header("Location: $paginaInicioSesion");
        exit();
    }
}