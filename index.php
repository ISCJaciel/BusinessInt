<?php
require_once 'Controllers/manejo_sesiones.php';

ManejoSesiones::verificarAutenticacion("Views/html/autenticacion-login.php");

header("Location: ../Views/html/index.php");
exit();
