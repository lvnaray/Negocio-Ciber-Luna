<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Administración</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand " href="#">ADMINISTRACIÓN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index_administrador.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administrar de datos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cita.php">Citas</a></li>
            <li><a class="dropdown-item" href="cliente.php">Clientes</a></li>
            <li><a class="dropdown-item" href="statusCita.php">Estatus de citas</a></li>
            <li><a class="dropdown-item" href="soporte.php">Soportes</a></li>
            <li><a class="dropdown-item" href="statusSoporte.php">Estatus de soportes</a></li>
            <li><a class="dropdown-item" href="fichaPago.php">Ficha de pagos</a></li>
            <li><a class="dropdown-item" href="plan.php">Planes</a></li>
            <li><a class="dropdown-item" href="rol.php">Roles</a></li>
            <li><a class="dropdown-item" href="usuario.php">Usuarios</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="colonia.php">Colonias</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login/login.php?action=logout" tabindex="-1">Logout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>