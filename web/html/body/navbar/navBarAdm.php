<?php
require_once("app/controllers/audios/busquedaAudios.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img id="logo" src="web/html/body/img/logo.ico"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?ctl=listarAllUser">Gestion usuarios</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?ctl=listarAllAudios">Gestion audios</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Generos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?ctl=podcast&tipo_genero=1">Podcast</a>
          <a class="dropdown-item" href="index.php?ctl=voz&tipo_genero=2">Notas de Audio</a>
          <a class="dropdown-item" href="index.php?ctl=musica&tipo_genero=3">Musica</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?ctl=desconectar">Desconectar</a>
      </li>

    </ul>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" id="caja_busqueda">
      <input class="form-control mr-sm-2" type="search" aria-label="Search" name="search" value="<?php echo $search ?>">
      <input type="submit" class="btn btn-outline-success my-1 my-sm-0" value="Buscar">
    </form>

  </div>
</nav>
