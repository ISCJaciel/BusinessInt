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
                        <form action="../../Controllers/Registro.php" method="POST">
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
                                    <input type="submit" class="btn w-100 btn-dark neon-purple"
                                        value="Registrarse">
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    ¿Ya tienes una cuenta? <a href="autenticacion-login.php"
                                        class="text-danger">Inicia sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    </div>

<!-- Modal Registro Exitoso -->
<div class="modal fade" id="modalRegistroExitoso" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Registro Exitoso</h5>
            </div>
            <div class="modal-body bg-white">
                El registro se ha realizado con éxito
            </div>
            <div class="modal-footer bg-white">
                <!-- Cambiamos el tipo de botón a "a" y añadimos el atributo "href" para la redirección -->
                <a href="autenticacion-login.php" class="btn btn-success">Cerrar</a>
            </div>
        </div>
    </div>
</div>



   <!-- Modal Usuario Duplicado -->
<div class="modal fade" id="modalErrorRegistro" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Error en Registro</h5>
            </div>
            <div class="modal-body bg-white">
                Ah ocurrido un error inesperado en el registro, intenta mas tarde
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



 <!-- Modal Usuario Duplicado -->
 <div class="modal fade" id="modalCamposVacios" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Error en Registro</h5>
            </div>
            <div class="modal-body bg-white">
                No puedes dejar campos vacios
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


 <!-- Modal contraseñas no coinciden -->
<div class="modal fade" id="modalContraseñasNoCoinciden" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Error en Registro</h5>
            </div>
            <div class="modal-body bg-white">
                La contraseña no coincide
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



   <!-- Modal Usuario Duplicado -->
<div class="modal fade" id="modalUsuarioDuplicado" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Error en Registro</h5>
            </div>
            <div class="modal-body bg-white">
                El usuario que intenta ingresar ya existe.
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



  <!-- Modal Correo Repetido -->
<div class="modal fade" id="modalCorreoRepetido" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Error en Registro</h5>
            </div>
            <div class="modal-body bg-white">
                El correo que intenta ingresar ya existe.
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

   <!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Obtener parámetro de URL para el tipo de error
    var error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>";

    // Mostrar el modal correspondiente según el tipo de error
    if (error === "campos_vacios") {
        $('#modalCamposVacios').modal('show');
    } else if (error === "contraseñas_no_coinciden") {
        $('#modalContraseñasNoCoinciden').modal('show');
    } else if (error === "usuario_duplicado") {
        $('#modalUsuarioDuplicado').modal('show');
    } else if (error === "correo_repetido") {
        $('#modalCorreoRepetido').modal('show');
    } else if (error === "registro_fallido") {
        $('#modalErrorRegistro').modal('show');
    } else if (error === "registro_exitoso") {
        $('#modalRegistroExitoso').modal('show');
    }

    // Agregar controlador de eventos al botón de cierre del modal
    $('.modal-footer .btn').on('click', function() {
        $(this).closest('.modal').modal('hide'); // Cerrar el modal al hacer clic en el botón de cierre
    });
});
</script>

<?php include "footer.php" ?>
</body>
</html>