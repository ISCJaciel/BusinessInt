<?php
require_once "../Model/conexion_BD.php";

class DatosUsuario {
    public static function verificardatos($usuario, $contraseña) {
        $base = new Conexion;
        $conexion = $base->obtenerConexion();

        $consulta = "SELECT * FROM usuario WHERE nombre_usuario = ?";
        $sentencia = $conexion->prepare($consulta);

        $sentencia->bind_param('s', $usuario);

        $sentencia->execute();

        $resultado = $sentencia->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Verificar la contraseña (sin hash)
            if ($contraseña === $usuario['contraseña']) {
                // Contraseña válida
                $sentencia->close();
                $base->cerrarConexion();
                return true;
            } else {
                // Contraseña incorrecta
                $sentencia->close();
                $base->cerrarConexion();
                return false;
            }
        } else {
            // Usuario no encontrado
            $sentencia->close();
            $base->cerrarConexion();
            return false;
        }
    }

    public static function obtenerInformacionUsuario($nombreusuario) {
        $db = new Conexion();
        $conn = $db->obtenerConexion();

        $query = "SELECT * FROM usuario WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($query);

        $stmt->bind_param('s', $nombreusuario);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            $stmt->close();
            $db->cerrarConexion();

            return $usuario;
        } else {
            $stmt->close();
            $db->cerrarConexion();
            return null;
        }
    }
}
