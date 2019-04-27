<section>
    <form action="app/controllers/controllerSubirAudio.php" method="POST"  enctype="multipart/form-data">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" required >
        </div>
        <div class="form-group">
            <input type="file" name="archivo">
        </div>
        <input type="submit"  class="btn btn-success" name="guardar" value="Subir">
        <input type="submit" class="btn btn-danger" name="eliminar" value="Cancelar">
    </form>
</section>