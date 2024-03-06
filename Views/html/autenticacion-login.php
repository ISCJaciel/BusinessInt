<!doctype html>
<html lang='en'>
<?php include "Header.php"; ?>

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
                                            <input type="text"  id="uname" name="username" class="form-control" type="text"
                                                placeholder="Ingresa tu usuario" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label text-dark" for="pwd">Contraseña</label>
                                            <input type="password" class="form-control" id="pwd" name="password" type="password"
                                                placeholder="Ingresa tu contraseña" required>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                           <input type="submit" class="btn w-100 btn-dark neon-purple" value="Iniciar Sesion">
                                        </div>

                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    ¿No tienes una cuenta? <a href="#" class="text-danger">Registrate</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>