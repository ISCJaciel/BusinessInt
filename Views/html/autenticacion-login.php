<!DOCTYPE html>
<html lang='en'>

<?php
// Iniciar sesión si aún no se ha iniciado
session_start();

// Resto de tu código antes de incluir el encabezado
include "Header.php";
?>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background: url(../assets/images/big/Fondo_login.jpg) no-repeat center center; background-size: cover;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img"
                    style="background-image: url(../assets/images/big/imagen_jugador.jpg); background-position: left;">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="../assets/images/big/icono.png" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Inicia Sesion</h2>
                        <p class="text-center">Ingresa tu correo y contraseña para inciar sesion.</p>
                        <form action="../../Controllers/respuesta.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="uname">Usuario</label>
                                        <input type="text" id="uname" name="username" class="form-control" type="text"
                                            placeholder="Ingresa tu usuario" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label text-dark" for="pwd">Contraseña</label>
                                        <input type="password" class="form-control" id="pwd" name="password"
                                            type="password" placeholder="Ingresa tu contraseña" required>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <input type="submit" class="btn w-100 btn-dark neon-purple"
                                            value="Iniciar Sesion">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    ¿No tienes una cuenta? <a href="authentication-register1.php"
                                        class="text-danger">Registrate</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para datos faltantes -->
    <div class="modal fade" id="modalDatosFaltantes" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                </div>
                <div class="modal-body bg-white">
                    Por favor, ingresa tu usuario y contraseña.
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para credenciales incorrectas -->
    <div class="modal fade" id="modalCredencialesIncorrectas" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                </div>
                <div class="modal-body bg-white">
                    Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php
    // Verificar si la variable de sesión está configurada y mostrar la modal
    
    if (isset($_SESSION['registro_exitoso']) && $_SESSION['registro_exitoso']) {
        echo '
        <script>
            $(document).ready(function () {
                $("#modalUsuarioRegistrado").modal("show");
            });
        </script>';
        // Reiniciar la variable de sesión para evitar que la modal se muestre en futuras visitas
        $_SESSION['registro_exitoso'] = false;
    }

    // Verificar si hay alerta de datos faltantes y mostrar el modal correspondiente
    if (isset($_GET['alert']) && $_GET['alert'] === 'datos_faltantes') {
        echo '
        <script>
            $(document).ready(function () {
                $("#modalDatosFaltantes").modal("show");
            });
        </script>';
    }

    // Verificar si hay alerta de credenciales incorrectas y mostrar el modal correspondiente
    if (isset($_GET['alert']) && $_GET['alert'] === 'credenciales_incorrectas') {
        echo '
        <script>
            $(document).ready(function () {
                $("#modalCredencialesIncorrectas").modal("show");
            });
        </script>';
    }
    ?>

    <?php
    // Resto de tu código después de mostrar la modal
    include "footer.php";
    ?>
</body>

</html>
