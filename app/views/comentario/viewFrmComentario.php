<?php
 echo '<form id="form" action="index.php?ctl=up&idAudio='.$idAudio.'&correo='.$usuario.' " method="post" >';
 ?>
        <div class="form-group">
        <label for="comment">Escribe el comentario:</label>
        <textarea class="form-control" rows="3" cols="95"  name="comentario" required></textarea>
        </div>

        
    <button type="submit" name="subirComentario" class="btn btn-primary">Subir</button>
</form>