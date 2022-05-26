<div class="text-center">
    <img src="../img/logo.jpg" alt="del" width="100" height="100">
</div>
<div class="modal-dialog text-center">
    <h1><?=$mensaje?></h1>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/user.gif" alt="user"/>
                </div>
                <form class="col-12" action="../login/login.php?action=validate" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="email" name="correo" class="form-control" placeholder="correo" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" name="contrasena" class="form-control" placeholder="Contrasena"/>
                    </div>
                    <input type="submit" name="enviar" value="Ingresar" class="btn btn-primary">
                </form>
                <div class="col-12 forgot">
                    <a href="../login/login.php?action=forget">¿Olvidó su contraseña?</a>
                </div>
                <div class="col-12 forgot">
                    <a href="../admin/registro.php?action=create">REGÍSTRATE</a>
                </div>
            </div>
        </div>
</div>