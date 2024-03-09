<!DOCTYPE html>
<html dir="ltr">

<?php
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
            style="background:url(../assets/images/big/Fondo_registro.jpg) no-repeat center center; background-size: cover;">
            <div class="auth-box row text-center">
                <div class="col-lg-7 col-md-5 modal-bg-img"
                    style="background-image: url(../assets/images/big/imagen_jugador_registro.jpg);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <img src="../assets/images/big/icono.png" alt="wrapkit">
                        <h2 class="mt-3 text-center">Registrate GRATIS</h2>
                        <form action="../../Controllers/Registro.php" method="POST"">
                            <div class=" row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input class="form-control" name="usuario" type="text"
                                        placeholder="Nombre de usuario">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="email" name="correo"
                                        placeholder="Direccion de correo">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="password" name="contraseña"
                                        placeholder="Ingresa una contraseña">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input class="form-control" name="contraseña_rev" type="password"
                                        placeholder="Repite tu contraseña">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark">Registrarse</button>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                ¿Ya tienes una cuenta? <a href="autenticacion-login.php" class="text-danger">Inicia
                                    sesión</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    </div>
    <?php include "footer.php" ?>

    <div class="modal fade" id="modalUsuarioRegistrado" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¡Usuario registrado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>El usuario se ha registrado exitosamente.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#modalUsuarioRegistrado').modal('show');
        });
    </script>  
</body>



</html>