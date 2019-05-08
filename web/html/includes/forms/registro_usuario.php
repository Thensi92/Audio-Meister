<form id="form_register_user" action="index.php?ctl=null" method="POST">
    <fieldset>
        <legend>Registro de nuevo usuario</legend>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" name="correo" id="correo" required>
        </div>
        
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apodo</label>
            <input type="text" class="form-control" name="apodo" id="apodo" required>
        </div>

        <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" name="pass" id="pass" required>
        </div>

        <div class="form-group">
            <label for="modalidad">Modalidad:</label>
            <input type="text" class="form-control" name="modalidad" id="modalidad" required>
        </div>

        <input type="submit" class="btn btn-primary" name="registrar_usuario" value="Registrar usuario">
    </fieldset>
</form>