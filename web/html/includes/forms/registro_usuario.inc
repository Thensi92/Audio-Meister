<form id="form" action="index.php?ctl=null" method="POST">
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
            <label for="modalidad">Subscripcion:</label>
            <select class="custom-select form-control" name="modalidad" id="modalidad" required>
                <option value="Free" selected>Free</option>
                <option value="Premium">Premium</option>
            </select>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="checkTermsOfUse">
            <label class="form-check-label" for="checkTermsOfUse">
                Al registrarme, acepto los
                <!-- Button trigger modal -->
                <a href="termsOfUse" data-toggle="modal" data-target="#divTermsOfUse">
                    términos de uso
                </a>
            </label>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" name="registrar_usuario" value="Registrar usuario" id="submit"
            disabled>
    </fieldset>
</form>


<!-- Modal -->
<div class="modal fade" id="divTermsOfUse" tabindex="-1" role="dialog" aria-labelledby="divTermsOfUseTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="divTermsOfUseTitle">Términos de uso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h2>Normas de uso Audio Meister:</h2>

                <p>
                    La subida de ficheros de audio debe estar libre de copyright. Todo fichero con derechos de autor,
                    será
                    inmediatamente eliminado de nuestros servidores y de la cuenta del usuario. Únicamente está
                    permitido
                    creaciones propias, como música, podcast u otro tipo de material que no infrinja los derechos de sus
                    respectivos autores.

                </p>
                <p>
                    Los administradores del sitio pueden eliminar la cuenta de usuario, si este excede un número máximo
                    de
                    infracciones de copyrigh.
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="web/scripts/registration_terms_of_use.js"></script>