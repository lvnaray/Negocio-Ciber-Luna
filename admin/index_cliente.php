<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles2.css">
  <title>Cliente</title>
</head>

<body>
    <?php
    include('sistema.controller.php');

    $sistema = new Sistema;
    $sistema->verificarSesion();

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CLIENTE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <img src="../img/logo.jpg" alt="logo" width="40" height="40"> <!-- me quedé aquí -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin/registroSoporte.php?action=create">Soporte técnico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="fichaPago.report.php">Ficha de pago</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/login.php?action=logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="imagenW" data-aos="flip-left">
      <img src="../img/welcome.png" alt="welImg" width="900">
    </div>
    <div class="textoW">
      <h1>HOLA</h1>
      <h1>BIENVENIDO A NUESTRO SERVICIO, WISH LUNA.</h1>
      <h2>Gracias por su preferencia.</h2>
    </div>

    <div class="text-center p-3" data-aos="zoom-out-down">
      <h1>Información para usted</h1>
    </div>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col" data-aos="flip-right">
            <div class="card shadow-sm">
              <img width="300" height="300" src="../img/merca.gif" class="card-img-top" alt="bebes">
              <div class="card-body">
                <h5 class="card-title">¿Abarrotes en nuestro negocio?</h5>
                <p class="card-text">Debido al desabasto y cierre de tiendas en el rancho de guadalupe, se abre la nueva tienda Abarrotes Luna con una extensa variedad de lacteos, frutas y sobre todo cosas de la tiendita de la esquina.</p>
              </div>
            </div>
          </div>
        <div class="col" data-aos="flip-right">
          <div class="card shadow-sm">
            <img width="300" height="300" src="../img/internet.gif" class="card-img-top" alt="examenes">
            <div class="card-body">
              <h5 class="card-title">¿No tienes suficiente velocidad o necesitas más?</h5>
              <p class="card-text">En la parte superior podrás encontrar la opción de servicio o soporte técnico, ahí podras llenar la forma y te visitaremos, queremos siempre lo mejor para ti</p>
            </div>
          </div>
        </div>

        <div class="col" data-aos="flip-right">
          <div class="card shadow-sm">
            <img width="300" height="300" src="../img/pago.gif" class="card-img-top" alt="examenes">
            <div class="card-body">
              <h5 class="card-title">Pagar el mes</h5>
              <p class="card-text">Pagar el mes de internet nunca podrá ser tan fácil, como se le indicó, los días 15s de cada mes se tiene que pagar la cantidad referente a su plan, en el menú superior encontrará la opción de ficha de pago, acuda al banco indicado a la cuenta establecida y pague la cantidad establecida. ¡Gracias! </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <footer>
      <div class="partFooter">
        <img src="../img/logo.jpg" alt="">
      </div>
      <div class="partFooter">
        <h4>Acerca de</h4>
        <a href="#">WISH LUNA COPYRIGHT</a>
      </div>
      <div class="partFooter">
        <h4>Redes sociales</h4>
        <div class="social-media">
          <a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
          <a href="www.twitter.com"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>