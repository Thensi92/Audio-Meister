<section>
    <form id="form" action="index.php?ctl=null" method="POST">
        <fieldset>
            <legend>Inicio de sesión</legend>
            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" class="form-control" name="correo" id="correo" required>
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" name="pass" id="pass" required>
            </div>
            <input class="btn btn-primary" type="submit" name= "procesar_login" value="Iniciar">
        </fieldset>
    </form>
</section>