<?php
class Conexion {
    // Propiedades para la conexión a la base de datos
    private $servidor = "localhost"; // Servidor de la base de datos
    private $usuario = "root"; // Usuario de la base de datos
    private $password = "1234"; // Contraseña de la base de datos
    private $base_datos = "videojuegos"; // Nombre de la base de datos

    // Propiedad para almacenar la conexión a la base de datos
    private $conexion;

    // Constructor de la clase
    public function __construct() {
        // Intentar establecer la conexión a la base de datos
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
        
        // Verificar si hay errores en la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
        
        echo "Conexión exitosa"; // Esto es opcional, solo para verificar que la conexión se realizó con éxito
    }

    // Método para obtener la conexión a la base de datos
    public function obtenerConexion() {
        return $this->conexion;
    }

    public function cerrarConexion()
    {

        if($this -> conexion){
            $this -> conexion -> close();
        }
    }
}
