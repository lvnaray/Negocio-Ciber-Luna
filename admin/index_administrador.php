<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=h1, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles2.css">
  <title>ADMINISTRADOR</title>
</head>

<body>
  <?php
  include('sistema.controller.php');

  $sistema = new Sistema;
  $sistema->verificarSesion();

  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand " href="#">ADMINISTRACIÓN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administrar datos
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
              <li>
                <hr class="dropdown-divider">
              </li>
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
  <div class="imagenW" data-aos="flip-left">
    <img src="../img/bienvenido.png" alt="welImg" width="600">
  </div>
  <div class="text-center p-3" data-aos="zoom-out-down">
    <h1>Información para usted</h1>
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col" data-aos="flip-right">
          <div class="card shadow-sm">
            <img width="300" height="300" src="../img/admin.gif" class="card-img-top" alt="bebes">
            <div class="card-body">
              <h5 class="card-title">Primer paso a considerar</h5>
              <p class="card-text">Cuando una instalación, es decir cita sea concluida exitosamente ir a tabla cita y cambiar estatus de cita a terminada</p>
            </div>
          </div>
        </div>

        <div class="col" data-aos="flip-right">
          <div class="card shadow-sm">
            <img width="300" height="300" src="../img/admin.gif" class="card-img-top" alt="examenes">
            <div class="card-body">
              <h5 class="card-title">Toda la información correspondiente a el negocio puede ser modificada</h5>
              <p class="card-text">En la parte superior podrás encontrar la opción de administrar datos, donde puede acudir a encontrar toda la información de la empresa, en ellas hay información de clientes, citas etc. </p>
            </div>
          </div>
        </div>

        <div class="col" data-aos="flip-right">
          <div class="card shadow-sm">
            <img width="300" height="300" src="../img/admin.gif" class="card-img-top" alt="examenes">
            <div class="card-body">
              <h5 class="card-title">Cambiar fecha de ficha de pago cada mes</h5>
              <p class="card-text"> Debido a lo acordado, usted debe de cambiar la fecha límite de las fichas de pago al mes requerido </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>