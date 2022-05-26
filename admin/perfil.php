<div class="d-flex flex-column justify-content-center align-items-center">
  <div class="w-100 p-3 text-center" style="background-color: #eee;font-size: 17px;">
    <img src="<?php echo (isset($datos[0]['fotografia'])) ? 'archivos/' . $datos[0]['fotografia'] : 'archivos/default.jpg'; ?>" widht="80" height="200" class="rounded-circle">
    <h3>Nombre: <?php echo $datos[0]['nombre']; ?></h3>
    <h3>Apellido Paterno: <?php echo $datos[0]['apaterno']; ?></h3>
    <h3>Apellido materno: <?php echo $datos[0]['amaterno']; ?></h3>
    <h3>Edad: <?php echo $datos[0]['edad']; ?></h3>
    <div>