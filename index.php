<?php
require_once 'Controllers/manejo_sesiones.php';

ManejoSesiones::verificarAutenticacion("Views/html/autenticacion-login.php");

header("Location: /xampp/Views/html/autenticacion-login.php");
exit();
